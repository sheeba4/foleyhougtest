<?php 
/**
 * The template for Archive
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
get_header(); ?>

<div id="content" role="main">

	<?php if ( have_posts() ) : ?>

		<h1 class="page-title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'fohopoco' ), '<span>' . get_the_date() . '</span>' ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'fohopoco' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'fohopoco' ) ) . '</span>' ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'fohopoco' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'fohopoco' ) ) . '</span>' ); ?>
			<?php else : ?>
				<?php _e( 'Blog Archives', 'fohopoco' ); ?>
			<?php endif; ?>
		</h1>

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