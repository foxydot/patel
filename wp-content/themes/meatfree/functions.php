<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Meat Free' );
define( 'CHILD_THEME_URL', 'http://msdlab.com' );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 4 );

add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );
/*
 * Pull in some stuff from other files
 */
requireDir(get_stylesheet_directory() . '/lib/inc');
function requireDir($dir){
	$dh = @opendir($dir);

	if (!$dh) {
		throw new Exception("Cannot open directory $dir");
	} else {
		while (($file = readdir($dh)) !== false) {
			if ($file != '.' && $file != '..') {
				$requiredFile = $dir . DIRECTORY_SEPARATOR . $file;
				if ('.php' === substr($file, strlen($file) - 4)) {
					require_once $requiredFile;
				} elseif (is_dir($requiredFile)) {
					requireDir($requiredFile);
				}
			}
		}
	closedir($dh);
	}
	unset($dh, $dir, $file, $requiredFile);
}

/*
 * Add styles and scripts
 */
add_action('wp_print_styles', 'msd_add_styles');
 
function msd_add_styles() {
	if(!is_admin()){    		
		wp_enqueue_style('msd-style',get_stylesheet_directory_uri().'/lib/css/style.css');    
		if(is_front_page()){		
			wp_enqueue_style('msd-homepage-style',get_stylesheet_directory_uri().'/lib/css/homepage.css');    
		}
	}
}
add_action('wp_print_scripts', 'msd_add_scripts');
 
function msd_add_scripts() {
	if(!is_admin()){
    	wp_enqueue_script('msd-jquery',get_stylesheet_directory_uri().'/lib/js/theme-jquery.js');       
		if(is_front_page()){		 
    		wp_enqueue_script('msd-jquery',get_stylesheet_directory_uri().'/lib/js/homepage-jquery.js');       
		}
	}
}