<?php 
/**
 * The template for category page
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
get_header(); ?>

<div id="content" role="main">

	<?php if ( have_posts() ) : ?>

		<h1 class="page-title"><?php
			printf( __( 'Category Archives: %s', 'fohopoco' ), '<span>' . single_cat_title( '', false ) . '</span>' );
		?></h1>

		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
		?>
	
		<?php query_posts($query_string . '&showposts=-1'); while ( have_posts() ) : the_post(); ?>

		<article class="clearfix post">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>
			<!-- / entry-content -->
		</article>
		<!-- / post -->

		<?php endwhile; ?>

	<?php else : ?>

		<article id="post-0" class="post clearfix no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title"><?php _e( 'Nothing Found', 'fohopoco' ); ?></h2>
			</header>
			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'fohopoco' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>