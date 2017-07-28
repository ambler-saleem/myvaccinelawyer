<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xmlns:og="http://ogp.me/ns#"
xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
<meta property="fb:admins" content="9501915" />
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:type" content="blog" />
<meta property="og:image" content="http://www.myvaccinelawyer.com/images/myvaccinelawyer-shot.jpg" />
<meta property="og:image" content="http://www.myvaccinelawyer.com/images/myvaccinelawyer-won.jpg" />
<meta property="og:image" content="http://www.myvaccinelawyer.com/images/myvaccinelawyer-baby.jpg" />
<meta property="og:url" content="<?php the_permalink() ?>" />
<meta property="og:site_name" content="My Vaccine Lawyer" />

<link rel="image_src" href="http://www.myvaccinelawyer.com/images/myvaccinelawyer-shot.jpg" / >
<link rel="image_src" href="http://www.myvaccinelawyer.com/images/myvaccinelawyer-won.jpg" / >

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php bloginfo('name'); ?> <?php wp_title("",true); ?></title>


<link href="http://www.myvaccinelawyer.com/myvaccinelawyer-2.css" rel="stylesheet" type="text/css" />




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42438989-1', 'myvaccinelawyer.com');
  ga('send', 'pageview');

</script>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
</head>


<body>
<div id="top_bar"></div>
<div id= "top_links">
	<ul>
    <li><a href="http://www.myvaccinelawyer.com/index.html">Home</a></li>
    	<li><a href="http://www.myvaccinelawyer.com/aboutus.html">About Us</a></li>
        <li><a href="http://www.myvaccinelawyer.com/attorneys.html">Attorneys</a></li>
        <li><a href="http://myvaccinelawyer.com/blog/">News</a></li>
        <li><a href="http://www.myvaccinelawyer.com/contactus.html">Contact Us</a></li>
    </ul>
</div>

<div itemscope itemtype="http://schema.org/Organization" id="logo_bar"><div id="logo">
<a href="../index.html"><img itemprop="logo" src="http://www.myvaccinelawyer.com/images/logo.png" /></a></div>
<div id="phone"><span itemprop="telephone">1 (800) 229-7704</span></div>

<div id="social_buttons">

<a href="https://twitter.com/MyVaccineLawyer" target="new"><img src="http://www.myvaccinelawyer.com/images/twittericon.png" style="margin-right:5px;" /></a>

<a href="https://www.facebook.com/MyVaccineLawyer" target="new"><img src="http://www.myvaccinelawyer.com/images/facebookicon.png" style="margin-right:5px;" /></a>

<a href="http://www.linkedin.com/company/my-vaccine-lawyer" target="new"><img src="http://www.myvaccinelawyer.com/images/linkedinicon.png" style="margin-right:5px;" /></a>

<a href="https://plus.google.com/112336889237876179176/posts" target="new"><img src="http://www.myvaccinelawyer.com/images/googleplusicon.png" style="margin-right:5px;" /></a></div>
</div>

