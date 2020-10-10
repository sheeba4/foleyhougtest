<?php
/*
* Set paths to theme functions and admin section
*/

$admin_path     = TEMPLATEPATH . '/core/admin/';
$widgets_path   = TEMPLATEPATH . '/core/widgets/';
$functions_path = TEMPLATEPATH . '/core/functions/';
$options_path   = TEMPLATEPATH . '/core/options/';


/*
* functions
*/
require_once( $functions_path . 'functions.php' );
require_once( $functions_path . 'widget_classes.php' );


/*
* theme options
*/
require( $options_path . 'options.php' );
require( $options_path . 'user_profile.php' );


/*
* add-on's
*/
require_once( $functions_path . 'css3pie.php' );
require_once( $functions_path . 'cli.php' );
//require_once($functions_path . 'TinyMCE.php');

/*
* theme customization
*/
require_once( $functions_path . 'customize-theme-menu-mod.php' );

/*
* widgets
*/
require_once( $widgets_path . 'twitter.php' );
require_once( $widgets_path . 'button.php' );
require_once( $widgets_path . 'address.php' );
require_once( $widgets_path . 'address_extended.php' );
require_once( $widgets_path . 'foley_authors.php' );
require_once( $widgets_path . 'author.php' );
require_once( $widgets_path . 'feedburner_extended.php' );
