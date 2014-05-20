<?php get_header(); ?>

<div id="content" role="main">
<?php if ( have_posts() ) : ?>
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'minify' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	
	<?php while ( have_posts() ) : the_post(); ?>
	
	<article class="clearfix post">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-meta">
				<span class="sep">Posted on </span>
				<a href="<?php the_permalink(); ?>" title="Posted on <?php the_time('F jS, Y') ?>" rel="bookmark">
					<time class="entry-date" datetime="<?php the_time('F jS, Y') ?>"><?php the_time('F jS, Y') ?></time>
				</a>
				<!-- / bookmark -->
				
				<span class="by-author">
					<span class="sep"> by </span>
					<span class="author vcard">
						<a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="View all posts by <?php the_author() ?>" rel="author"><?php the_author_meta('display_name'); ?></a>
					</span>
				</span>
				<!-- / by-author -->
			</div>
			<!-- / entry-meta -->
		</header>
		<!-- / header -->
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>
		<!-- / entry-content -->
	</article>
	<!-- / post -->
	
	<?php endwhile; else : ?>
	
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'minify' ); ?></h1>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'minify' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