<div id="navigation_wrapper">
<div id="navigation">

    <ul>
    	<li><a href"#">Vaccine Claims</a>
        <ul><li><a href="http://www.myvaccinelawyer.com/aboutheprogram.html">About The Program</a></li>
        	<li><a href="http://www.myvaccinelawyer.com/adversevaccinereactions.html">Adverse Vaccine Reactions</a></li>
            <li><a href="http://www.myvaccinelawyer.com/howyourclaimworks.html">How Your Claim Works</a></li>
            <li><a href="http://www.myvaccinelawyer.com/vaccinecomptable.html">National Vaccine Injury Compensation Table</a></li>
            <li><a href="http://www.myvaccinelawyer.com/faq.html">FAQ</a></li>
            </ul>
            </li>
        <li><a>Vaccine Types</a>
        	<ul><li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/flushot.html">Trivalent Influenza Vaccine (Flu Shot)</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/hepb.html">Hepatitis B Vaccine</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/mmr.html">Measles, Mumps, and Rubella (MMR) Vaccine</a></li>  
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/hpv.html">Human Papilloma Virus (HPV) Vaccine</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/dtap.html">Diptheria, Tetanus, and Pertussis (DtaP) Vaccine</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/varicella.html">Varicella Vaccine (Chicken Pox)</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/tetanus.html">Tetanus Vaccine</a></li>
            <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/meningitis.html">Meningococcal Vaccine</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/rotavirus.html">Rotavirus Vaccine</a></li>
        
      
        
        </ul>
        </li>
        <li><a>Conditions/Injuries</a>
        <ul>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/guillain.html">Guillain-Barre Syndrome</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/cidp.html">CIDP</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/anaphylaxis.html">Anaphylaxis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/brachialneuritis.html">Brachial Neuritis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/encephalitis.html">Encephalitis</a></li> 
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/intussusception.html">Intussusception</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/transversemyelitis.html">Transverse Myelitis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/shoulderinjury.html">Shoulder Injury</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/chronicarthritis.html">Chronic Arthritis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/seizures.html">Seizures</a></li>
       
        <li><a href="http://www.myvaccinelawyer.com/allconditions.html">All Conditions</a></li>
        </ul></li>
        
        
        
        <li><a href="http://www.myvaccinelawyer.com/Locations.html">Locations</a></li>
        <li><a>Unsafe Drugs</a>
        <ul><li><a href="http://www.myvaccinelawyer.com/vaccineinjuries/ActosBladderCancer.html">Actos Bladder Cancer</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Byetta.html">Byetta and Cancer</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Effexor.html">Effexor Birth Defects</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Fosamax.html">Fosamax Femur Fracture</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/GranuFlo.html">GranuFlo</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/NaturaLyte.html">NaturaLyte</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Januvia.html">Januvia and Cancer</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/NuvaRing.html">NuvaRing</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Paxil.html">Paxil Birth Defects</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/SSRIAntidepressants.html">SSRIs</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Zoloft.html">Zoloft Birth Defects</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/TopaMAX.html">Topamax</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Yaz.html">Yaz/Yasmin Blood Clots</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafedrugs/Zithromax.html">Zithromax Heart Risks</a></li>
        </ul>
        </li>
        <li><a href="http://www.myvaccinelawyer.com/medicaldevices.html">Medical Devices</a>
        <ul><li><a href="http://www.myvaccinelawyer.com/unsafedrugs/alloderm.html">AlloDerm Patch</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/artelonspacer.html">Arleton Spacer</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/Bard-KugelHerniaRepair.html">Bard-Kugel Hernia Repair</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/CALAXOBoneScrew.html">CALAXO Bone Screw</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/davincisurgicalsystem.html">da Vinci Surgical Robot</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/DePuy.html">DePuy Knee Replacement</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/DePuyLPS.html">DePuy LPS Diaphyseal Sleeves</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/MedtronicINFUSEBoneGraft.html">INFUSE Bone Graft</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/MedtronicinsulinPump.html">Insulin Pump</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/MedtronicDefibrillator.html">Defibrillator</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/ShoulderPainPump.html">Shoulder Pain Pump</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/SmithNephewKneeImplant.html">Smith & Nephew Knee Implant</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/StrykerRejuvenate.html">Stryker Rejuvenate</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/TransvaginalMesh.html">Transvaginal Mesh</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/VenaCavaFilters.html">Vena Cava Filters</a></li>
        <li><a href="http://www.myvaccinelawyer.com/unsafemedicaldevices/ZimmerKneeImplant.html">Zimmer Knee Implant</a></li>
        </ul>
        </li>
        <li><a href="http://www.myvaccinelawyer.com/blog">Blog</a></li>
     </ul>

</div>
</div>
<div id="cycle">
<div id="cycle_button"><a href="http://www.myvaccinelawyer.com/contactus.html">Contact Us For A Free Case Evaluation<a></div>

<div id="cycle_list">
  <ul>
  	<li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/flushot.html">Influenza</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/mmr.html">MMR</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/rotavirus.html">Rotavirus</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/tetanus.html">Tetanus</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/dtap.html">DTAP</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/hpv.html">HPV</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/meningitis.html">Meningitis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/hepb.html">Hepatitis</a></li>
        <li><a href="http://www.myvaccinelawyer.com/harmfulvaccines/varicella.html">Chickenpox</a></li>
        </ul>
     </div>
 </div>

	<div id="main">