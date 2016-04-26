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
<?php 
	$o = get_option('minify_theme_options'); 
	$footer_container_bg = get_theme_mod( 'footercontainer_bg_image', '');
 
if( $footer_container_bg != ''){ ?>
	</div> <!-- / container -->
	<div class="footer-container clearfix">
<?php } ?>

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

		<?php if ( ! dynamic_sidebar( 'footer-widgets' ) ) : endif; ?>

		<div class="col no-float">
			<h2><?php bloginfo( 'name' ); ?></h2>
			<p>Published by Foley Hoag LLP</p>
			<p>Attorney advertising.<br />
				Prior results do not guarantee a&nbsp;similar outcome.</p>
		</div>
		<!-- / col -->

	</footer>
	<!-- / footer -->
</div> 
<?php if( $footer_container_bg != ''){ ?>	
<!-- / .footer-container -->
<?php } else { ?>
<!-- / container -->
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>