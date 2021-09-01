<?php

/**
 * Add notification when search console report is not connected
 * Recurrence: 15 Days
 *
 * @since 7.12.3
 */
final class ExactMetrics_Notification_Connect_Search_Console extends ExactMetrics_Notification_Event {

	public $notification_id             = 'exactmetrics_notification_connect_search_console';
	public $notification_interval       = 15; // in days
	public $notification_type           = array( 'basic', 'master', 'plus', 'pro' );

	/**
	 * Build Notification
	 *
	 * @return array $notification notification is ready to add
	 *
	 * @since 7.12.3
	 */
	public function prepare_notification_data( $notification ) {
		$report = $this->get_report( 'queries', $this->report_start_from, $this->report_end_to );

		if ( isset( $report['success'] ) && false === $report['success'] && ! empty( $report['error'] ) ) {
			$notification['title']   = __( 'The Google Search Console report is not properly set up', 'exactmetrics-premium' );
			// Translators: search console notification title
			$notification['content'] = sprintf( __( 'Are you interested in what keywords bring you the most traffic from Google? You can get that information directly in your ExactMetrics Reports area by connecting your Google Search Console account with Google Analytics. <br><br>Follow our %sstep-by-step guide%s to get started and find out where to focus your attention.', 'exactmetrics-premium' ), '<a href="'. $this->build_external_link( 'https://www.exactmetrics.com/how-to-track-keywords-in-google-analytics/' ) .'" target="_blank">', '</a>' );
			$notification['btns']    = array(
				"learn_more" => array(
					'url'           => $this->build_external_link( 'https://www.exactmetrics.com/how-to-track-keywords-in-google-analytics/' ),
					'text'          => __( 'Learn More', 'exactmetrics-premium' ),
					'is_external'   => true,
				),
			);

			return $notification;
		}

		return false;
	}

}

// initialize the class
new ExactMetrics_Notification_Connect_Search_Console();
