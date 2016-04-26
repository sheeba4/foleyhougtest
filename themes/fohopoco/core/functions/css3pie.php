<?php
function css_pie ( $vars )
{
	$vars[] = 'pie';
	return $vars;
}

add_filter( 'query_vars' , 'css_pie');
function load_pie() 
{
	if ( get_query_var( 'pie' ) == "true" )
	{
		header( 'Content-type: text/x-component' );
		include( TEMPLATEPATH .'/_ui/js/PIE.htc' );
		exit;
	}
}
add_action( 'template_redirect', 'load_pie' );
?>
