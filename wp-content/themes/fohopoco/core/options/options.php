<?php 

class fohopoco_Options {
	
	public $options;
	
	public function __construct()
	{
		$this->options = get_option('fohopoco_theme_options');
		$this->register_settings_and_fields();
	}
	
	public static function add_menu_page()
	{
		add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', __FILE__, array('fohopoco_Options', 'display_options_page'));
	}
	
	public function display_options_page()
	{
		?>
	
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Theme Options</h2>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php settings_fields('fohopoco_theme_options'); ?>
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
		register_setting('fohopoco_theme_options', 'fohopoco_theme_options');
		add_settings_section('fohopoco_social_section', 'Social Networks Settings', array($this, 'fohopoco_social_section_cb'), __FILE__);
			add_settings_field('fohopoco_twitter_username', 'Twitter Username', array($this, 'fohopoco_twitter_setting'), __FILE__, 'fohopoco_social_section');
			add_settings_field('fohopoco_facebook_id', 'Facebook Page ID', array($this, 'fohopoco_facebook_setting'), __FILE__, 'fohopoco_social_section');
			add_settings_field('fohopoco_linkedin_url', 'LinkedIn Page URL', array($this, 'fohopoco_linkedin_setting'), __FILE__, 'fohopoco_social_section');
			add_settings_field('fohopoco_newsletter_url', 'Newsletter URL', array($this, 'fohopoco_newsletter_setting'), __FILE__, 'fohopoco_social_section');
		
		add_settings_section('fohopoco_footer_section', 'Footer Settings', array($this, 'fohopoco_footer_section_cb'), __FILE__);
			add_settings_field('fohopoco_copyright_text', 'Footer Copyright Text', array($this, 'fohopoco_copyright_setting'), __FILE__, 'fohopoco_footer_section');
	}
	
	public function fohopoco_social_section_cb()
	{
		// optional
	}
	
	public function fohopoco_footer_section_cb()
	{
		// optional
	}
	
	/* Social Networks Settings
	 ***************************************************************************************************/
	 
	// Twitter
	public function fohopoco_twitter_setting()
	{
		echo "<input class='regular-text code' name='fohopoco_theme_options[fohopoco_twitter_username]' type='text' value='{$this->options['fohopoco_twitter_username']}' />";
		echo "<span class='description'>Enter your Twitter username: eg. <code>Twitter</code></span>";
	}
	
	// Facebook
	public function fohopoco_facebook_setting()
	{
		echo "<input class='regular-text code' name='fohopoco_theme_options[fohopoco_facebook_id]' type='text' value='{$this->options['fohopoco_facebook_id']}' />";
		echo "<span class='description'>Enter your Facebook page ID: eg. <code>twitterapi</code></span>";
	}
	
	// LinkedIn
	public function fohopoco_linkedin_setting()
	{
		echo "<input class='regular-text code' name='fohopoco_theme_options[fohopoco_linkedin_url]' type='text' value='{$this->options['fohopoco_linkedin_url']}' />";
		echo "<span class='description'>Enter your LinkedIn page URL: eg. <code>www.linkedin.com/company/twitter</code>. Leave <code>http://</code> outside</span>";
	}
	
	// Newsletter
	public function fohopoco_newsletter_setting()
	{
		echo "<input class='regular-text code' name='fohopoco_theme_options[fohopoco_newsletter_url]' type='text' value='{$this->options['fohopoco_newsletter_url']}' />";
		echo "<span class='description'>Enter your Newsletter Sign Up page URL: eg. <code>www.twitter.com</code>. Leave <code>http://</code> outside</span>";
	}
	
	/* Footer Settings
	 ***************************************************************************************************/
	
	// Copyright Text
	public function fohopoco_copyright_setting()
	{
		echo "<input class='regular-text' name='fohopoco_theme_options[fohopoco_copyright_text]' type='text' value='{$this->options['fohopoco_copyright_text']}' />";
		echo "<span class='description'>Enter text to be displayed in footer for Copyright: eg. <kbd>Copyright &copy 2012, Company Name. All rights reserved.</kbd></span>";
	}
}

add_action('admin_menu', 'minopt_amp');

function minopt_amp() {
	fohopoco_Options::add_menu_page();
}

add_action('admin_init', 'minopt');

function minopt() {
	new fohopoco_Options();
}

?>
