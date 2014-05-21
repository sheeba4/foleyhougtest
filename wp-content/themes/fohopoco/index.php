<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="clearfix post">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="entry-meta">
				<span class="sep">Posted on </span>
				<a href="<?php the_permalink(); ?>" title="Posted on <?php the_time('F jS, Y') ?>" rel="bookmark">
					<time class="entry-date" datetime="<?php the_time('F jS, Y') ?>"><?php the_time('F jS, Y') ?></time>
				</a>
				<!-- / bookmark -->

<?php $authorrole = esc_attr(get_the_author_meta

('user_level') );
	if ($authorrole == 1) { ?>
<span class="by-author">
	<span class="sep"> by </span>
	<span class="author vcard"><strong><?php 

the_author_meta('display_name'); ?></strong></span>
</span>

	<?php } else {?>

		<span class="by-author">
	<span class="sep"> by </span>
	<span class="author vcard">
		<a class="url fn n" href="<?php echo 

get_author_posts_url(get_the_author_meta( 'ID' )); ?>" 

title="View all posts by <?php the_author() ?>" 

rel="author"><?php the_author_meta('display_name'); ?></a>
	</span>
</span>
<!-- / by-author -->

<?php } ?>
			</div>
			<!-- / entry-meta -->
		</header>
		<!-- / header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>
		<!-- / entry-content -->

		<footer class="entry-meta">
			
			<span class="tag-links">
				<?php if ( has_tag() ){ ?><span class="mrgn"><?php the_tags('<span class="entry-utility-prep entry-utility-prep-tag-links">Tags:</span> ', ', ', ''); ?></span><?php } ?>
				<span class="entry-utility-prep entry-utility-prep-category-links">Categories:</span> <?php the_category(', '); ?>
			</span>
			<!-- / tag-links -->
			
			<?php if(function_exists('wp_email')) { email_link(); } ?>
			<?php if(function_exists('wp_print')) { print_link(); } ?>
			<a class="link link-comments" href="<?php comments_link(); ?>"><span class="icon icon-comments"></span>Comments</a>
			<a class="link link-trackbacks" href="<?php trackback_url(); ?>"><span class="icon icon-trackbacks"></span>Trackbacks</a>
			<span class='link st_sharethis_hcount' displayText='ShareThis' st_url='<?php the_permalink(); ?>'></span>            
			<a href="https://twitter.com/share?url=<?php the_permalink(); ?>" class="link twitter-share-button" style="margin-top: 0 !important;">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<div class="link fb-like" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" href='<?php the_permalink(); ?>'></div>
		</footer>
		<!-- / entry-footer -->
	</article>
	<!-- / post -->
	<?php endwhile; ?>
		
	<?php else : ?>
	
	<?php endif; ?>
<div class="navigation"><p><?php posts_nav_link(' &mdash; ','&laquo; Newer Posts','Older Posts &raquo;'); ?></p></div>

</div>
<!-- / content -->
<hr />
<?php get_sidebar(); ?>
<?php get_footer(); ?>