<?php
/**
 * Template Name: Contact Form
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<section class="clearfix contact-info">
		<?php if ( ! dynamic_sidebar( 'contact-widgets' ) ) : endif; ?>
	</section>
	<!-- / contact-info -->
	
	<section class="clearfix contact-form">
		<?php the_content(); ?>
	</section>
	<!-- / contact-form -->
	
	<?php endwhile; endif; ?>
</div>
<!-- / content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
