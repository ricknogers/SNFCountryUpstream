<?php
/**
 * Add ExactMetrics tests to the WP Site Health area.
 */

/**
 * Class ExactMetrics_WP_Site_Health
 */
class ExactMetrics_WP_Site_Health {

	/**
	 * Is the site licensed?
	 *
	 * @var bool
	 */
	private $is_licensed;
	/**
	 * Is the site autherd?
	 *
	 * @var bool
	 */
	private $is_authed;
	/**
	 * Which eCommerce type, if any.
	 *
	 * @var bool|string
	 */
	private $ecommerce;
	/**
	 * Is the website being tracked?
	 *
	 * @var bool|string
	 */
	private $is_tracking;

	/**
	 * ExactMetrics_WP_Site_Health constructor.
	 */
	public function __construct() {

		add_filter( 'site_status_tests', array( $this, 'add_tests' ) );

		add_action( 'wp_ajax_health-check-exactmetrics-test_connection', array( $this, 'test_check_connection' ) );

		add_action( 'wp_ajax_health-check-exactmetrics-test_tracking_code', array(
			$this,
			'test_check_tracking_code'
		) );

	}

	/**
	 * Add ExactMetrics WP Site Health tests.
	 *
	 * @param array $tests The current filters array.
	 *
	 * @return array
	 */
	public function add_tests( $tests ) {

		$tests['direct']['exactmetrics_license'] = array(
			'label' => __( 'ExactMetrics License', 'exactmetrics-premium' ),
			'test'  => array( $this, 'test_check_license' ),
		);

		$tests['direct']['exactmetrics_auth'] = array(
			'label' => __( 'ExactMetrics Authentication', 'exactmetrics-premium' ),
			'test'  => array( $this, 'test_check_authentication' ),
		);

		if ( $this->is_licensed() ) {
			$tests['direct']['exactmetrics_automatic_updates'] = array(
				'label' => __( 'ExactMetrics Automatic Updates', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_autoupdates' ),
			);
		}

		if ( $this->is_ecommerce() ) {
			$tests['direct']['exactmetrics_ecommerce'] = array(
				'label' => __( 'ExactMetrics eCommerce', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_ecommerce' ),
			);

			$tests['direct']['exactmetrics_excluded_roles'] = array(
				'label' => __( 'ExactMetrics Tracking', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_roles_excluded' ),
			);
		}

		if ( class_exists( 'ExactMetrics_Dimensions' ) ) {
			$tests['direct']['exactmetrics_dimensions'] = array(
				'label' => __( 'ExactMetrics Custom Dimensions', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_dimensions' ),
			);
		}

		if ( $this->uses_amp() ) {
			$tests['direct']['exactmetrics_amp'] = array(
				'label' => __( 'ExactMetrics AMP', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_amp' ),
			);
		}

		if ( $this->uses_fbia() ) {
			$tests['direct']['exactmetrics_fbia'] = array(
				'label' => __( 'ExactMetrics FBIA', 'exactmetrics-premium' ),
				'test'  => array( $this, 'test_check_fbia' ),
			);
		}

		$tests['async']['exactmetrics_connection'] = array(
			'label' => __( 'ExactMetrics Connection', 'exactmetrics-premium' ),
			'test'  => 'exactmetrics_test_connection',
		);

		if ( $this->is_tracking() ) {
			$tests['async']['exactmetrics_tracking_code'] = array(
				'label' => __( 'ExactMetrics Tracking Code', 'exactmetrics-premium' ),
				'test'  => 'exactmetrics_test_tracking_code',
			);
		}

		return $tests;
	}

	/**
	 * Checks if the website is licensed.
	 *
	 * @return bool
	 */
	public function is_licensed() {

		if ( ! isset( $this->is_licensed ) ) {
			$this->is_licensed = is_network_admin() ? ExactMetrics()->license->is_network_licensed() : ExactMetrics()->license->is_site_licensed();
		}

		return $this->is_licensed;

	}

	/**
	 * Checks if the website is being tracked.
	 *
	 * @return bool
	 */
	public function is_tracking() {

		if ( ! isset( $this->is_tracking ) ) {
			$ua                = exactmetrics_get_ua();
			$this->is_tracking = ! empty( $ua );
		}

		return $this->is_tracking;

	}

	/**
	 * Check if any of the supported eCommerce integrations are available.
	 *
	 * @return bool
	 */
	public function is_ecommerce() {

		if ( isset( $this->ecommerce ) ) {
			return $this->ecommerce;
		}

		$this->ecommerce = false;

		if ( class_exists( 'WooCommerce' ) ) {
			$this->ecommerce = 'WooCommerce';
		} else if ( class_exists( 'Easy_Digital_Downloads' ) ) {
			$this->ecommerce = 'Easy Digital Downloads';
		} else if ( defined( 'MEPR_VERSION' ) && version_compare( MEPR_VERSION, '1.3.43', '>' ) ) {
			$this->ecommerce = 'MemberPress';
		} else if ( function_exists( 'LLMS' ) && version_compare( LLMS()->version, '3.32.0', '>=' ) ) {
			$this->ecommerce = 'LifterLMS';
		}

		return $this->ecommerce;
	}

	/**
	 * Is the site using AMP or has the AMP addon installed?
	 *
	 * @return bool
	 */
	public function uses_amp() {

		return class_exists( 'ExactMetrics_AMP' ) || defined( 'AMP__FILE__' );

	}

	/**
	 * Is the site using FB Instant Articles or has the FBIA addon installed?
	 *
	 * @return bool
	 */
	public function uses_fbia() {

		return class_exists( 'ExactMetrics_FB_Instant_Articles' ) || defined( 'IA_PLUGIN_VERSION' ) && version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' );

	}

	/**
	 * Is Coming Soon / Maintenance / Under Construction mode being activated by another plugin?
	 *
	 * @return bool
	 */
	private function is_coming_soon_active() {
		if ( defined( 'SEED_CSP4_SHORTNAME' ) ) {
			// SeedProd
			// http://www.seedprod.com

			$settings = get_option( 'seed_csp4_settings_content' );

			// 0: Disabled
			// 1: Coming soon mode
			// 2: Maintenance mode
			return ! empty( $settings['status'] );
		} elseif ( defined( 'WPMM_PATH' ) ) {
			// WP Maintenance Mode
			// https://designmodo.com/

			$settings = get_option( 'wpmm_settings', array() );

			return isset( $settings['general']['status'] ) && 1 === $settings['general']['status'];
		} elseif ( function_exists( 'csmm_get_options' ) ) {
			// Minimal Coming Soon & Maintenance Mode
			// https://comingsoonwp.com/

			$settings = csmm_get_options();

			return isset( $settings['status'] ) && 1 === $settings['status'];
		} elseif ( defined( 'WPM_DIR' ) ) {
			// WP Maintenance
			// https://fr.wordpress.org/plugins/wp-maintenance/

			return '1' === get_option( 'wp_maintenance_active' );
		} elseif ( defined( 'ACX_CSMA_CURRENT_VERSION' ) ) {
			// Under Construction / Maintenance Mode From Acurax
			// http://www.acurax.com/products/under-construction-maintenance-mode-wordpress-plugin

			return '1' === get_option( 'acx_csma_activation_status' );
		} elseif ( defined( 'SAHU_SO_PLUGIN_URL' ) ) {
			// Site Offline
			// http://www.freehtmldesigns.com

			$settings = maybe_unserialize( get_option( 'sahu_so_dashboard' ) );

			return isset( $settings['sahu_so_status'] ) && '1' === $settings['sahu_so_status'];
		} elseif ( defined( 'CSCS_GENEROPTION_PREFIX' ) ) {
			// IgniteUp
			// http://getigniteup.com

			return '1' === get_option( CSCS_GENEROPTION_PREFIX . 'enable', '' );
		} elseif ( method_exists( 'UCP', 'is_construction_mode_enabled' ) ) {
			// Under Construction by WebFactory Ltd
			// https://underconstructionpage.com/

			return UCP::is_construction_mode_enabled( true );
		} elseif ( function_exists( 'mtnc_get_plugin_options' ) ) {
			// Maintenance by WP Maintenance
			// http://wordpress.org/plugins/maintenance/

			$settings = mtnc_get_plugin_options( true );

			return 1 === $settings['state'];
		} elseif ( class_exists( 'CMP_Coming_Soon_and_Maintenance' ) ) {
			// CMP Coming Soon & Maintenance
			// https://wordpress.org/plugins/cmp-coming-soon-maintenance/

			return get_option( 'niteoCS_status' );
		}

		return false;
	}

	/**
	 * Check if ExactMetrics is authenticated and display a specific message.
	 *
	 * @return array
	 */
	public function test_check_authentication() {
		$result = array(
			'label'       => __( 'Your website is authenticated with ExactMetrics', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'ExactMetrics integrates your WordPress website with Google Analytics.', 'exactmetrics-premium' ),
			'actions'     => sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_reports', admin_url( 'admin.php' ) ),
				__( 'View Reports', 'exactmetrics-premium' )
			),
			'test'        => 'exactmetrics_auth',
		);

		$this->is_authed = ExactMetrics()->auth->is_authed() || ExactMetrics()->auth->is_network_authed();

		if ( ! $this->is_authed ) {
			if ( '' !== exactmetrics_get_ua() ) {
				// Using Manual UA.
				$result['status']      = 'recommended';
				$result['label']       = __( 'You are using Manual UA code output', 'exactmetrics-premium' );
				$result['description'] = __( 'We highly recommend authenticating with ExactMetrics so that you can access our new reporting area and take advantage of new ExactMetrics features.', 'exactmetrics-premium' );
				$result['actions']     = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					add_query_arg( 'page', 'exactmetrics_settings', admin_url( 'admin.php' ) ),
					__( 'Authenticate now', 'exactmetrics-premium' )
				);

			} else {
				// Not authed at all.
				$result['status']      = 'critical';
				$result['label']       = __( 'Please configure your Google Analytics settings', 'exactmetrics-premium' );
				$result['description'] = __( 'Your traffic is not being tracked by ExactMetrics at the moment and you are losing data. Authenticate and get access to the reporting area and advanced tracking features.', 'exactmetrics-premium' );
				$result['actions']     = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					add_query_arg( 'page', 'exactmetrics_settings', admin_url( 'admin.php' ) ),
					__( 'Authenticate now', 'exactmetrics-premium' )
				);
			}
		}

		return $result;
	}

	/**
	 * Check if the license is properly set up.
	 *
	 * @return array
	 */
	public function test_check_license() {

		$result = array(
			'status' => 'good',
			'badge'  => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'test'   => 'exactmetrics_license',
		);

		if ( $this->is_licensed() ) {
			$license_type    = is_network_admin() ? ExactMetrics()->license->get_network_license_type() : ExactMetrics()->license->get_license_type();
			$result['label'] = __( 'Your ExactMetrics license is valid', 'exactmetrics-premium' );
			/* Translators: The license type. */
			$result['description'] = sprintf( __( 'Your license key type for this site is %s.', 'exactmetrics-premium' ), '<strong>' . ucfirst( $license_type ) . '</strong>' );
		} else {
			$result['label']  = __( 'ExactMetrics is not licensed', 'exactmetrics-premium' );
			$result['status'] = 'critical';
			/* Translators: The license type. */
			$result['description'] = __( 'ExactMetrics is not licensed which means you can\'t access reports, automatic updates, and other advanced features', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings', admin_url( 'admin.php' ) ),
				__( 'Add License now', 'exactmetrics-premium' )
			);
		}

		return $result;
	}

	/**
	 * Tests that run to check if autoupdates are enabled.
	 *
	 * @return array
	 */
	public function test_check_autoupdates() {

		$result = array(
			'label'       => __( 'Your website is receiving automatic updates', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'ExactMetrics automatic updates are enabled and you are getting the latest features, bugfixes, and security updates as they are released.', 'exactmetrics-premium' ),
			'test'        => 'exactmetrics_automatic_updates',
		);

		$updates_option = exactmetrics_get_option( 'automatic_updates', false );

		if ( 'minor' === $updates_option ) {
			$result['label']       = __( 'Your website is receiving minor updates', 'exactmetrics-premium' );
			$result['description'] = __( 'ExactMetrics minor updates are enabled and you are getting the latest bugfixes and security updates, but not major features.', 'exactmetrics-premium' );
		}
		if ( 'none' === $updates_option ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'Automatic updates are disabled', 'exactmetrics-premium' );
			$result['description'] = __( 'ExactMetrics automatic updates are disabled. We recommend enabling automatic updates so you can get access to the latest features, bugfixes, and security updates as they are released.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/advanced', admin_url( 'admin.php' ) ),
				__( 'Update Settings', 'exactmetrics-premium' )
			);
		}

		return $result;

	}

