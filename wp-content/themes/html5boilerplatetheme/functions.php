<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	function my_scripts_method() {
		// import extra styles
		wp_deregister_style( 'html5ie' );
		wp_register_style( 'html5ie', get_template_directory_uri().'/css/ie.css');
		wp_enqueue_style( 'html5ie' );
		

		wp_deregister_style( 'compass' );
		wp_register_style( 'compass', get_template_directory_uri().'/stylesheets/style.css');
		wp_enqueue_style( 'compass' );
		
		//import extra scripts
		wp_deregister_script( 'modernizr' );
		wp_register_script( 'modernizr', get_template_directory_uri().'/js/libs/modernizr-2.5.3.min.js');
		wp_enqueue_script( 'modernizr' );
		// personal
		wp_deregister_script( 'myscript' );
		wp_register_script( 'myscript', get_template_directory_uri().'/js/script.js');
		wp_enqueue_script( 'myscript' );
		// for skeleton
		wp_deregister_script( 'tabs' );
		wp_register_script( 'tabs', get_template_directory_uri().'/js/tabs.js');
		wp_enqueue_script( 'tabs' );
		// for responsivness with < ie8 capb.
		wp_deregister_script( 'respond' );
		wp_register_script( 'respond', get_template_directory_uri().'/js/respond.min.js');
		wp_enqueue_script( 'respond' );

		wp_deregister_script( 'scrollto' );
		wp_register_script( 'scrollto', get_template_directory_uri().'/js/libs/jquery.scrollTo-1.4.3.1-min.js');
		wp_enqueue_script( 'scrollto' );

		wp_deregister_script( 'lazyload' );
		wp_register_script( 'lazyload', get_template_directory_uri().'/js/libs/jquery.lazyload.min.js');
		wp_enqueue_script( 'lazyload' );
	} 
	
	add_action('wp_enqueue_scripts', 'my_scripts_method'); 
	
	if (function_exists('register_main_nav')) {
		register_main_nav( 
			array('MainNav' => 'Main Navigation Menu')
		);
	};

	add_action( 'init', 'my_add_excerpts_to_pages' );

	function my_add_excerpts_to_pages() {

	 	add_post_type_support( 'page', 'excerpt' );

	}
	

?>