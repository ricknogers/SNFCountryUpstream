<?php

if ( is_admin() || ( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/reports.php';
	new ExactMetrics_Admin_Pro_Reports();

	// Email summaries related classes
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/emails/summaries-infoblocks.php';
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/emails/summaries.php';
	new ExactMetrics_Email_Summaries();

	// SharedCounts functionality.
	require_once EXACTMETRICS_PLUGIN_DIR . 'includes/admin/sharedcount.php';

	// Include notification events of pro version
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/notifications/notification-events.php';
}

if ( is_admin() ) {

	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/dashboard-widget.php';
	new ExactMetrics_Dashboard_Widget_Pro();

	// Load the Welcome class.
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/welcome.php';

	if ( isset( $_GET['page'] ) && 'exactmetrics-onboarding' === $_GET['page'] ) { // WPCS: CSRF ok, input var ok.
		// Only load the Onboarding wizard if the required parameter is present.
		require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/onboarding-wizard.php';
	}

	// Site Health logic
	require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/admin/wp-site-health.php';
}

require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/frontend/class-frontend.php';

// Popular posts.
require_once EXACTMETRICS_PLUGIN_DIR . 'includes/popular-posts/class-popular-posts-themes.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'includes/popular-posts/class-popular-posts.php';
// Pro popular posts specific.
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-inline.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-cache.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-widget.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-widget-sidebar.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-ajax.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-ga.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-products.php';
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/popular-posts/class-popular-posts-products-sidebar.php';
// Pro Gutenberg blocks.
require_once EXACTMETRICS_PLUGIN_DIR . 'pro/includes/gutenberg/frontend.php';

