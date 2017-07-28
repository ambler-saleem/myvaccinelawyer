<?php

class WPKruxTagService{

	// Return an associative array
	function getWpInfoContent ( ) {
		$file_contents = file_get_contents('kruxsmb.php', plugins_url(basename( dirname(__FILE__))));
		$startIdx = strpos($file_contents, "/*") + 2;
		$endIdx = strpos($file_contents, "*/");
		$length = $endIdx - $startIdx;
		$wpInfo = substr($file_contents, $startIdx, $length);
		$wpInfoArray = explode("\n", $wpInfo);
		$wpInfoContent = array();
		foreach($wpInfoArray as $item){
			$item = trim($item);
			if(strlen($item) > 0){
				$sColonIdx = strpos($item, ':');
				$key = substr($item, 0, $sColonIdx);
				$key = trim($key);
				$val = substr($item, $sColonIdx + 1);
				$val = trim($val);
				$wpInfoContent[$key] = $val;
			}
		}
		return $wpInfoContent;
	}

	function getWpInfoTag ( ) {
		$wpInfoContent = $this->getWpInfoContent();
		$pluginName = $wpInfoContent['Plugin Name'];
		$pluginVersion = $wpInfoContent['Version'];
		$wpInfoTag = "<!-- BEGIN Krux SMB Wordpress Plugin Info Tag -->
							<script type='text/javascript'>
								window.KWP = window.KWP || {};
								window.KWP.plugin_info = window.KWP.plugin_info || {};
								window.KWP.plugin_info.name = '$pluginName';
								window.KWP.plugin_info.version = '$pluginVersion';
							</script>
							<!-- END Krux SMB Wordpress Plugin Info Tag -->";
		return $wpInfoTag;
	}

	function setTags ( ) {
		global $kx_confid;
		$kx_wp_info = $this->getWpInfoContent();
		$this->tags = array(
			"socialtag" => "<!-- BEGIN Krux Social Widget Tag -->
											<script>
											  window.Krux||((Krux=function(){Krux.q.push(arguments)}).q=[]);
											  (function(){
											    var k = document.createElement('script');k.type = 'text/javascript';k.async = true;
											    var m,src = (m=location.href.match(/\bkwsrc=([^&]+)\b/))&&decodeURIComponent(m[1]);
											    k.src = src ||(location.protocol === 'https:' ? 'https:' : 'http:') +
											      '//cdn.krxd.net/static/socialtag/widget.js';
											    var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(k,s);
											  })();
											</script>
											<!-- END Krux Social Widget Tag -->",
			"controltag" => "<!-- BEGIN Krux Control Tag -->
												<!-- Source: /controltag?confid=$kx_confid&v2=true -->
												<script class='kxct' data-id='$kx_confid' data-timing='async' data-version='1.9' type='text/javascript'>
												  window.Krux||((Krux=function(){Krux.q.push(arguments)}).q=[]);
												  (function(){
												    var k=document.createElement('script');k.type='text/javascript';k.async=true;
												    var m,src=(m=location.href.match(/\bkxsrc=([^&]+)/))&&decodeURIComponent(m[1]);
												    k.src = /^https?:\/\/([^\/]+\.)?krxd\.net(:\d{1,5})?\//i.test(src) ? src : src === 'disable' ? '' :
												      (location.protocol==='https:'?'https:':'http:')+'//cdn.krxd.net/controltagv2?confid=$kx_confid'
												  ;
												    var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(k,s);
												  }());
												</script>
												<!-- END Krux Controltag -->",
			"wp_info_tag" => $this->getWpInfoTag()
		);
	}

	function socialtag ( ) {
		echo $this->tags['socialtag'];
	}

	function controltag ( ) {
		echo $this->tags['controltag'];
	}

	function wp_info_tag ( ) {
		echo $this->tags['wp_info_tag'];
	}

	/*
		Puts tag on either admin or site pages
		Arguments:	@tagName -> key to which tag to put on page
								(from array $this->tags)
					@location -> either 'admin' or 'pages'
	*/
	function putTagOnPage ($tagName, $location) {
		global $kx_menu_page;
		$tag = $this->tags[$tagName];
		if($location == 'admin'){
			add_action( 'admin_head-' . $kx_menu_page, array($this, $tagName) );
		}else if($location == 'pages'){
			add_action('wp_head', array($this, $tagName));
		}
	}

	public function __construct ( ) {
		global $kx_confid;
		global $kx_organization_name;
		global $kx_site_name;
		$kx_confid = get_option("kx_confid");
		$kx_organization_name = get_option("kx_organization_name");
		$kx_site_name = get_option("kx_site_name");
		$this->setTags();
	}
}

?>