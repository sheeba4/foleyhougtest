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

function fohopoco_scripts() {
	//TODO: use this instead of direct all from teh header.
  // wp_enqueue_style('fohopoco_main', get_template_directory_uri() . '/_ui/js/main.css', false, '1.0');

  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, false);
    add_filter('script_loader_src', 'fohopoco_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('fohopoco_main', get_template_directory_uri() . '/_ui/js/main.js', array('jquery'), '1.0', true);
  wp_register_script('fohopoco_placeholder', get_template_directory_uri() . '/_ui/js/placeholder.js', array('jquery'), '1.0', true);
  wp_register_script('fohopoco_addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-511069c56122ca9e&domready=1', array('fohopoco_main'), '1.0', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('fohopoco_main');
  wp_enqueue_script('fohopoco_placeholder');
  wp_enqueue_script('fohopoco_addthis');
}
add_action('wp_enqueue_scripts', 'fohopoco_scripts', 100);

function fohopoco_jquery_local_fallback(){
	wp_register_script('jquery', get_template_directory_uri() .'/_ui/js/jquery-1.7.1.min.js', __FILE__, false, '1.7.1', true); // register the local file
}
/*******************************************************************************
 Fohopoco Clean Navigation Walker
********************************************************************************/
class Fohopoco_Clean_Walker_Nav extends Walker {
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
function load_local_jQuery() {
	wp_deregister_script('jquery'); // initiate the function
	wp_register_script('jquery', get_template_directory_uri().'/_ui/js/jquery-1.7.1.min.js', __FILE__, false, '1.7.1', true); // register the local file
	wp_enqueue_script('jquery'); // enqueue the local file
}
add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function



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
//
//function fohopoco_wp_trim_excerpt( $text ) {
//	$raw_excerpt = $text;
//	if ( '' == $text ) {
//		$text = get_the_content('');
//
//		$text = strip_shortcodes( $text );
//
//
//		$text = apply_filters('the_content', $text);
//		$text = str_replace(']]>', ']]&gt;', $text);
//		$text = strip_tags( $text, '<p><a><img>' );
//
//		$excerpt_length = apply_filters('excerpt_length', 100);
//		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
//		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
//		if ( count($words) > $excerpt_length ) {
//			array_pop($words);
//			$text = implode(' ', $words);
//			$text = $text . $excerpt_more;
//		} else {
//			$text = implode(' ', $words);
//		}
//	}
//	return $text;
//}
//remove_filter('get_the_excerpt', 'wp_trim_excerpt');
//add_filter('get_the_excerpt', 'fohopoco_wp_trim_excerpt');
//

function fohopoco_excerpt_more( $more ) {
	global $post;
	return '... <a href="' . esc_url( get_permalink( $post->ID ) ) .'">More</a>';
}
add_filter('excerpt_more', 'fohopoco_excerpt_more');

function wpse_allowedtags() {
	// Add custom tags to this string
	return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
}

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) {
	function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
		$raw_excerpt = $wpse_excerpt;
		if ( '' == $wpse_excerpt ) {

			$wpse_excerpt = get_the_content('');
			$wpse_excerpt = strip_shortcodes( $wpse_excerpt );
			$wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
			$wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
			$wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

			//Set the excerpt word count and only break after sentence is complete.
			$excerpt_word_count = 75;
			$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
			$tokens = array();
			$excerptOutput = '';
			$count = 0;

			// Divide the string into tokens; HTML tags, or words, followed by any whitespace
			preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

			foreach ($tokens[0] as $token) {

				if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
					// Limit reached, continue until , ; ? . or ! occur at the end
					$excerptOutput .= trim($token);
					break;
				}

				// Add words to complete sentence
				$count++;

				// Append what's left of the token
				$excerptOutput .= $token;
			}

			$wpse_excerpt = trim(force_balance_tags($excerptOutput));

			$excerpt_end = '';
			$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

			$pos = strrpos($wpse_excerpt, '</');
			if ($pos !== false){
				//Inside last HTML tag
				$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
			} else {
				// After the content
				$wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */
			}

			return $wpse_excerpt;

		}
		return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
	}
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt');


add_action( 'save_post', 'fohopoco_save_metadata' );
add_action( 'add_meta_boxes', 'fohopoco_add_meta_boxes' );

if ( ! function_exists( 'fohopoco_add_meta_boxes' ) ) {

  function fohopoco_add_meta_boxes( $post ) {
    global $post;

    /* Add post meta for external url link */
    add_meta_box( 'display_option', __( 'Display Option for Homepage', 'fohopoco' ), 'fohopoco_display_option_metabox', 'post', 'normal', 'high' );
  }

}

if ( ! function_exists( 'fohopoco_display_option_metabox' ) ) {
	function fohopoco_display_option_metabox( $post ) {
	  // Use nonce for verification
	  wp_nonce_field( 'fohopoco_display_option', 'fohopoco_display_option_noncename' );

	  $fohopoco_display_option = get_post_meta( $post->ID, '_fohopoco_display_option', true );
	  $fields = array(
	  	'excerpt'       => __('Preview', 'fohopoco'),
	    'content'     => __('Full Content', 'fohopoco'),
	    );
	  if ( ! $fohopoco_display_option ){
	  	$fohopoco_display_option = 'excerpt';
	  }
	?>

	  <p>
	    <label>
	      <?php _e( 'Display Option for Homepage:', 'fohopoco' ); ?>
	    </label><br />
	    <?php foreach( $fields as $key => $label ){ 
	        printf(
	            '<input type="radio" name="_fohopoco_display_option" value="%1$s" id="_fohopoco_display_option[%1$s]" %3$s />'.
	            '<label for="_fohopoco_display_option[%1$s]"> %2$s ' .
	            '</label><br>',
	            esc_attr( $key ),
	            esc_html( $label ),
	            checked( $fohopoco_display_option, $key, false )
	        );
	    } ?>
	  </p>
	  <?php
	}
}

/**
 * Validate, sanitize, and save post metadata.
 */
if ( ! function_exists( 'fohopoco_save_metadata' ) ) {
	function fohopoco_save_metadata( $post_id ) {

	  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	    return;


	  if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] ) {
	    if ( ! current_user_can( 'edit_page', $post_id ) )
	      return;
	  } else {
	    if ( ! current_user_can( 'edit_post', $post_id ) )
	      return;
	  }

	  $post_ID = isset( $_POST['post_ID'] ) ? $_POST['post_ID']: '';

	  // Secondly we need to check if the user intended to change this value.
	  $fohopoco_custom_fields = array( 'fohopoco_display_option' );
	  foreach ( $fohopoco_custom_fields as $fohopoco_custom ) {
	    if ( isset( $_POST[$fohopoco_custom . '_noncename'] ) && wp_verify_nonce( $_POST[ $fohopoco_custom . '_noncename'], $fohopoco_custom )  ) {	     
	      // clean and validate data.
	      ${$fohopoco_custom} =  $_POST['_' . $fohopoco_custom];
	      if ( isset( ${$fohopoco_custom} ) && ! empty( ${$fohopoco_custom} ) )
	        update_post_meta( $post_ID, '_' . $fohopoco_custom, ${$fohopoco_custom} );
	      else
	        delete_post_meta( $post_ID, '_' . $fohopoco_custom );	      	
	    }
	  }
	}
}
