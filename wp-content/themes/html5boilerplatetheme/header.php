<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
    <meta name="viewport" content="width=device-width">
    
	<link rel="shortcut icon" href="/favicon.ico">
    
    <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page-wrap"  class="box-shadow">

		<div id="header" class="clearfix container">
        	<div id="logo">
        		<div><img src='<?php echo get_bloginfo('template_directory'); ?>/images/tw-logo.jpg'></div>
        	</div>
            <!-- <div id="social"></div> -->
            <!-- <div id="image"><img src="images/trophy_pic.png" width="379" height="343" /></div> -->
            <div id="moto">
            	<h1>Trophy Works</h1>
                <h2>Putting More POP in your awards since 1977</h2>
            </div>
			<?php /*?><h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div><?php */?>
            <div style="clear:both"></div>
            
            <div style="clear:both;"></div>
		</div>
        <div style="clear:both;"></div>
        
        <div id="nav">
            <ul>
                
            </ul>
            <div style="clear:both;"></div>
        </div>
        <div class="navbar">
			<div class="navbar-inner">
		    	<ul class="nav">
		      		<li><a href="/index.php">Home</a></li>
              		<li><a href="/services">Services</a></li>
              		<li><a href="/online-store">Online Store</a></li>
              		<li><a href="/clients">Clients</a></li>
              		<li><a href="/contact">Contact</a></li>
		    	</ul>
		  	</div>
		</div>
        