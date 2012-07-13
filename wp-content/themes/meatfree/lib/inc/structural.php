<?php
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_header', 'genesis_do_subnav' );

add_action('after_setup_theme','meatfree_add_homepage_sidebars');
function meatfree_add_homepage_sidebars(){
	genesis_register_sidebar(array(
	    'name' => 'Homepage Top',
	    'description' => 'Homepage slideshow space',
	    'id' => 'homepage-top'
	));
	genesis_register_sidebar(array(
	    'name' => 'Homepage Callout',
	    'description' => 'Homepage callout space',
	    'id' => 'homepage-callout'
	));
	genesis_register_sidebar(array(
	    'name' => 'Homepage Widget Area One',
	    'description' => 'Homepage central widget areas',
	    'id' => 'homepage-one'
	));
	genesis_register_sidebar(array(
	    'name' => 'Homepage Widget Area Two',
	    'description' => 'Homepage central widget areas',
	    'id' => 'homepage-two'
	));
	genesis_register_sidebar(array(
	    'name' => 'Homepage Widget Area Three',
	    'description' => 'Homepage central widget areas',
	    'id' => 'homepage-three'
	));
}
