<?php

class User_Profile {
	public function __construct() {
//		add_action( 'admin_print_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'show_user_profile', array( $this, 'render_user_form' ) );
		add_action( 'edit_user_profile', array( $this, 'render_user_form' ) );
		add_action( 'personal_options_update', array( $this, 'save_user_form' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_user_form' ) );
	}

	/**
	 * Add admin script
	 * @return void
	 */
	function admin_scripts() {
		wp_enqueue_media();
		wp_register_script('foley_user', get_template_directory_uri() . '/_ui/js/user_profile.admin.js', array('jquery','media-upload','thickbox'), '1.0.3' );
		wp_enqueue_script('foley_user');
	}

	/**
	 * @param $user
	 */
	public function render_user_form( $user ){ ?>
		<h3>Profile Image Override</h3>

		<table class="form-table">
			<tr>
				<th><label for="profile_image"><?php esc_html_e( 'File Url:', 'fohopoco' ); ?></label></th>
				<?php $profile_image = get_the_author_meta( 'profile_image', $user->ID ); ?>

				<td>
					<input type="text" class="text" size="60" name="profile_image" id="profile_image" value="<?php echo esc_url( $profile_image );?>">
					<input type="button" id="profile_image-button" class="button" value="<?php _e( 'Choose or Upload a file' );?>">
					<p class="description">Please enter your url for the image or upload</p>
				</td>
			</tr>
		</table>
	<?php
	}

	/**
	 * @param $user_id
	 *
	 * @return bool
	 */
	public function save_user_form( $user_id ){
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_usermeta( $user_id, 'profile_image', $_POST['profile_image'] );
	}

}

add_action('admin_init', 'user_profile');

function user_profile() {
	new User_Profile();
}
