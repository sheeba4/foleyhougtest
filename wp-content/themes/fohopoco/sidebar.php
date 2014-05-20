	<div id="sidebar" role="complementary">

		<nav id="navigation" class="menu">
			<?php  // Main Menu
				wp_nav_menu(
					array(
						'theme_location' 	=> 'nav-main',
						'menu_class' 		=> '',
						'container' 		=> false,
						'walker' 			=> new MINIFY_Clean_Walker_Nav()
					)
				);
			?>
		</nav>
		<!-- / navigation -->
		
		<?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : endif; ?>
	</div>
	<!-- / sidebar -->
	<hr />
