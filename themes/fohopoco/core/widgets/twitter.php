<?php
/*
 * Widget Name 	: X Twitter Widget
 */
 
class X_Twitter_Widget extends WP_Widget {

	function __construct()
	{
		$options = array(
			'description'	=> 'Display tweets',
			'name'			=> 'X Twitter'
		);
		parent::__construct('X_Twitter_Widget', '', $options);
	}
	
	public function form($instance)
	{
		extract($instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if(isset($title)) echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('more_button'); ?>">Read More Button Text: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('more_button'); ?>" name="<?php echo $this->get_field_name('more_button'); ?>" value="<?php if(isset($more_button)) echo esc_attr($more_button); ?>" />
			<br />
			<small>If no text is entered button is disabled</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>">Twitter Username: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php if(isset($username)) echo esc_attr($username); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tweet_count'); ?>">Number of tweets: </label>
			<input type="number" style="width: 40px" min="1" max="10" class="widefat" id="<?php echo $this->get_field_id('tweet_count'); ?>" name="<?php echo $this->get_field_name('tweet_count'); ?>" value="<?php echo !empty($tweet_count) ? $tweet_count : 5; ?>" />
		</p> 
		<?php
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		extract($instance);
		
		if ( empty($title) ) $title = 'Recent Tweets';
		
		$data = $this->twitter($tweet_count, $username);
		
		if ( false !== $data && isset($data->tweets) ) {
			echo $before_widget;
				echo $before_title;
					echo $title;
					if ( !empty($more_button) ) {
						echo '<a class="x-twitter-more" href="http://twitter.com/' . $data->username . '">' . $more_button . '</a>';
					}
				echo $after_title;
			echo '<ul class="x-twitter-widget"><li>' . implode('</li><li>', $data->tweets) . '</li></ul>';
			echo $after_widget;
		}
	}
	
	private function twitter($tweet_count, $username)
	{
		if ( empty($username) ) return false;
		
		$tweets = get_transient('x_recent_tweets_widget');
		
		if( !$tweets || $tweets->username !== $username || $tweets->tweet_count !== $tweet_count )
		{
			return $this->fetch_tweets($tweet_count, $username);
		}
		
		return $tweets;
	}
	
	private function fetch_tweets($tweet_count, $username)
	{
		$tweets = wp_remote_get("https://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username");
		$tweets = json_decode($tweets['body']);
		
		// There was a problem.
		if ( isset($tweets->error) ) return false; 
		
		$data = new stdClass();
		$data->username = $username;
		$data->tweet_count = $tweet_count;
		$data->tweets = array();
		
		foreach($tweets as $tweet) {
			if ( $tweet_count-- === 0 ) break;
			$data->tweets[] = $this->filter_tweet($tweet->text);
		}
		
		set_transient('x_recent_tweets_widget', $data, 60 * 5);
		return $data;
	}
	
	private function filter_tweet($tweet)
	{
		$tweet = preg_replace('/http[^\s]+/im', '<a href="$1">$1</a>', $tweet);
		$tweet = preg_replace('/@([^\s]+)/i', '<a href="http://twitter.com/$1">@$1</a>', $tweet);
		return $tweet;
	}

}

add_action('widgets_init', 'x_register_twitter');
function x_register_twitter()
{
	register_widget('X_Twitter_Widget');
}
