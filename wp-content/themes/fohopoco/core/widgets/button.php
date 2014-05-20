<?php
/*
 * Button Widget
 */
 
class X_Button_Widget extends WP_Widget {
  
  // Widget Constructor
  function __construct()
  {
    $options = array(
      'description' => 'Button Widget',
      'name'      => 'X Button'
    );
    parent::__construct('X_Button_Widget', '', $options); // ID, Name, Options
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
    <p>
      <label for="<?php echo $this->get_field_id('subtitle'); ?>">Second Line: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('subtitle'); ?>" 
        name="<?php echo $this->get_field_name('subtitle'); ?>" 
        value="<?php if( isset($subtitle) ) echo esc_attr($subtitle); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('url'); ?>">Button URL: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('url'); ?>" 
        name="<?php echo $this->get_field_name('url'); ?>" 
        value="<?php if( isset($url) ) echo esc_attr($url); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('icon'); ?>">Icon Class: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('icon'); ?>" 
        name="<?php echo $this->get_field_name('icon'); ?>" 
        value="<?php if( isset($icon) ) echo esc_attr($icon); ?>" />
    </p>

    <?php
  }
  
  // Widget Display on Front-End
  public function widget($args, $instance)
  {
    extract($args);
    extract($instance);
    
    $title = apply_filters('widget_title', $title);
    $member_position = apply_filters('widget_subtitle', $subtitle);
    $member_picture = apply_filters('widget_url', $url);
    $member_quote = apply_filters('widget_icon', $icon);
    
    echo "<div class='sidebar-btn'>";
		echo "<a href='$url' target='_blank'>";
			echo "<span class='icon $icon'></span>";
			echo "<span class='small'>$title</span><span class='raquo'>&raquo;</span><span class='bigger'>$subtitle</span>";
		echo "</a>";
    echo "</div>";
  }
  

}

// Init our widget
add_action('widgets_init', 'x_register_button');
function x_register_button()
{
  register_widget('X_Button_Widget');
}
