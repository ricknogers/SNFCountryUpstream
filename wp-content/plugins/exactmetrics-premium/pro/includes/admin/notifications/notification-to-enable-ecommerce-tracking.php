<?php

/**
 * Add notification when WooCommerce, Easy Digital Downloads, Memberpress, LifterLMS plugins are active but Ecommerce Tracking is disabled or Ecommerce Addon not available
 * Recurrence: 20 Days
 *
 * @since 7.12.3
 */
final class ExactMetrics_Notification_To_Enable_Ecommerce_Tracking extends ExactMetrics_Notification_Event {

	public $notification_id             = 'exactmetrics_notification_to_enable_ecommerce_tracking';
	public $notification_interval       = 20; // in days
	public $notification_type           = array( 'master', 'pro' );

	/**
	 * Build Notification
	 *
	 * @return array $notification notification is ready to add
	 *
	 * @since 7.12.3
	 */
	public function prepare_notification_data( $notification ) {
		$enhanced_commerce = (bool) exactmetrics_get_option( 'enhanced_ecommerce', false );;

		if (
			false === $enhanced_commerce && (
				class_exists( 'WooCommerce' ) ||
				class_exists( 'Easy_Digital_Downloads' ) ||
				( defined( 'MEPR_VERSION' ) && version_compare( MEPR_VERSION, '1.3.43', '>' ) ) ||
				( function_exists( 'LLMS' ) && version_compare( LLMS()->version, '3.32.0', '>=' ) )
			) ) {

			$notification['title']   = __( 'Enable eCommerce Tracking', 'exactmetrics-premium' );
			// Translators: eCommerce tracking notification content
			$notification['content'] = sprintf( __( 'The ExactMetrics eCommerce addon makes it effortless to add Google Analytics Enhanced eCommerce tracking to your WordPress store whether you are using WooCommerce, MemberPress, LifterLMS or Easy Digital Downloads.<br><br>Enhanced eCommerce tracking lets you collect more data and gives you detailed insight into eCommerce engagement. %sIn this article%s, we will show you how to enable Enhanced eCommerce in WordPress with ExactMetrics.', 'exactmetrics-premium' ), '<a href="'. $this->build_external_link( 'https://www.exactmetrics.com/how-to-set-up-google-analytics-ecommerce-tracking/' ) .'" target="_blank">', '</a>' );
			$notification['btns']    = array(
				"learn_more" => array(
					'url'           => $this->build_external_link( 'https://www.exactmetrics.com/how-to-set-up-google-analytics-ecommerce-tracking/' ),
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
new ExactMetrics_Notification_To_Enable_Ecommerce_Tracking();
