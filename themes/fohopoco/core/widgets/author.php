<?php
/*
 * Author Widget
 */
 
class X_Author_Widget extends WP_Widget {
  
  // Widget Constructor
  function __construct()
  {
    $options = array(
      'description' => 'Author Info Widget',
      'name'      => 'X Author'
    );
    parent::__construct('X_Author_Widget', '', $options); // ID, Name, Options
  }
  
  // Widget Form
  public function form($instance)
  {
    extract($instance);
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('title'); ?>" 
        name="<?php echo $this->get_field_name('title'); ?>" 
        value="<?php if( isset($title) ) echo esc_attr($title); ?>" />
    </p>
    <?php
  }
  
  // Widget Display on Front-End
  public function widget($args, $instance)
  {
    extract($args);
    extract($instance);
    
    $title = apply_filters('widget_title', $title);

	
	$display_admins = true;
	$order_by 		= 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
	$role 			= ''; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
	$avatar_size 	= 47;
	$hide_empty 	= false; // hides authors with zero posts

	if(!empty($display_admins)) 
	{
		$blogusers = get_users('orderby='.$order_by.'&role='.$role);
	} else {
		$admins = get_users('role=administrator');
		$exclude = array();
		foreach($admins as $ad) 
		{
			$exclude[] = $ad->ID;
		}
		$exclude = implode(',', $exclude);
		$blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
	}
	$authors = array();
	foreach ($blogusers as $bloguser) 
	{
		$user = get_userdata($bloguser->ID);
		if(!empty($hide_empty)) 
		{
			$numposts = count_user_posts($user->ID);
			if($numposts < 1) continue;
		}
		$authors[] = (array) $user;
	}
    
    
	echo $before_widget;
		echo $before_title;
			echo $title;
		echo $after_title;
		
		
		echo "<ul>";
			foreach($authors as $author) 
			{
				$display_name = $author['data']->display_name;
				$avatar = get_avatar($author['ID'], $avatar_size);
				$author_profile_url = get_author_posts_url($author['ID']);
				$description = get_the_author_meta( 'description', $author['ID'] );
				
				echo "<li class='clearfix'>";
					echo "<h4><a href='$author_profile_url' rel='author'>$display_name</a></h4>";
					echo $avatar;
					echo "<p>";
						echo ShortenText($description);
						echo "<a rel='author' class='more' href='$author_profile_url'>More</a>";
					echo "</p>";
				echo "</li>";
			}
		echo "</ul>";
			
	echo $after_widget;
  }
  

}

// Init our widget
add_action('widgets_init', 'x_register_author');
function x_register_author()
{
  register_widget('X_Author_Widget');
}
