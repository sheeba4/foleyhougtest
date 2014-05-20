<?php 

class MINIFY_Options {
	
	public $options;
	
	public function __construct()
	{
		$this->options = get_option('minify_theme_options');
		$this->register_settings_and_fields();
	}
	
	public function add_menu_page()
	{
		add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', __FILE__, array('MINIFY_Options', 'display_options_page'));
	}
	
	public function display_options_page()
	{
		?>
	
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Theme Options</h2>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php settings_fields('minify_theme_options'); ?>
				<?php do_settings_sections(__FILE__); ?>
				
				
				<p class="submit">
					<input name="submit" type="submit" class="button-primary" value="Save Changes" />
				</p>
			</form>
		</div>
	
		<?php
	}
	
	public function register_settings_and_fields()
	{
		register_setting('minify_theme_options', 'minify_theme_options');
		add_settings_section('minify_social_section', 'Social Networks Settings', array($this, 'minify_social_section_cb'), __FILE__);
			add_settings_field('minify_twitter_username', 'Twitter Username', array($this, 'minify_twitter_setting'), __FILE__, 'minify_social_section');
			add_settings_field('minify_facebook_id', 'Facebook Page ID', array($this, 'minify_facebook_setting'), __FILE__, 'minify_social_section');
			add_settings_field('minify_linkedin_url', 'LinkedIn Page URL', array($this, 'minify_linkedin_setting'), __FILE__, 'minify_social_section');
			add_settings_field('minify_newsletter_url', 'Newsletter URL', array($this, 'minify_newsletter_setting'), __FILE__, 'minify_social_section');
		
		add_settings_section('minify_footer_section', 'Footer Settings', array($this, 'minify_footer_section_cb'), __FILE__);
			add_settings_field('minify_copyright_text', 'Footer Copyright Text', array($this, 'minify_copyright_setting'), __FILE__, 'minify_footer_section');
	}
	
	public function minify_social_section_cb()
	{
		// optional
	}
	
	public function minify_footer_section_cb()
	{
		// optional
	}
	
	/* Social Networks Settings
	 ***************************************************************************************************/
	 
	// Twitter
	public function minify_twitter_setting()
	{
		echo "<input class='regular-text code' name='minify_theme_options[minify_twitter_username]' type='text' value='{$this->options['minify_twitter_username']}' />";
		echo "<span class='description'>Enter your Twitter username: eg. <code>Twitter</code></span>";
	}
	
	// Facebook
	public function minify_facebook_setting()
	{
		echo "<input class='regular-text code' name='minify_theme_options[minify_facebook_id]' type='text' value='{$this->options['minify_facebook_id']}' />";
		echo "<span class='description'>Enter your Facebook page ID: eg. <code>twitterapi</code></span>";
	}
	
	// LinkedIn
	public function minify_linkedin_setting()
	{
		echo "<input class='regular-text code' name='minify_theme_options[minify_linkedin_url]' type='text' value='{$this->options['minify_linkedin_url']}' />";
		echo "<span class='description'>Enter your LinkedIn page URL: eg. <code>www.linkedin.com/company/twitter</code>. Leave <code>http://</code> outside</span>";
	}
	
	// Newsletter
	public function minify_newsletter_setting()
	{
		echo "<input class='regular-text code' name='minify_theme_options[minify_newsletter_url]' type='text' value='{$this->options['minify_newsletter_url']}' />";
		echo "<span class='description'>Enter your Newsletter Sign Up page URL: eg. <code>www.twitter.com</code>. Leave <code>http://</code> outside</span>";
	}
	
	/* Footer Settings
	 ***************************************************************************************************/
	
	// Copyright Text
	public function minify_copyright_setting()
	{
		echo "<input class='regular-text' name='minify_theme_options[minify_copyright_text]' type='text' value='{$this->options['minify_copyright_text']}' />";
		echo "<span class='description'>Enter text to be displayed in footer for Copyright: eg. <kbd>Copyright &copy 2012, Company Name. All rights reserved.</kbd></span>";
	}
}

add_action('admin_menu', 'minopt_amp');

function minopt_amp() {
	MINIFY_Options::add_menu_page();
}

add_action('admin_init', 'minopt');

function minopt() {
	new MINIFY_Options();
}

?>
