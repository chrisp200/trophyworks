<?php

load_child_theme_textdomain ('atahualpa-ecommerce', get_stylesheet_directory(). '/languages');


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'product-thumb', 200, 200, true ); //(cropped)
	add_image_size( 'product-big-thumb', 300, 300, true ); //(cropped)
}



/**
*Register extra sidebar.
*
*/
register_sidebar( array(
	'name' => __( 'Related Content', 'atahualpa-ecommerce' ),
	'id' => 'sidebar-related',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
?>