<?php

/*
 * Author/Editors Widget
 */

class Foley_Author_Widget extends WP_Widget {

	// Widget Constructor
	function __construct() {
		$options = array(
			'description' => 'Authors/Editors Widget',
			'name'        => 'Foley Author'
		);
		parent::__construct( 'Foley_Author_Widget', '', $options ); // ID, Name, Options

		add_action( 'pre_user_query', array( $this, 'foley_random_user_query' ) );

	}

	public function foley_random_user_query( $class ) {
		if( 'rand' == $class->query_vars['orderby'] )
			$class->query_orderby = str_replace( 'user_login', 'RAND()', $class->query_orderby );

		return $class;
	}

	// Widget Form
	public function form( $instance ) {
		extract( $instance );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
			<input
				type="text"
				class="widefat"
				id="<?php echo $this->get_field_id( 'title' ); ?>"
				name="<?php echo $this->get_field_name( 'title' ); ?>"
				value="<?php if ( isset( $title ) ) {
					echo esc_attr( $title );
				} ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'role' ); ?>">User Role: </label>
			<select id="<?php echo $this->get_field_id( 'role' ); ?>"
			        name="<?php echo $this->get_field_name( 'role' ); ?>"
			<?php $selected = ( isset( $role ) ) ? esc_attr( $role ): ''; ?>>
			<?php wp_dropdown_roles( $selected ); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>">Order By: </label>
			<select id="<?php echo $this->get_field_id( 'orderby' ); ?>"
			        name="<?php echo $this->get_field_name( 'orderby' ); ?>">
			<?php
			$orderby_selected = ( isset( $orderby ) ) ? esc_attr( $orderby ): '';
			$orderby_options = array( 'display_name' => 'Display Name',
				'nicename' => 'Nice Name',
				'email' => 'Email',
				'name' => 'Name',
				'post_count' => 'Most Number of Posts',
				'rand' => 'Random'
			);
			$p = $r = '';
			foreach ( $orderby_options as $key => $details ) {
				if ( $orderby_selected == $key ) // preselect specified role
					$p = "\n\t<option selected='selected' value='" . esc_attr($key) . "'>$details</option>";
				else
					$r .= "\n\t<option value='" . esc_attr($key) . "'>$details</option>";
			}
			?>
			<?php echo $p . $r; ?>
			</select>
		</p>
		<?php
	}

	// Widget Display on Front-End
	public function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title = apply_filters( 'widget_title', $title );


		$display_admins = true;
		$avatar_size    = 47;
		$hide_empty     = false; // hides authors with zero posts

		if ( ! empty( $display_admins ) ) {
			$blogusers = get_users( 'orderby=' . $orderby . '&role=' . $role );
		} else {
			$admins  = get_users( 'role=administrator' );
			$exclude = array();
			foreach ( $admins as $ad ) {
				$exclude[] = $ad->ID;
			}
			$exclude   = implode( ',', $exclude );
			$blogusers = get_users( 'exclude=' . $exclude . '&orderby=' . $orderby . '&role=' . $role );
		}
		$authors = array();
		foreach ( $blogusers as $bloguser ) {
			$user = get_userdata( $bloguser->ID );
			if ( ! empty( $hide_empty ) ) {
				$numposts = count_user_posts( $user->ID );
				if ( $numposts < 1 ) {
					continue;
				}
			}
			$authors[] = (array) $user;
		}


		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;
		echo "<ul class=\"foley-authors\">";
		foreach ( $authors as $author ) {
			$display_name       = $author['data']->display_name;
			$profile_image = get_the_author_meta( 'profile_image', $author['ID'] );
			if( empty( $profile_image ) ){
				$avatar = get_avatar( $author['ID'], $avatar_size, '', '', array('class'=> 'avatarThumb alignnone') );
			}else{
				$avatar = '<img class="avatarThumb alignnone" src="' . esc_url( $profile_image ) .'" alt="' . esc_html( $display_name ) .'" width="47" height="47">';
			}

			$author_profile_url = isset( $author['data']->user_url ) ? $author['data']->user_url : get_author_posts_url($author['ID']);
			$description        = get_the_author_meta( 'description', $author['ID'] );

			echo "<li class='clearfix'>";
			echo $avatar;
			echo "<h4><a href='$author_profile_url' rel='author'>$display_name</a></h4>";
			echo "<p>ShortenText( $description )</p>";
			echo "<p><a rel='author' class='more' href='$author_profile_url'>More</a></p>";
			echo "</li>";
		}
		echo "</ul>";

		echo $after_widget;
	}


}

// Init our widget
add_action( 'widgets_init', 'foley_register_author' );
function foley_register_author() {
	register_widget( 'Foley_Author_Widget' );
}