	/**
	 * Tests that run to check if eCommerce is present.
	 *
	 * @return array
	 */
	public function test_check_ecommerce() {
		$result = array(
			'label'       => __( 'You are successfully tracking eCommerce data', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			// Translators: The eCommerce store currently active.
			'description' => sprintf( __( 'ExactMetrics eCommerce addon is properly set up and tracking your %s store', 'exactmetrics-premium' ), $this->ecommerce ),
			'test'        => 'exactmetrics_ecommerce',
		);

		$ua = exactmetrics_get_ua();
		if ( empty( $ua ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'eCommerce data is not being tracked', 'exactmetrics-premium' );
			$result['description'] = __( 'Please connect ExactMetrics to Google Analytics to start tracking eCommerce data.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings', admin_url( 'admin.php' ) ),
				__( 'Authenticate now', 'exactmetrics-premium' )
			);
		} else if ( ! class_exists( 'ExactMetrics_eCommerce' ) ) {
			$result['status'] = 'recommended';
			$result['label']  = __( 'eCommerce data is not being tracked', 'exactmetrics-premium' );
			// Translators: The eCommerce store currently active.
			$result['description'] = sprintf( __( 'You are using %s but the ExactMetrics eCommerce addon is not active, please Install & Activate it to start tracking eCommerce data.', 'exactmetrics-premium' ), $this->ecommerce );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'exactmetrics-premium' )
			);

