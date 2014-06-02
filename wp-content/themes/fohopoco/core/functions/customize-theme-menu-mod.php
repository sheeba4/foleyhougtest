<?php
/**
 * Custom css features for for FOHOPOCO theme
 *
 * @package WordPress
 * @subpackage fohopoco
 * @since fohopoco 1.0
 */

add_action( 'customize_register', 'fohopoco_customize_theme' );

function fohopoco_customize_theme( $wp_customize ) {

	/**
	* Customize Image Reloaded Class
	*
	* Extend WP_Customize_Image_Control allowing access to uploads made within
	* the same context
	* Declaring this inside the customize theme function due to scope issues
	* with wp bootloader.
	*
	*/
	class Fohopoco_Customize_Image_Reloaded_Control extends WP_Customize_Image_Control {
		/**
		* Constructor.
		*
		* @since 3.4.0
		* @uses WP_Customize_Image_Control::__construct()
		*
		* @param WP_Customize_Manager $manager
		*/
		public function __construct( $manager, $id, $args = array() ) {

		parent::__construct( $manager, $id, $args );

		}

		/**
		* Search for images within the defined context
		* If there's no context, it'll bring all images from the library
		*
		*/
		public function tab_uploaded() {
		$my_context_uploads = get_posts( array(
		    'post_type'  => 'attachment',
		    'meta_key'   => '_wp_attachment_context',
		    'meta_value' => $this->context,
		    'orderby'    => 'post_date',
		    'nopaging'   => true,
		) );

		?>

		<div class="uploaded-target"></div>

		<?php
		if ( empty( $my_context_uploads ) )
		    return;

		foreach ( (array) $my_context_uploads as $my_context_upload )
		    $this->print_tab_image( esc_url_raw( $my_context_upload->guid ) );
		}

	} // end class.
	
	/**
	* Customize Textarea Control Class
	*
	* Extend WP_Customize_Control to create a textarea control
	*
	*/
	class Fohopoco_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	} // end class.
	
	
	/**
	* Background Image Tab
	*/
	
	// Header Image
	$wp_customize->add_setting( 'header_image', array(
			'default' => '', 
			'transport' => 'refresh',
	) );
	$wp_customize->add_control( new Fohopoco_Customize_Image_Reloaded_Control( $wp_customize, 'header_image', array(
			'label' => __( 'Header Image (451px x 230px)' ),
			'section' => 'background_image',
			'settings' => 'header_image',
			'context' => 'header-image',
			'priority' => 1,

	) ) );
	// Header Custom CSS
	$wp_customize->add_setting( 'header_custom_css', array(
			'default' => '', 
			'transport' => 'refresh',
	) );
	$wp_customize->add_control( new Fohopoco_Customize_Textarea_Control( $wp_customize, 'header_custom_css', array(
		'label'   => 'Header Custom CSS',
		'section' => 'background_image',
		'settings'   => 'header_custom_css',
		'priority' => 1,
	) ) );
	
	// Header Background Image
	$wp_customize->add_setting( 'header_bg_image', array(
			'default' => '', 
			'transport' => 'refresh',
	) );
	$wp_customize->add_control( new Fohopoco_Customize_Image_Reloaded_Control( $wp_customize, 'header_bg_image', array(
			'label' => __( 'Header Background Image (920px x 303px)' ),
			'section' => 'background_image',
			'settings' => 'header_bg_image',
			'context' => 'header-bg-image',
			'priority' => 2,

	) ) );
	
	
	// Content Background Image
	$wp_customize->add_setting( 'content_bg_image', array(
			'default' => '', 
			'transport' => 'refresh',
	) );

	$wp_customize->add_control( new Fohopoco_Customize_Image_Reloaded_Control( $wp_customize, 'content_bg_image', array(
			'label' => __( 'Content Background Image (920px x 2px)' ),
			'section' => 'background_image',
			'settings' => 'content_bg_image',
			'context' => 'content-bg-image',
			'priority' => 3
	) ) );
	
	// Footer Container
	$wp_customize->add_setting( 'footercontainer_bg_image', array(
			'default' => '', 
			'transport' => 'refresh',
	) );

	$wp_customize->add_control( new Fohopoco_Customize_Image_Reloaded_Control( $wp_customize, 'footercontainer_bg_image', array(
			'label' => __( 'Footer Container Background Image (2px x 114px)' ),
			'section' => 'background_image',
			'settings' => 'footercontainer_bg_image',
			'context' => 'footercontainer_bg_image',
			'priority' => 4,

	) ) );
	
	// Footer Background 
	$wp_customize->add_setting( 'footer_bg_image', array(
			'default' => '', 
			'transport' => 'refresh',
	) );

	$wp_customize->add_control( new Fohopoco_Customize_Image_Reloaded_Control( $wp_customize, 'footer_bg_image', array(
			'label' => __( 'Footer Background Image (920px x 114px)' ),
			'section' => 'background_image',
			'settings' => 'footer_bg_image',
			'context' => 'footer-bg-image',
			'priority' => 4,

	) ) );

	/**
	* Colors Tab
	*/
	
	// H1
	$wp_customize->add_setting( 'h1_link_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'h1_link_color', array(
				'label'		=> 'H1 Link Color',
				'section'	=> 'colors',
				'settings'	=> 'h1_link_color',
				'priority' => 0
			) ) 
	);
	
	// H1 Hover
	$wp_customize->add_setting( 'h1_linkhover_color', array(
			'default'		=> '#eeaf30',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'h1_linkhover_color', array(
				'label'		=> 'H1 Link Hover Color',
				'section'	=> 'colors',
				'settings'	=> 'h1_linkhover_color',
				'priority' => 1
			) ) 
	);
	
	// Body Background
	$wp_customize->add_setting( 'body_bg_color', array(
			'default'		=> '#fff',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'body_bg_color', array(
				'label'		=> 'Body Background Color',
				'section'	=> 'colors',
				'settings'	=> 'body_bg_color',
				'priority' => 2
			) ) 
	);
	// Body Text Color
	$wp_customize->add_setting( 'body_color', array(
			'default'		=> '#444',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'body_color', array(
				'label'		=> 'Body Text Color',
				'section'	=> 'colors',
				'settings'	=> 'body_color',
				'priority' => 3
			) ) 
	);
	
	// Body Links
	$wp_customize->add_setting( 'body_link_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'body_link_color', array(
				'label'		=> 'Body Link Color',
				'section'	=> 'colors',
				'settings'	=> 'body_link_color',
				'priority' => 4
			) ) 
	);
	
	// Body Links Hover
	$wp_customize->add_setting( 'body_linkhover_color', array(
			'default'		=> '#eeaf30',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'body_linkhover_color', array(
				'label'		=> 'Body Link Hover Color',
				'section'	=> 'colors',
				'settings'	=> 'body_linkhover_color',
				'priority' => 5
			) ) 
	);
	
	// Navigation Menu
	$wp_customize->add_setting( 'navmenu_bg_color', array(
			'default'		=> '#eeaf30',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'navmenu_bg_color', array(
				'label'		=> 'Nav Menu BG Color',
				'section'	=> 'colors',
				'settings'	=> 'navmenu_bg_color',
				'priority' => 6
			) ) 
	);
	// Navigation Menu Hover
	$wp_customize->add_setting( 'navmenu_bghover_color', array(
			'default'		=> '#fba01d',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'navmenu_bghover_color', array(
				'label'		=> 'Nav Menu BG Hover/Active Color',
				'section'	=> 'colors',
				'settings'	=> 'navmenu_bghover_color',
				'priority' => 7
			) ) 
	);
	
	// Buttons
	$wp_customize->add_setting( 'button_bg_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'button_bg_color', array(
				'label'		=> 'Button Color',
				'section'	=> 'colors',
				'settings'	=> 'button_bg_color',
				'priority' => 8
			) ) 
	);
	// Button Hover
	$wp_customize->add_setting( 'button_bghover_color', array(
			'default'		=> '#eeaf30',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'button_bghover_color', array(
				'label'		=> 'Button Hover Color',
				'section'	=> 'colors',
				'settings'	=> 'button_bghover_color',
				'priority' => 9
			) ) 
	);
	
	
	// Footer Copyright Text
	$wp_customize->add_setting( 'footer_copyright_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_copyright_color', array(
				'label'		=> 'Footer Copyright Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_copyright_color',
				'priority' => 10
			) ) 
	);
	
	// Footer Text
	$wp_customize->add_setting( 'footer_color', array(
			'default'		=> '#333',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_color', array(
				'label'		=> 'Footer Text Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_color',
				'priority' => 11
			) ) 
	);
	$wp_customize->add_setting( 'footer_link_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_link_color', array(
				'label'		=> 'Footer Link Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_link_color',
				'priority' => 12
			) ) 
	);
	// Footer Links Hover
	$wp_customize->add_setting( 'footer_linkhover_color', array(
			'default'		=> '#eeaf30',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_linkhover_color', array(
				'label'		=> 'Footer Link Hover Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_linkhover_color',
				'priority' => 13
			) ) 
	);
	// Footer Info Link
	$wp_customize->add_setting( 'footer_infolink_color', array(
			'default'		=> '#009aa6',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_infolink_color', array(
				'label'		=> 'Footer Info Link Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_infolink_color',
				'priority' => 14
			) ) 
	);
	
	// Footer Background Color
	$wp_customize->add_setting( 'footer_bg_color', array(
			'default'		=> '#fff',
			'transport'		=> 'postMessage'
		) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'footer_bg_color', array(
				'label'		=> 'Footer Background Color',
				'section'	=> 'colors',
				'settings'	=> 'footer_bg_color',
				'priority' => 16
			) ) 
	);
	

}

