<?php
// cleanup tinymce for SEO
function fb_change_mce_buttons( $initArray ) {
	//@see http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference
	$initArray['theme_advanced_blockformats'] = 'p,address,pre,code,h3,h4,h5,h6';
	$initArray['theme_advanced_disable'] = 'forecolor';

	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_change_mce_buttons');
	
// add classes for various browsers
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
 
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
 
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}

add_filter('body_class','pagename_body_class');
function pagename_body_class($classes) {
	global $post;
	if(is_page()){
		$classes[] = $post->post_name;
	}
	return $classes;
}

add_filter('body_class','section_body_class');
function section_body_class($classes) {
    global $post;
	$post_data = get_post(get_topmost_parent($post->ID));
	$classes[] = $post_data->post_name;
    return $classes;
}

add_action('template_redirect','set_section');
function set_section(){
	global $post, $section;
	$post_data = get_post(get_topmost_parent($post->ID));
	$section = $post_data->post_name;
}

function get_topmost_parent($post_id){
	$parent_id = get_post($post_id)->post_parent;
	if($parent_id == 0){
		$parent_id = $post_id;
	}else{
		$parent_id = get_topmost_parent($parent_id);
	}
	return $parent_id;
}