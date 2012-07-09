<?php
/**
 * Connected Class
 */
class Connected extends WP_Widget {
    /** constructor */
    function Connected() {
		$widget_ops = array('classname' => 'connected', 'description' => __('Show social icons'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('connected', __('Connected'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { print $before_title.$title.$after_title; } 
		?>
		<p><?php echo $text; ?></p>
		<div id="social-media" class="social-media">
		<?php if(get_option('meatfree_google_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_google_link'); ?>" class="gl" title="Google+" target="_blank">Google+</a>
		<?php }?>
		<?php if(get_option('meatfree_facebook_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_facebook_link'); ?>" class="fb" title="Join Us on Facebook!" target="_blank">Facebook</a>
		<?php }?>
		<?php if(get_option('meatfree_twitter_user')!=""){ ?>
		<a href="http://www.twitter.com/<?php echo get_option('meatfree_twitter_user'); ?>" class="tw" title="Follow Us on Twitter!" target="_blank">Twitter</a>
		<?php }?>
		<?php if(get_option('meatfree_linkedin_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_linkedin_link'); ?>" class="li" title="LinkedIn" target="_blank">LinkedIn</a>
		<?php }?>
		<?php if(get_option('meatfree_flickr_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_flickr_link'); ?>" class="fl" title="Flickr" target="_blank">Flickr</a>
		<?php }?>
		<?php if(get_option('meatfree_youtube_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_youtube_link'); ?>" class="yt" title="YouTube" target="_blank">YouTube</a>
		<?php }?>
		<?php if(get_option('meatfree_sharethis_link')!=""){ ?>
		<a href="<?php echo get_option('meatfree_sharethis_link'); ?>" class="st" title="ShareThis" target="_blank">ShareThis</a>
		<?php }?>
	</div>
	<div class="clear"></div>
	<div>
		<?php print (get_option('meatfree_phone')!='')?'PHONE: '.get_option('meatfree_phone').'<br /> ':''; ?>
		<?php print (get_option('meatfree_fax')!='')?'FAX: '.get_option('meatfree_fax').'<br /> ':''; ?>
		<?php print (get_option('meatfree_email')!='')?'<a href="mailto:'.get_option('meatfree_email').'">'.strtoupper(get_option('meatfree_email')).'</a><br /> ':''; ?>
	</div>
		<?php 	
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>	
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Connected");'));/**
 * Connected Class
 */
class Address extends WP_Widget {
    /** constructor */
    function Address() {
		$widget_ops = array('classname' => 'address', 'description' => __('Display addresses'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('address', __('Address'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { print $before_title.$title.$after_title; } 
		?>
		<div id="address" class="address">
		<?php print (get_option('meatfree_mailing_street')!='' && get_option('meatfree_mailing_city')!='' && get_option('meatfree_mailing_state')!='')?'<strong>MAILING ADDRESS:</strong> '.get_option('meatfree_mailing_street').' '.get_option('meatfree_mailing_street2').' | '.get_option('meatfree_mailing_city').', '.get_option('meatfree_mailing_state').' '.get_option('meatfree_mailing_zip').'<br /> ':''; ?>
		<?php print (get_option('meatfree_street')!='' && get_option('meatfree_city')!='' && get_option('meatfree_state')!='')?'<strong>PHYSICAL ADDRESS:</strong> '.get_option('meatfree_street').' '.get_option('meatfree_street2').', '.get_option('meatfree_city').' | '.get_option('meatfree_state').' '.get_option('meatfree_zip').'<br /> ':''; ?>
	</div>
		<?php 	
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>	
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Address");'));

class Copyright extends WP_Widget {
    /** constructor */
    function Copyright() {
		$widget_ops = array('classname' => 'address', 'description' => __('Display copyright notice'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('copyright', __('Copyright'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { print $before_title.$title.$after_title; } 
		?>
		<div id="copyright" class="copyright">Copyright &copy;<?php print date("Y"); ?>, <?php get_option('blogname') ?>. All rights reserved.
	</div>
		<?php 	
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>	
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Copyright");'));