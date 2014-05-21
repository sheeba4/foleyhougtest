<?php
/*
* fohopoco Theme Functions
*/

/*******************************************************************************
 Run fohopoco_setup() when our theme is activated
********************************************************************************/
add_action('after_setup_theme', 'fohopoco_setup');

if (!function_exists('fohopoco_setup')):
	function fohopoco_setup() {
		
		// Add default posts and comments RSS feed links to <head>.
		add_theme_support('automatic-feed-links');
		
		// Add post thumbnails
		add_theme_support('post-thumbnails');
		
		// Add post formats {@link http://codex.wordpress.org/Post_Formats}
		// add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
		
		// Add support for custom backgrounds
		add_theme_support( 'custom-background' );
		
		// Add editor style via editor-style.css
		add_editor_style('editor-style.css');
		
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( 
			array (
				'nav-main' => __('Main Navigation Menu', 'fohopoco'),
				'info-links' => __('Footer Info Links', 'fohopoco'),
			)
		);
		
		// Theme supports shortcode usage in widgets
		add_filter('widget_text', 'do_shortcode');
		add_filter('widget_text', 'shortcode_unautop');
	}
endif; // end of fohopoco_setup()


/*******************************************************************************
 fohopoco Clean Navigation Walker
********************************************************************************/
class fohopoco_Clean_Walker_Nav extends Walker {
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
	
	function end_lvl(&$output,  $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item' ) : array();
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', '', $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a'. $attributes .'>';
		$item_output .= isset( $args->link_before ) ? $args->link_before: '';
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= isset( $args->link_after ) ? $args->link_after : '';
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}


/*******************************************************************************
 Register sidebars and widgetized areas
********************************************************************************/
function fohopoco_widgets_init() {
	
	register_sidebar(array(
		'name' => __('Main sidebar', 'fohopoco'),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="clearfix widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => __('Footer Widgetized Area', 'fohopoco'),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="col %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => __('Contact Page Widgetized Area', 'fohopoco'),
		'id' => 'contact-widgets',
		'before_widget' => '<div id="%1$s" class="col %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action('widgets_init', 'fohopoco_widgets_init');


/*******************************************************************************
 Template for comments and pingbacks
********************************************************************************/
if ( ! function_exists( 'fohopoco_comment' ) ) :
function fohopoco_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'fohopoco' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'fohopoco' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'fohopoco' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'fohopoco' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'fohopoco' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'fohopoco' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'fohopoco' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for fohopoco_comment()


/*******************************************************************************
 Shorten any text you want
********************************************************************************/

function ShortenText($text)
{
	$chars_limit = 100;
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	
	if ($chars_text > $chars_limit)
	{
		$text = $text."...";
	}
	return $text;
}

/*******************************************************************************
 jQuery from google and move js to footer
********************************************************************************/

$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // the URL to check against
$test_url = @fopen($url,'r'); // test parameters
if($test_url !== false) { // test if the URL exists

	function load_external_jQuery() { // load external file
		wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); // register the external file
		wp_enqueue_script('jquery'); // enqueue the external file
	}
	add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function
} else {
	function load_local_jQuery() {
		wp_deregister_script('jquery'); // initiate the function
		wp_register_script('jquery', bloginfo('template_url').'/_ui/js/jquery-1.7.1.min.js', __FILE__, false, '1.7.1', true); // register the local file
		wp_enqueue_script('jquery'); // enqueue the local file
    }
	add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function
}


remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);


/*******************************************************************************
 Google custom field
********************************************************************************/
function fohopoco_user_contactmethods($array){
$array['gurl'] = 'Google profile URL';
 return $array;
 }
 add_filter( 'user_contactmethods', 'fohopoco_user_contactmethods' );

 
/*******************************************************************************
 Rich Text Editor for User Page
********************************************************************************/ 

function kpl_user_bio_visual_editor( $user ) {
	if ( function_exists('wp_editor') && current_user_can('publish_posts') ):
	?>
	<script type="text/javascript">
	(function($){
		$('#description').parents('tr').remove();
	})(jQuery);
	</script>
 	<table class="form-table">
		<tr>
			<th><label for="description"><?php _e('Biographical Info'); ?></label></th>
			<td>
				<?php 
				$description = get_user_meta( $user->ID, 'description', true);
				wp_editor( $description, 'description' ); 
				?>
				<p class="description"><?php _e('Share a little biographical information to fill out your profile. This may be shown publicly.'); ?></p>
			</td>
		</tr>
	</table>
	<?php
	endif;
}
add_action('show_user_profile', 'kpl_user_bio_visual_editor');
add_action('edit_user_profile', 'kpl_user_bio_visual_editor');
 
function kpl_user_bio_visual_editor_unfiltered() {
	remove_all_filters('pre_user_description');
}
add_action('admin_init','kpl_user_bio_visual_editor_unfiltered');


function fh_excerpt_more( $more ) {
	return '... <a href="' . the_permalink() .'">More</a>';
}
add_filter('excerpt_more', 'fh_excerpt_more');
