<?php
/**
 * CLI class
 *
 * @package FoleyHoag
 * @since   1.0.0
 */


\WP_CLI::add_command( 'foley', 'FH_CLI' );

/**
 * FoleyHoag related CLI commands.
 */
class FH_CLI extends \WP_CLI_Command {

	/**
	 * Loop all existing authors and get published post counts
	 *
	 * [--start=<start>]
	 * : Start date
	 * ---
	 *
	 * [--end=<end>]
	 * : End date
	 * ---
	 *
	 * ## EXAMPLES: wp fh add_keychain_attr_to_buttons
	 * ## wp hb add_keychain_attr_to_buttons --action=add
	 */
	function author_posts_count( $args, $assoc_args ) {
		$start = '';
		if ( isset( $assoc_args['start'] ) ) {
			$start = $assoc_args['start'];
		}
		if ( isset( $assoc_args['end'] ) ) {
			$end = $assoc_args['end'];
		} else {
			$end = date( 'Y-m-d', time() ); //today
		}

		$items = array();
		// WP_CLI::line( $args[0] );
		$authors = $this->get_authors();
		foreach ( $authors as $author ) {
			$user_meta = get_user_meta( $author );
			if ( ! empty( $user_meta ) ) {
				$first_name = array_shift( $user_meta['first_name'] );
				$last_name  = array_shift( $user_meta['last_name'] );
				$nickname   = array_shift( $user_meta['nickname'] );
			}
			$name = $first_name . ' ' . $last_name;
			if ( empty( trim( $name ) ) ) {
				$name = '(' . $nickname . ')';
			}

			//TODO
			// between 3/15/2018-6/14/19
			// 6/15/19 to present
			$covid_counts       = $this->get_post_counts( $author, date( 'Y-m-d', strtotime( '3/15/2018' ) ), date( 'Y-m-d', strtotime( '6/14/2019' ) ) );
			$after_covid_counts = $this->get_post_counts( $author, date( 'Y-m-d', strtotime( '6/15/2019' ) ) );
			$post_counts        = $this->get_post_counts( $author, $start, $end );
			if ( 0 !== $post_counts ) {
				$items[] = array(
					'name'              => $name,
					'march_june'        => $covid_counts,
					'june_now'          => $after_covid_counts,
					'total_post_counts' => $post_counts,
				);
			}
		}
		WP_CLI\Utils\format_items( 'table', $items, array( 'name', '3142018_6142019', '6152019_now', 'total_post_counts' ) );
		// WP_CLI::success( print_r( $post_ids ) );
	}

	private function get_authors() {
		global $wpdb;
		$ids = array();

		$query = <<<SQL
SELECT ID FROM $wpdb->users ORDER BY ID ASC
SQL;

		$users = $wpdb->get_results( $query ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

		if ( ! empty( $users ) ) {
			$ids = wp_list_pluck( $users, 'ID' );
		}

		$message = count( $ids ) . ' users found.';

		\WP_CLI::line( $message );

		return $ids;
	}

	private function get_post_counts( $user_id, $start = '', $end = '' ) {
		global $wpdb;
		$network_post_count = array();

		// Get the users blogs and loop through them
		$blogs = get_blogs_of_user( $user_id );

		foreach ( $blogs as $blog ) {

			switch_to_blog( $blog->userblog_id );

				// Update the post count array with post count from each blog
			if ( empty( $start ) && empty( $end ) ) {

				$network_post_count[] = count_user_posts( $user_id );
			} else {
				$where = get_posts_by_author_sql( 'post', true, $user_id, true );
				if ( ! empty( $start ) ) {
					$where .= <<<SQL
 AND post_date >= "{$start}"
SQL;
				}
				if ( ! empty( $end ) ) {
					$where .= <<<SQL
 AND post_date <= "{$end}"
SQL;
				}

				$network_post_count[] = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
			}
			restore_current_blog();
		}

		// Get the total count of posts from each blog
		$network_post_count = array_sum( $network_post_count );
		// $count              = str_pad( $network_post_count, 2, '0', STR_PAD_LEFT );

		// update_user_meta( $user_id, 'network_post_count', $count );

		return $network_post_count;

	}
}
