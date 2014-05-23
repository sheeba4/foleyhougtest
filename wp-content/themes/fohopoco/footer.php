<?php 
/**
 * The template for 404
 *
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */
?>
 	<?php $o = get_option('minify_theme_options'); ?>
	
	<footer id="footer" class="clearfix">
		<div class="clearfix row">
			<?php  // Footer Custom Menu Walker
				wp_nav_menu(
					array(
						'theme_location' 	=> 'info-links',
						'menu_class' 		=> 'info-links',
						'container' 		=> false,
						'walker' 			=> new Fohopoco_Clean_Walker_Nav()
					)
				);
			?>
			<!-- / info-links -->
			<p class="copyright" role="contentinfo"><?php echo $o['minify_copyright_text']; ?></p>
		</div>
		<!-- / row -->
		
		<div class="col">
			<h2>Corporate Social Responsibility and the Law</h2>
			<p>Published by Foley Hoag LLP</p>
			<p>Attorney advertising.<br />
				Prior results do not guarantee a&nbsp;similar outcome.</p>
		</div>
		<!-- / col -->
		
		<?php if ( ! dynamic_sidebar( 'footer-widgets' ) ) : endif; ?>
		
	</footer>
	<!-- / footer -->
</div>
<!-- / container -->

<?php wp_footer(); ?>

</body>
</html>
