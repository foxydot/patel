<?php
remove_all_actions( 'genesis_loop' );
remove_all_actions( 'genesis_do_sidebar' );
remove_all_actions( 'genesis_do_sidebar_alt' );
add_action('genesis_loop','meatfree_homepage_widgets');
function meatfree_homepage_widgets(){
	print '<div id="hp-top">';
	dynamic_sidebar('homepage-top');
	print '</div>';
	print '<div id="hp-mid">';
	dynamic_sidebar('homepage-callout');
	print '</div>';
	print '<div id="hp-bot">';
		print '<div id="widgets-one">';
	dynamic_sidebar('homepage-one');
		print '</div>';
		print '<div id="widgets-two">';
	dynamic_sidebar('homepage-two');
		print '</div>';
		print '<div id="widgets-three">';
	dynamic_sidebar('homepage-three');
		print '</div>';
	print '</div>';
}
genesis();