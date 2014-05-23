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

<script src="<?php echo get_template_directory_uri(); ?>/_ui/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_ui/js/placeholder.js"></script>
<?php //TODO: include with wp_enqueue_script() ?>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-511069c56122ca9e&domready=1"></script>
		
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 -->
</body>
</html>
