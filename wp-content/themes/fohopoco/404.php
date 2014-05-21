<?php 
/**
 * The template for 404
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
 get_header(); ?>
	<div id="content" role="main">
		<article class="clearfix post">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'fohopoco' ); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'fohopoco' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	</div>
	<!-- / content -->
	<hr />
	
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
