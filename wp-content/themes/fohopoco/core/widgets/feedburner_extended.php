<?php
/*
  Plugin Name: Feedburner Email Extended Widget
  Version: 1.0
  Description: Extended http://wyrihaximus.net/projects/wordpress/feedburner-email-widget/?utm_source=wordpress_install&utm_medium=details&utm_campaign=feedburner-email-widget
  Author: NorthPoint Digital
 */ 

if( class_exists('FeedburnerEmailWidget') ){

    class FH_FeedburnerEmailWidget extends FeedburnerEmailWidget {

        /**
         * Generate the widget
         * 
         * @param array $args Arguments
         * @param array $instance 
         * @return string Generated HTML
         */
        function generate($args, $instance) {
            extract($args, EXTR_SKIP);
            $html = $before_widget;
            // Grab the settings from $instance and full them with default values if we can't find any
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            $uri = empty($instance['uri']) ? false : $instance['uri'];
            $rss_icon =  empty($instance['uri']) ? '' : '<a href="' . $uri . '" target="top" id="f33d"><b>RSS</b></a>';
            $above_email = empty($instance['above_email']) ? false : $instance['above_email'];
            $below_email = empty($instance['below_email']) ? false : $instance['below_email'];
            $subscribe_btn = empty($instance['subscribe_btn']) ? 'Subscribe' : $instance['subscribe_btn'];
            $email_text_input = empty($instance['email_text_input']) ? '' : $instance['email_text_input'];
            $show_link = (isset($instance['show_link']) && $instance['show_link']) ? true : false;
            $form_id = empty($instance['form_id']) ? 'feedburner_email_widget_sbef' : $instance['form_id'];
            $css_style_code = empty($instance['css_style_code']) ? false : $instance['css_style_code'];
            $analytics_cat = empty($instance['analytics_cat']) ? false : $instance['analytics_cat'];
            $analytics_act = empty($instance['analytics_act']) ? false : $instance['analytics_act'];
            $analytics_lab = empty($instance['analytics_lab']) ? false : $instance['analytics_lab'];
            $analytics_val = empty($instance['analytics_val']) ? false : $instance['analytics_val'];
            
            // Cut out the part we need
            $uri = parse_url($uri);
            if ($uri['host'] == 'feedburner.google.com' && !empty($uri['query'])) {
                $uri = $uri['query'];
                parse_str($uri, $queryParams);
            } else if ($uri['host'] == 'feeds.feedburner.com' && !empty($uri['path'])) {
                $uri = substr($uri['path'], 1, (strlen($uri['path']) -1));
                $queryParams = array(
                    'uri' => $uri,
                );
                $uri = 'uri=' . $uri;
            } else if (!isset($uri['host']) && isset($uri['path'])) {
                $queryParams = array(
                    'uri' => $uri['path'],
                );
                $uri = 'uri=' . $uri['path'];
            } else {
                $uri = false;
                $queryParams = array();
            }
            
            if ($uri && count($queryParams) > 0) {
                
                if (!isset($queryParams['loc'])) {
                    $queryParams['loc'] ='en_US';
                }
                
                if (!empty($title)) {
                    if(!isset($before_title)) {
                        $before_title = '';
                    }
                    if(!isset($after_title)) {
                        $after_title = '';
                    }
                    $html .= $before_title . trim($title) . $rss_icon . $after_title;
                }
                // Get Style if any
                if ($css_style_code) {
                    $html .='<style type="text/css">' . trim($css_style_code) . '</style>';
                }
                // Putting onSubmit code together
                $onsubmit = array();
                // Default feedburner window
                $onsubmit[] = 'window.open(\'http://feedburner.google.com/fb/a/mailverify?' . $uri . '\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');';
                // Google Analytics support
                if ($analytics_cat && $analytics_act) {
                    $analytics_array = array();
                    $analytics_array[] = '\'' . $analytics_cat . '\'';
                    $analytics_array[] = '\'' . $analytics_act . '\'';
                    if ($analytics_lab) {
                        $analytics_array[] = '\'' . $analytics_lab . '\'';
                    }
                    if ($analytics_val) {
                        $analytics_array[] = $analytics_val;
                    }
                    $onsubmit[] = 'if(!(typeof(pageTracker) == \'undefined\')){pageTracker._trackEvent(' . implode(',', $analytics_array) . ');}else{if(!(typeof(_gaq) == \'undefined\')){_gaq.push([' . implode(',', $analytics_array) . ']);}}';
                }
                $onsubmit[] = 'return true;';
                // Open Form
                $html .= '<form id="' . trim($form_id) . '" action="http://feedburner.google.com/fb/a/mailverify" method="post" onsubmit="' . implode('', $onsubmit) . '" target="popupwindow">';
                if ($above_email) {
                    $html .= '<label>' . trim($above_email) . '</label>';
                }
                $html .= '<input id="' . trim($form_id) . '_email" name="email" type="text" ';
                if(!empty($email_text_input)) {
                    $html .= 'value="' . htmlentities(trim($email_text_input)) . '" onclick="javascript:if(this.value==\'' . addslashes(htmlentities(trim($email_text_input))) . '\'){this.value= \'\';}" ';
                }
                $html .= '/>';
                // Hidden fields
                foreach ($queryParams as $index => $queryParam) {
                    $html .= '<input type="hidden" value="' . $queryParam . '" name="' . $index . '"/>';
                }
                if ($below_email) {
                    $html .= '<label>' . trim($below_email) . '</label>';
                }
                $html .= '<input id="' . trim($form_id) . '_submit" type="submit" value="' . htmlentities(trim($subscribe_btn)) . '" />';
                if ($show_link) {
                    $html .= '<label>Delivered by <a href="http://feedburner.google.com" target="_blank">FeedBurner</a></label>';
                }
                $html .= '</form>';
            }
            $html .= $after_widget;
            // Send the widget to the browser
            return $html;
        }

    }
    function feedburner_plugin() {
    	include_once( ABSPATH . 'wp-admin/includes/plugin.php'); 

    	$feedburner_widget = ABSPATH . PLUGINDIR . '/feedburner-email-widget/widget-feedburner-email.php';

    	if( !is_plugin_active( $feedburner_widget ) ){
    		activate_plugin( $feedburner_widget );
    	}
    }
    add_action( 'init', 'feedburner_plugin' );
    function fh_widget_init(){
    	//Updating to the custom widget for foleyhoag
    	unregister_widget('FeedburnerEmailWidget');
    	return register_widget('FH_FeedburnerEmailWidget');		
    }

    // Tell WordPress about our widget
    add_action('widgets_init', 'fh_widget_init' );

    /**
     * 
     * @param array $atts Widget attributes
     * @return string Generated HTML for the widget
     */
    function fh_feedburner_email_widget_shortcode_func($atts) {
    	return FH_FeedburnerEmailWidget::generate(array(), shortcode_atts(array(
                'title' => ' ',
                'uri' => false,
                'above_email' => false,
                'below_email' => false,
                'subscribe_btn' => 'Subscribe',
                'show_link' => false,
                'form_id' => 'feedburner_email_widget_sbef',
                'css_style_code' => false,
                'analytics_cat' => false,
                'analytics_act' => false,
                'analytics_lab' => false,
                'analytics_val' => false,
    	), $atts));
    }

    //Updating to the custom shortcode for foleyhoag
    remove_shortcode('feedburner_email_widget' );
    add_shortcode('feedburner_email_widget', 'fh_feedburner_email_widget_shortcode_func');
}