add_action( 'customize_preview_init', 'fohopoco_customize_customize_preview_js' );

function fohopoco_customize_customize_preview_js() {
	wp_enqueue_script( 
		'fohopoco-theme-customizer', 
		get_template_directory_uri() .  '/js/customize-theme-menu-mod.js', 
		array( 'customize-preview' ), false, true 
	);
}

add_action( 'wp_head', 'fohopoco_customize_add_customizer_css' );

add_action( 'customize_controls_print_styles', 'fohopoco_customize_add_customizer_css' );

/**
 * This function actually spits out the css inline in the head. It will modify the fonts of whatever is selected
 */
function fohopoco_customize_add_customizer_css() {
	
	$style_options = get_theme_mods();
	$body_color = !empty($style_options['body_color']) ? $style_options['body_color'] : '#444';
	$body_bg_color = !empty($style_options['body_bg_color']) ? $style_options['body_bg_color'] : '#fff';
	$body_background_image = !empty($style_options['background_image']) ? $style_options['background_image'] : '';
	$body_link_color = !empty($style_options['body_link_color']) ? $style_options['body_link_color'] : '#009aa6';
	$body_linkhover_color = !empty($style_options['body_linkhover_color']) ? $style_options['body_linkhover_color'] : '#eeaf30';
	$header_bg_image = !empty($style_options['header_bg_image']) ? $style_options['header_bg_image'] : '';
	$header_image = !empty($style_options['header_image']) ? $style_options['header_image'] : '';
	$header_custom_css = !empty($style_options['header_custom_css']) ? $style_options['header_custom_css'] : '';
	$h1_link_color = !empty($style_options['h1_link_color']) ? $style_options['h1_link_color'] : '#009aa6';
		$h1_linkhover_color = !empty($style_options['h1_linkhover_color']) ? $style_options['h1_linkhover_color'] : '#eeaf30';
		$navmenu_bg_color = !empty($style_options['navmenu_bg_color']) ? $style_options['navmenu_bg_color'] : '#eeaf30';
		$navmenu_bghover_color = !empty($style_options['navmenu_bghover_color']) ? $style_options['navmenu_bghover_color'] : '#fba01d';
		$button_bg_color = !empty($style_options['button_bg_color']) ? $style_options['button_bg_color'] : '#009aa6';
		$button_bghover_color = !empty($style_options['button_bghover_color']) ? $style_options['button_bghover_color'] : '#eeaf30';
		$footercontainer_bg_image = !empty($style_options['footercontainer_bg_image']) ? $style_options['footercontainer_bg_image'] : '';
		$footer_bg_image = !empty($style_options['footer_bg_image']) ? $style_options['footer_bg_image'] : '';
		$footer_color = !empty($style_options['footer_color']) ? $style_options['footer_color'] : '#333';
		$footer_bg_color = !empty($style_options['footer_bg_color']) ? $style_options['footer_bg_color'] : '#fff';
		$footer_infolink_color = !empty($style_options['footer_infolink_color']) ? $style_options['footer_infolink_color'] : '#009aa6';
		$footer_link_color = !empty($style_options['footer_link_color']) ? $style_options['footer_link_color'] : '#009aa6';
		$footer_linkhover_color = !empty($style_options['footer_linkhover_color']) ? $style_options['footer_linkhover_color'] : '#eeaf30';
		$footer_copyright_color = !empty($style_options['footer_copyright_color']) ? $style_options['footer_copyright_color'] : '#009aa6';
	?>
	<style>
		html body { 
			color: <?php echo $body_color; ?>; 
			background: <?php echo $body_bg_color; ?> url(<?php echo $body_background_image; ?>) repeat-x 0 0;
			background-attachment: inherit;
		}
		#navigation a:hover {
			font-weight: normal;
		}
		#sidebar .widget a {
			color: <?php echo $body_link_color; ?>; 
		}
		#sidebar .widget a:hover {
			color: <?php echo $body_linkhover_color; ?>; 
		}
		
		#header { background: url(<?php	echo $header_bg_image; ?>) no-repeat; }
		
		#header .site-name span { 
			background: url(<?php echo $header_image; ?>) no-repeat; 
			<?php echo ($header_custom_css != '') ? $header_custom_css : ''; ?>
		}

		#content h1, #content h1 a { color: <?php echo $h1_link_color; ?>; }
		#content h1 a:hover { color: <?php echo $h1_linkhover_color; ?>; }

		#content a { color: <?php echo $body_link_color; ?>; }
		#content a:hover { color: <?php	echo $body_linkhover_color; ?>; }
		
		#navigation li {  background: <?php echo $navmenu_bg_color; ?>;  }
		#navigation li:hover, #navigation .current-menu-item {  
			background: <?php echo $navmenu_bghover_color; ?>;  
			font-weight: inherit;	
		}
		.widget #searchsubmit, .widget #feedburner_email_widget_sbef_submit {
			background: <?php echo $button_bg_color; ?>;	
		}
		.widget #searchsubmit:hover, .widget #feedburner_email_widget_sbef_submit:hover {
			background: <?php echo $button_bghover_color; ?>;	
		}
		.footer-container { 
			clear: both;
			position: relative;
			<?php if ($footercontainer_bg_image) { ?>
				background: #393b3e url(<?php echo $footercontainer_bg_image; ?>) repeat-x 0 0; 
			<?php } ?>
		}
		#footer {
			background: <?php echo $body_bg_color; ?> url(<?php echo $footer_bg_image; ?>) no-repeat;
			color: <?php echo $footer_color; ?>;
		}
		#footer .info-links, #footer .info-links a {
			color: <?php echo $footer_infolink_color; ?>;
		}
		#footer .info-links li + li { border-color: <?php echo $footer_infolink_color; ?>;}
		#footer .col strong, #footer .col a {
			color: <?php echo $footer_link_color; ?>; 
		}
		#footer .col a:hover, #footer .col strong:hover {
			color: <?php echo $footer_linkhover_color; ?>; 
		}
		#footer .copyright {
			color: <?php echo $footer_copyright_color; ?>; 
		}

	</style>
	<?php
}