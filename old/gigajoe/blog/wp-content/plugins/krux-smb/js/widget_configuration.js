window.KWP.qs = function (key) {
    key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
    var match = location.search.match(new RegExp("[?&]"+key+"=([^&]+)(&|$)"));
    return match && decodeURIComponent(match[1].replace(/\+/g, " "));
};

window.KWP.makeRequestForSiteDetails = function ( ) {
	var url = "http://console.krux.com/api/v1/site/details/";
	jQuery.ajax({
		url: url,
		dataType: 'jsonp',
		success:function(data){
			if(data.success && data.confid){
				jQuery.ajax({
					type: "POST",
					url: window.KWP.admin_path + 'admin.php',
					data: {
						"confid" : data.confid,
						"organization_name" : data.organization_name,
						"site_name" : data.site_name
					},
					success: function ( ) {
						window.location.href = window.KWP.admin_path + 'admin.php?page=krux_smb&changed_org=1';
					}
				});
			}else{
				jQuery('#confidJsonpNoSuccess').show();
			}
		},
		error:function(){
			window.console && console.log('error getting confid');
		}
	});
};

window.KWP.views.social = window.KWP.views.main.extend({
	getJson: function ( ) {

		jQuery.ajax({
			type: "GET",
			url: "",
			data: { "social_json" : 1 },
			success: function (data) {
				var socialJson = jQuery.parseJSON(data);
				var configStatus = socialJson["status"];
				var pages = socialJson["pages"];
				var posts = socialJson["posts"];

				var enabledIdxs = {
					"1" : 0,
					"0" : 1
				}
				jQuery("input:radio[name=enabled]")[enabledIdxs[configStatus]].checked = true;				if(pages["status"] === "1"){
					jQuery('#locationPages').attr('checked', 'checked');
				}
				jQuery('#locationPages').data('widget', pages);
				if(posts["status"] === "1"){
					jQuery('#locationPosts').attr('checked', 'checked');
				}
				jQuery('#locationPosts').data('widget', posts);

				jQuery('#pagesFormat').val(pages["format"]).data('widget', pages).change();
				jQuery('#postsFormat').val(posts["format"]).data('widget', posts).change();
				var placementIdxs = {
					"top" : 0,
					"bottom" : 1,
					"both" : 2
				}
				jQuery('input:radio[name=page_placement]')[placementIdxs[pages["placement"]]].checked = true;
				jQuery('input:radio[name=post_placement]')[placementIdxs[posts["placement"]]].checked = true;
				jQuery('input:radio[name=page_placement]').data('widget', pages);
				jQuery('input:radio[name=post_placement]').data('widget', posts);
				var sharingOpts = socialJson["sharing_opts"][0]["sharing_opts"];
				sharingOpts = sharingOpts.split(",");
				var sharingOptsTable = {
					"facebook" : "fbchoice",
					"twitter" : "twchoice",
					"google" : "gpchoice",
					"pinterest" : "pinchoice",
					"linkedin" : "lichoice"
				}
				for(var i = 0; i < sharingOpts.length; i++){
					var socNet = sharingOpts[i].replace(/ /g,'');
					var choiceId = sharingOptsTable[socNet];
					var choiceInput = jQuery('#' + choiceId);
					choiceInput.attr('checked', 'checked');
				}
				jQuery('#fbchoice').change();
				
				if (configStatus == 1) {
					jQuery('#configuration-block').show();
					jQuery('#locationPages').removeAttr('disabled');
					jQuery('#locationPosts').removeAttr('disabled');
					jQuery('.socnetworks').removeAttr('disabled');
				}
				else {
					jQuery('#configuration-block').hide();
					jQuery('#locationPages').attr('disabled', 'true');
					jQuery('#locationPosts').attr('disabled', 'true');
					jQuery('.socnetworks').attr('disabled', 'true');
				}				
			}
		});
	},
	actions: function ( ) {

		var getShareChoicesStr = function ( ) {
			var shareChoices = [];
			var sharingOptions = jQuery('.kwp-social-options input[type=checkbox]');
			for(var i = 0; i < sharingOptions.length; i++){
				var checked = sharingOptions[i].checked;
				if(checked){
					shareChoices.push(jQuery(sharingOptions[i]).val());
				}
			}
			var shareChoicesStr = shareChoices.join(',');
			return shareChoicesStr;
		};

		jQuery('input:radio[name=enabled]').change(function(){
			var newVal = jQuery(this).val();
			jQuery.ajax({
				type: 'POST',
				url: window.KWP.admin_path + 'admin.php',
				data: { 'config_status' : newVal }
			});
			if (newVal == 1) {
				jQuery('#configuration-block').show();
				jQuery('#locationPages').removeAttr('disabled');
				jQuery('#locationPosts').removeAttr('disabled');
				jQuery('.socnetworks').removeAttr('disabled');				
			}
			else {
				jQuery('#configuration-block').hide();
				jQuery('#locationPages').attr('disabled', 'true');
				jQuery('#locationPosts').attr('disabled', 'true');
				jQuery('.socnetworks').attr('disabled', 'true');				
			}
		});
		jQuery('.locationChoice').change(function(){
			var postsData = jQuery(this).data('widget');
			if (this.checked) {
				postsData.status = 0;
			}
			else {
				postsData.status = 1;
			}
			jQuery(this).data('widget', postsData);
			
			jQuery.ajax({
				type: 'POST',
				url: window.KWP.admin_path + 'admin.php',
				data: { 'location' : postsData }
			});
		});
		var formatIdxs = {
			'article_style' : 0,
			'article_horizontal' : 1,
			'big_button' : 2,
			'single_button' : 3
		};
		jQuery('.format_choice').change(function(){
			var widgetData = jQuery(this).data('widget');
			var newFormat = jQuery(this).val();
			var dataLocation = jQuery(this).data('location');
			jQuery('#widgetContainer' + dataLocation).children().css('display', 'none');
			var idx = formatIdxs[newFormat];
			window.KWP.tests = window.KWP.tests || {};
			window.KWP.tests.formatAjax = false; // for casperjs ajax testing
			jQuery.ajax({
				type: 'POST',
				url: window.KWP.admin_path + 'admin.php',
				data: { 'widgetData' : widgetData, 'newFormat' : newFormat },
				success: function(data) {
					var widgetContainer = jQuery('#widgetContainer' + dataLocation);
					var widget = widgetContainer.children()[idx];
					jQuery(widget).css('display', 'block');
					// signals to casperjs, ready for testing
					window.KWP.tests.formatReady = true;
				}
			});
		});
		jQuery('.kwp-placement-wrapper input').change(function(){
			var widgetData = jQuery(this).data('widget');
			var newPlacement = jQuery(this).val();
			jQuery.ajax({
				type: 'POST',
				url: window.KWP.admin_path + 'admin.php',
				data: { 'widgetData' : widgetData, 'newPlacement' : newPlacement },
				success: function (data) {
					window.console && console.log(data);
				}
			});
		});
		jQuery('.kwp-social-options input[type=checkbox]').change(function(){
			var $this = this;
			var choiceVal = jQuery(this).val();
	        var shareChoicesStr = getShareChoicesStr();
	        var widgets = jQuery('.krux_social');
	        for(var i = 0; i < widgets.length; i++){
	            var ww = widgets[i];
	            ww.setAttribute('data-socnetworks', shareChoicesStr);
	        }
			
	        window.KSW && KSW.editKruxSocWidget(widgets);
	        jQuery.ajax({
	        	type: 'POST',
	        	url: window.KWP.admin_path + 'admin.php',
	        	data: { 'sharingOptions' : shareChoicesStr },
	        	success: function (data) {
	        		window.console && console.log(data);
	        	}
	        });
		});
	},
	checkIfHasAccount: function ( ) {
		/*
				Make jsonp request to Krux SMB platform for confid. If successfully get it,
				then add it to this Wordpress DB. Otherwise, if not logged in, then display
				login and signup message.
		*/
		if (KWP.confid === '' || KWP.organization_name === '' || KWP.site_name === ''){
			window.KWP.makeRequestForSiteDetails();
		}else if(KWP.confid !== ''){
			jQuery('#loginMessage').show();
		}
	},
	checkIfChangedAccount: function ( ) {
		var changedAccount = window.KWP.qs('changed_org');
		var changedAcctMsg = jQuery('#kwpChangedAcctMsg');
		if(changedAccount === '1'){
			changedAcctMsg.show();
		}else{
			changedAcctMsg.hide();
		}
	},
	renderChangeAcct: function ( ) {
		var changeAcctSection = jQuery('#kwpChangeAcct');
		var renderChangeAcctBtn = jQuery('#kwpRenderChangeAcctBtn');
		var changeAcctBtn = jQuery('#kwpChangeAcctBtn');

		renderChangeAcctBtn.click(function(){
			var protocol = window.location.protocol;
			var host = window.location.host;
			var pathname = window.location.pathname;
			var existingPath = protocol + "//" + host + pathname + '?page=krux_smb&change_acct=1';
			window.location.href = existingPath;
		});

		var isChangePage = window.KWP.qs('change_acct');
		if(isChangePage === '1'){
			changeAcctSection.show();
		}else{
			changeAcctSection.hide();
		}

		changeAcctBtn.click(function(){
			window.KWP.makeRequestForSiteDetails();
		});
	},
	initialize: function ( ) {
		this.contentView('Social');
		this.getJson();
		this.actions();
		this.checkIfHasAccount();
		this.checkIfChangedAccount();
		this.renderChangeAcct();
	}
});
