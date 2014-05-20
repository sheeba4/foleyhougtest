<?php
/*
 * Address Widget
 * A : Sergios Singeridis
 * T : @feios
 * E : talk@sergios.me
 * W : http://sergios.me
 * D : February 28, 2012
 */

class X_Address_Widget extends WP_Widget {
  
  // Widget Constructor
  function __construct()
  {
    $options = array(
      'description' => 'Display Address using Microformats',
      'name'      => 'X Address'
    );
    parent::__construct('X_Address_Widget', '', $options); // ID, Name, Options
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
      <label for="<?php echo $this->get_field_id('org'); ?>">Organization: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('org'); ?>" 
        name="<?php echo $this->get_field_name('org'); ?>" 
        value="<?php if( isset($org) ) echo esc_attr($org); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('street'); ?>">Street: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('street'); ?>" 
        name="<?php echo $this->get_field_name('street'); ?>" 
        value="<?php if( isset($street) ) echo esc_attr($street); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('locality'); ?>">Locality: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('locality'); ?>" 
        name="<?php echo $this->get_field_name('locality'); ?>" 
        value="<?php if( isset($locality) ) echo esc_attr($locality); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('region'); ?>">Region: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('region'); ?>" 
        name="<?php echo $this->get_field_name('region'); ?>" 
        value="<?php if( isset($region) ) echo esc_attr($region); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('postal'); ?>">Postal Code: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('postal'); ?>" 
        name="<?php echo $this->get_field_name('postal'); ?>" 
        value="<?php if( isset($postal) ) echo esc_attr($postal); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('email'); ?>">Email: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('email'); ?>" 
        name="<?php echo $this->get_field_name('email'); ?>" 
        value="<?php if( isset($email) ) echo esc_attr($email); ?>" />
    </p>
	<p>
      <label for="<?php echo $this->get_field_id('phone'); ?>">Phone Number: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('phone'); ?>" 
        name="<?php echo $this->get_field_name('phone'); ?>" 
        value="<?php if( isset($phone) ) echo esc_attr($phone); ?>" />
    </p>
	<p>
      <label for="<?php echo $this->get_field_id('fax'); ?>">Fax Number: </label>
      <input 
        type="text" 
        class="widefat" 
        id="<?php echo $this->get_field_id('fax'); ?>" 
        name="<?php echo $this->get_field_name('fax'); ?>" 
        value="<?php if( isset($fax) ) echo esc_attr($fax); ?>" />
    </p>
    <?php
  }
  
  // Widget Display on Front-End
  public function widget($args, $instance)
  {
    extract($args);
    extract($instance);
    
    $org = apply_filters('widget_org', $org);
	$street = apply_filters('widget_street', $street);
    $locality = apply_filters('widget_locality', $locality);
    $region = apply_filters('widget_region', $region);
    $postal = apply_filters('widget_postal', $postal);
    $email = apply_filters('widget_email', $email);
	$phone = apply_filters('widget_phone', $phone);
	$fax = apply_filters('widget_fax', $fax);
	
	echo $before_widget;
	echo "<p class='vcard'>";
		echo "<strong class='fn org'>$org</strong><br />";
			echo "<span class='adr'>";
				echo "<span class='street-address'>$street</span><br />";
				echo "<span class='locality'>$locality</span>, <span class='region'>$region</span> <span class='postal-code'>$postal</span><br />";
			echo "</span>";
			echo "<a class='email' href='mailto:$email'>$email</a><br />";
			echo "tel: <span class='tel'>$phone</span><br />";
		echo "<span class='tel'><span class='type'>fax</span>: <span class='value'>$fax</span></span>";
	echo "</p>";
	echo $after_widget;
  }
}

// Init our widget
add_action('widgets_init', 'x_register_address');
function x_register_address()
{
  register_widget('X_Address_Widget');
}
