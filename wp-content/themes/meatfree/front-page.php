<?php
remove_all_actions( 'genesis_loop' );
remove_all_actions( 'genesis_do_sidebar' );
remove_all_actions( 'genesis_do_sidebar_alt' );
add_action('genesis_after_header','meatfree_homepage_widgets');
function meatfree_homepage_widgets(){
	print '<div id="hp-top"><div class="wrap">';
	dynamic_sidebar('homepage-top');
	print '</div></div>';
	print '<div id="hp-mid"><div class="wrap">';
	dynamic_sidebar('homepage-callout');
	print '</div></div>';
	print '<div id="hp-bot"><div class="wrap">';
		print '<div id="widgets-one">';
	dynamic_sidebar('homepage-one');
		print '</div>';
		print '<div id="widgets-two">';
	dynamic_sidebar('homepage-two');
		print '</div>';
		print '<div id="widgets-three">';
	dynamic_sidebar('homepage-three');
		print '</div>';
	print '</div></div>';
}
genesis();