			$type = ExactMetrics()->license->get_license_type();
			if ( in_array( $type, array( 'basic', 'plus' ), true ) ) {
				$result['actions'] = sprintf(
					'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
					exactmetrics_get_upgrade_link( 'site-health', 'ecommerce', 'https://exactmetrics.com/my-account' ),
					__( 'Upgrade Now', 'exactmetrics-premium' )
				);
			}
		} else if ( ! exactmetrics_get_option( 'enhanced_ecommerce' ) ) {
			$result['status'] = 'recommended';
			$result['label']  = __( 'Enhanced eCommerce data is not tracked', 'exactmetrics-premium' );
			// Translators: The eCommerce store currently active.
			$result['description'] = sprintf( __( 'Enhanced eCommerce is available but not enabled in your ExactMetrics settings.', 'exactmetrics-premium' ), $this->ecommerce );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/ecommerce', admin_url( 'admin.php' ) ),
				__( 'Update Setting', 'exactmetrics-premium' )
			);

		}

		return $result;
	}

	/**
	 * Check if Custom Dimensions are set up correctly.
	 *
	 * @return array
	 */
	public function test_check_dimensions() {

		$custom_dimensions = exactmetrics_get_option( 'custom_dimensions', array() );

		$result = array(
			'label'       => __( 'Custom Dimensions are set up correctly', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			// Translators: The eCommerce store currently active.
			'description' => sprintf( __( 'ExactMetrics Custom Dimensions addon is properly set up and tracking your dimensions', 'exactmetrics-premium' ), count( $custom_dimensions ) ),
			'test'        => 'exactmetrics_dimensions',
		);

		if ( empty( $custom_dimensions ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'No Custom Dimensions are being tracked', 'exactmetrics-premium' );
			$result['description'] = __( 'The ExactMetrics Custom Dimensions addon is installed & activated but no Custom Dimensions have been configured for tracking.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/conversions', admin_url( 'admin.php' ) ),
				__( 'View settings', 'exactmetrics-premium' )
			);
		}

		return $result;
	}

	/**
	 * Tests for the AMP cases.
	 *
	 * @return array
	 */
	public function test_check_amp() {

		$result = array(
			'label'       => __( 'AMP tracking is set up correctly', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The ExactMetrics AMP addon is active and AMP pages are being tracked.', 'exactmetrics-premium' ),
			'test'        => 'exactmetrics_amp',
		);

		// AMP plugin is installed but the ExactMetrics addon is missing.
		if ( defined( 'AMP__FILE__' ) && ! class_exists( 'ExactMetrics_AMP' ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'AMP pages are not being tracked', 'exactmetrics-premium' );
			$result['description'] = __( 'Your website has Google AMP-enabled pages set up but they are not tracked by Google Analytics at the moment. You need to Install & Activate the ExactMetrics AMP Addon.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'exactmetrics-premium' )
			);
		} else if ( class_exists( 'ExactMetrics_AMP' ) && ! defined( 'AMP__FILE__' ) ) {
			$plugins         = get_plugins();
			$install_amp_url = false;
			$button_text     = __( 'Install Plugin', 'exactmetrics-premium' );
			if ( exactmetrics_can_install_plugins() ) {
				$amp_key = 'amp/amp.php';
				if ( array_key_exists( $amp_key, $plugins ) ) {
					$button_text     = __( 'Activate Plugin', 'exactmetrics-premium' );
					$install_amp_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $amp_key ), 'activate-plugin_' . $amp_key );
				} else {
					$install_amp_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=amp' ), 'install-plugin_amp' );
				}
			}
			$result['status']      = 'critical';
			$result['label']       = __( 'AMP plugin is not active', 'exactmetrics-premium' );
			$result['description'] = __( 'The ExactMetrics AMP tracking addon is enabled but the official Google-developed AMP plugin for WordPress is not active.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				$install_amp_url,
				$button_text
			);
		}

		return $result;

	}

	/**
	 * Tests for the FBIA cases.
	 *
	 * @return array
	 */
	public function test_check_fbia() {

		$result = array(
			'label'       => __( 'Facebook Instant Articles tracking is set up correctly', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The ExactMetrics Facebook Instant Articles addon is active and Instant Articles pages are being tracked.', 'exactmetrics-premium' ),
			'test'        => 'exactmetrics_fbia',
		);

		// FBIA plugin is installed but the ExactMetrics addon is missing.
		if ( defined( 'IA_PLUGIN_VERSION' ) && version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' ) && ! class_exists( 'ExactMetrics_FB_Instant_Articles' ) ) {
			$result['status']      = 'recommended';
			$result['label']       = __( 'Facebook Instant Articles pages are not being tracked', 'exactmetrics-premium' );
			$result['description'] = __( 'Your website has Facebook Instant Articles pages set up but they are not tracked by Google Analytics at the moment. You need to Install & Activate the ExactMetrics Facebook Instant Articles Addon.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/addons', admin_url( 'admin.php' ) ),
				__( 'View Addons', 'exactmetrics-premium' )
			);
		} else if ( class_exists( 'ExactMetrics_FB_Instant_Articles' ) && ! defined( 'IA_PLUGIN_VERSION' ) ) {
			$plugins          = get_plugins();
			$button_text      = __( 'Install Plugin', 'exactmetrics-premium' );
			$install_fbia_url = false;
			if ( exactmetrics_can_install_plugins() ) {
				$fbia_key = 'fb-instant-articles/facebook-instant-articles.php';
				if ( array_key_exists( $fbia_key, $plugins ) ) {
					$button_text      = __( 'Activate Plugin', 'exactmetrics-premium' );
					$install_fbia_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $fbia_key ), 'activate-plugin_' . $fbia_key );
				} else {
					$install_fbia_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=fb-instant-articles' ), 'install-plugin_fb-instant-articles' );
				}
			}
			$result['status']      = 'critical';
			$result['label']       = __( 'Facebook Instant Articles plugin is not active', 'exactmetrics-premium' );
			$result['description'] = __( 'The ExactMetrics Facebook Instant Articles tracking addon is enabled but the Instant Articles for WP plugin by Automattic version 3.3.5 or newer is not active.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				$install_fbia_url,
				$button_text
			);
		} else if ( defined( 'IA_PLUGIN_VERSION' ) && ! version_compare( IA_PLUGIN_VERSION, '3.3.4', '>' ) ) {
			$result['status']      = 'critical';
			$result['label']       = __( 'Facebook Instant Articles plugin is outdated', 'exactmetrics-premium' );
			$result['description'] = __( 'The ExactMetrics Facebook Instant Articles tracking addon is enabled but you are using an older, unsupported version of Instant Articles for WP plugin by Automattic.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				admin_url( 'plugins.php' ),
				__( 'Update plugin', 'exactmetrics-premium' )
			);
		}

		return $result;

	}

	/**
	 * Checks if there are errors communicating with exactmetrics.com.
	 */
	public function test_check_connection() {

		$result = array(
			'label'       => __( 'Can connect to ExactMetrics.com correctly', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The ExactMetrics API is reachable and no connection issues have been detected.', 'exactmetrics-premium' ),
			'test'        => 'exactmetrics_connection',
		);

		$url      = 'https://api.exactmetrics.com/v2/test/';
		$params   = array(
			'sslverify'  => false,
			'timeout'    => 2,
			'user-agent' => 'ExactMetrics/' . EXACTMETRICS_VERSION,
			'body'       => '',
		);
		$response = wp_remote_get( $url, $params );

		if ( is_wp_error( $response ) || $response['response']['code'] < 200 || $response['response']['code'] > 300 ) {
			$result['status']      = 'critical';
			$result['label']       = __( 'The ExactMetrics server is not reachable.', 'exactmetrics-premium' );
			$result['description'] = __( 'Your server is blocking external requests to exactmetrics.com, please check your firewall settings or contact your host for more details.', 'exactmetrics-premium' );

			if ( is_wp_error( $response ) ) {
				// Translators: The error message received.
				$result['description'] .= ' ' . sprintf( __( 'Error message: %s', 'exactmetrics-premium' ), $response->get_error_message() );
			}
		}

		wp_send_json_success( $result );
	}

	/**
	 * Checks if there is a duplicate tracker.
	 */
	public function test_check_tracking_code() {

		$result = array(
			'label'       => __( 'Tracking code is properly being output.', 'exactmetrics-premium' ),
			'status'      => 'good',
			'badge'       => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'description' => __( 'The Google Analytics tracking code is being output correctly, and no duplicate Google Analytics scripts have been detected.', 'exactmetrics-premium' ),
			'test'        => 'exactmetrics_tracking_code',
		);

		$errors = exactmetrics_is_code_installed_frontend();

		if ( ! empty( $errors ) && is_array( $errors ) && ! empty( $errors[0] ) ) {
			if ( $this->is_coming_soon_active() ) {
				$result['status']      = 'good';
				$result['label']       = __( 'Tracking code disabled: coming soon/maintenance mode plugin present', 'exactmetrics-premium' );
				$result['description'] = __( 'ExactMetrics has detected that you have a coming soon or maintenance mode plugin currently activated on your site. This plugin does not allow other plugins (like ExactMetrics) to output Javascript, and thus ExactMetrics is not currently tracking your users (expected). Once the coming soon/maintenance mode plugin is deactivated, tracking will resume automatically.', 'exactmetrics-premium' );
			} else {
				$result['status']      = 'critical';
				$result['label']       = __( 'ExactMetrics has automatically detected an issue with your tracking setup', 'exactmetrics-premium' );
				$result['description'] = $errors[0];
			}
		}

		wp_send_json_success( $result );
	}

	/**
	 * Test if all the user roles are excluded from tracking.
	 */
	public function test_check_roles_excluded() {

		$result = array(
			'status' => 'good',
			'badge'  => array(
				'label' => __( 'ExactMetrics', 'exactmetrics-premium' ),
				'color' => 'blue',
			),
			'test'   => 'exactmetrics_excluded_roles',
		);

		$mi_roles = exactmetrics_get_option( 'ignore_users', array() );
		$wp_roles = exactmetrics_get_roles();

		if ( count( $mi_roles ) === count( $wp_roles ) ) {
			$result['label']       = __( 'ExactMetrics is not tracking any logged-in users', 'exactmetrics-premium' );
			$result['status']      = 'recommended';
			$result['description'] = __( 'All the available user roles are excluded from tracking in your ExactMetrics settings. This means none of the logged-in users are being tracked.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/advanced', admin_url( 'admin.php' ) ),
				__( 'Update roles excluded from tracking', 'exactmetrics-premium' )
			);
		} elseif ( count( $mi_roles ) === 0 ) {
			$result['label']       = __( 'ExactMetrics is tracking all logged-in users', 'exactmetrics-premium' );
			$result['status']      = 'recommended';
			$result['description'] = __( 'No user roles are excluded from tracking in your ExactMetrics settings. This means your stats might be inflated by traffic from Administrators or Editors.', 'exactmetrics-premium' );
			$result['actions']     = sprintf(
				'<p><a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
				add_query_arg( 'page', 'exactmetrics_settings#/advanced', admin_url( 'admin.php' ) ),
				__( 'Update roles excluded from tracking', 'exactmetrics-premium' )
			);
		} else {
			$result['label']       = __( 'ExactMetrics is properly excluding some logged-in users', 'exactmetrics-premium' );
			$result['status']      = 'good';
			$result['description'] = __( 'Some user roles are excluded from tracking in your ExactMetrics settings.', 'exactmetrics-premium' );
		}

		return $result;
	}
}

new ExactMetrics_WP_Site_Health();

