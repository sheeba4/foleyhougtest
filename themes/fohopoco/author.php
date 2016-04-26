<?php 
/**
 * The template for author page
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
get_header(); ?>

<div id="content" role="main">
	<!-- This sets the $curauth variable -->
	<?php
		if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
		else :
		$curauth = get_userdata(intval($author));
		endif;
	?>
<p><a href="feed/">Subscribe to <?php echo $curauth->display_name; ?><img src="<?php echo get_template_directory_uri();?>/_ui/images/common/feed_24.png" style="border:0;" width="12" height="12"></a></p>	
<h1> <a href="<?php echo $curauth->gurl; ?>" rel="me"><?php echo $curauth->display_name; ?></a></h1>
	
	<article class="clearfix post">
		
		<?php //echo get_avatar( $curauth->user_email, '80' ); ?>
		<p><?php echo $curauth->user_description; ?><p>
	</article>
	
	<article class="clearfix post">
		<h2>Posts by <?php echo $curauth->display_name; ?>:</h2>
		<ul>
		<!-- The Loop -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.'); ?></p>
		<?php endif; ?>
		<!-- End Loop -->
		</ul>
	</article>
	
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>