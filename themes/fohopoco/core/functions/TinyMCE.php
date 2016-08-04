<?php
/*
* TinyMCE Styles
*/


/*******************************************************************************
 Filter TinyMCE Buttons
********************************************************************************/
function fohopoco_mce_buttons_2($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter( 'mce_buttons_2', 'fohopoco_mce_buttons_2' );


/*******************************************************************************
 Add Style Options
********************************************************************************/
function fohopoco_tiny_mce_before_init($settings)
{
	$settings['theme_advanced_blockformats'] 	= 'p,address,pre,code,h2,h3,h4,h5,h6,div,figure';
	$settings['theme_advanced_disable'] 		= 'underline,forecolor,wp_help';
	
	$style_formats = array(
		array( 'title' => 'Button', 'inline' => 'span', 'classes' => 'button' ),
		
		array( 'title' => 'Image Options' ),
		array( 'title' => 'Callout Box', 'block' => 'div', 'classes' => 'callout-box' ),
		array( 'title' => 'Highlight', 'inline' => 'span', 'classes' => 'highlight' )
	);
	
	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'fohopoco_tiny_mce_before_init' );
?>
