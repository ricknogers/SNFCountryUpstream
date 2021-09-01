<?php
/**
 * Plugin Name: ExactMetrics - Forms Tracking Addon
 * Plugin URI:  https://www.exactmetrics.com
 * Description: Adds Form Tracking to ExactMetrics.
 * Author:      ExactMetrics Team
 * Author URI:  https://www.exactmetrics.com
 * Version:     1.0.4
 * Text Domain: exactmetrics-form
 * Domain Path: languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 *
 * @since 1.0.0
 *
 * @package ExactMetrics_Forms
 * @author  Chris Christoff
 */
class ExactMetrics_Forms {
	/**
	 * Holds the class object.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.4';

	/**
	 * The name of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $plugin_name = 'ExactMetrics Forms';

	/**
	 * Unique plugin slug identifier.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $plugin_slug = 'exactmetrics-forms';

	/**
	 * Plugin file.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $file;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->file = __FILE__;

		// Define Addon Constant
		if ( ! defined( 'EXACTMETRICS_FORMS_VERSION' ) ) {
			define( 'EXACTMETRICS_FORMS_VERSION', $this->version );
		}

		// Load the plugin textdomain.
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

		// Load the updater
		add_action( 'exactmetrics_updater', array( $this, 'updater' ) );

		// Load the plugin.
		add_action( 'exactmetrics_load_plugins', array( $this, 'init' ), 99 );

		if ( ! defined( 'EXACTMETRICS_PRO_VERSION' ) ) {
			// Make sure plugin is listed in Auto-update Disabled view
			add_filter( 'auto_update_plugin', array( $this, 'disable_auto_update' ), 10, 2 );

			// Display call-to-action to get Pro in order to enable auto-update
			add_filter( 'plugin_auto_update_setting_html', array( $this, 'modify_autoupdater_setting_html' ), 11, 2 );
		}
	}

	/**
	 * Loads the plugin textdomain for translation.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( $this->plugin_slug, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the plugin into WordPress.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		if ( ! defined( 'EXACTMETRICS_PRO_VERSION' ) ) {
			// admin notice, MI not installed
			add_action( 'admin_notices', array( self::$instance, 'requires_exactmetrics' ) );
			return;
		}

		// Load frontend components.
		$this->require_frontend();

		$this->require_integrations();
	}

	/**
	 * Initializes the addon updater.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key The user license key.
	 */
	function updater( $key ) {
		$args = array(
			'plugin_name' => $this->plugin_name,
			'plugin_slug' => $this->plugin_slug,
			'plugin_path' => plugin_basename( __FILE__ ),
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . $this->plugin_slug,
			'remote_url'  => 'https://www.exactmetrics.com/',
			'version'     => $this->version,
			'key'         => $key
		);

		$updater = new ExactMetrics_Updater( $args );
	}

	/**
	 * Display ExactMetrics Pro CTA on Plugins -> autoupdater setting column
	 *
	 * @param string $html
	 * @param string $plugin_file
	 *
	 * @return string
	 */
	public function modify_autoupdater_setting_html( $html, $plugin_file ) {
		if ( plugin_basename( __FILE__ ) === $plugin_file &&
		     // If main plugin (free) happens to be enabled and already takes care of this, then bail
		     ! apply_filters( "exactmetrics_is_autoupdate_setting_html_filtered_${plugin_file}", false )
		) {
			$html = sprintf(
				'<a href="%s">%s</a>',
				'https://www.exactmetrics.com/docs/go-lite-pro/?utm_source=liteplugin&utm_medium=plugins-autoupdate&utm_campaign=upgrade-to-autoupdate&utm_content=exactmetrics-forms',
				__( 'Enable the ExactMetrics PRO plugin to manage auto-updates', 'exactmetrics-forms' )
			);
		}

		return $html;
	}

	/**
	 * Disable auto-update.
	 *
	 * @param $update
	 * @param $item
	 *
	 * @return bool
	 */
	public function disable_auto_update( $update, $item ) {
		// If this is multisite and is not on the main site, return early.
		if ( is_multisite() && ! is_main_site() ) {
			return $update;
		}

		if ( isset( $item->id ) && plugin_basename( __FILE__ ) === $item->id ) {
			return false;
		}

		return $update;
	}

	/**
	 * Loads all frontend files into scope.
	 *
	 * @since 1.0.0
	 */
	public function require_frontend() {
	    require plugin_dir_path( __FILE__ ) . 'includes/frontend/tracking.php';
	}

	/**
	 * Loads all integrations files into scope.
	 *
	 * @since 1.3.0
	 */
	public function require_integrations() {
		require plugin_dir_path( __FILE__ ) . 'includes/integrations/wpforms.php';
	}

	/**
	 * Output a nag notice if the user does not have MI installed
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return 	void
	 */
	public function requires_exactmetrics() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'Please install ExactMetrics Pro to use the ExactMetrics Forms addon', 'exactmetrics-forms' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Output a nag notice if the user does not have MI version installed
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return 	void
	 */
	public function requires_exactmetrics_version() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'Please install or update ExactMetrics Pro with version 7.4 or newer to use the ExactMetrics Forms addon', 'exactmetrics-forms' ); ?></p>
		</div>
		<?php
	}

	 /**
	 * Returns the singleton instance of the class.
	 *
	 * @since 1.0.0
	 *
	 * @return object The ExactMetrics_Forms object.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof ExactMetrics_Forms ) ) {
			self::$instance = new ExactMetrics_Forms();
		}
		return self::$instance;
	}
}
// Load the main plugin class.
$exactmetrics_forms = ExactMetrics_Forms::get_instance();
