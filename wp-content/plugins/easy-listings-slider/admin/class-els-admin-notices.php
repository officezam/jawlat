<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-facing notices of the plugin.
 *
 * @package    Easy_Listings_Slider
 * @subpackage Easy_Listings_Slider/admin
 * @author     Taher Atashbar <taher.atashbar@gmail.com>
 */

class ELS_Admin_Notices extends ELS_Admin_Controller {

	/**
	 * Constructor of admin-area notices.
	 *
	 * @since 1.0.0
	 * @param ELS_Loader $loader
	 */
	public function __construct( ELS_Loader $loader ) {
		$loader->add_action( 'admin_notices', $this, 'admin_notices' );
		$loader->add_action( 'admin_notices', $this, 'asana_messages' );

		$loader->add_action( 'admin_init', $this, 'ignore_asana_messages' );
	}

	/**
	 * Admin notices of the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_notices() {
		settings_errors( 'els-notices' );
	}

	/**
	 * Showing Asana plugins messages.
	 *
	 * @since  1.0.1
	 * @return void
	 */
	public function asana_messages() {
		$ignore       = get_option( 'ignore_asana_plugins_messages', 0 );
		$asana_plugin = get_option( 'asana_active_free_plugin', '' );
		if ( 1 === absint( $ignore ) || ( ! empty( $asana_plugin ) && 'easy-listings-slider' != $asana_plugin ) ) {
			return;
		}

		if ( empty( $asana_plugin ) ) {
			update_option( 'asana_active_free_plugin', 'easy-listings-slider' );
		}
		?>
		<div class="update-nag asn-advertise">
			<div class="asn-adv-logo"></div>
			<p class="asn-adv-title">Do you want easy to use and advanced plugins for Easy Property Listings with less price and better support?</p>
			<p class="asn-adv-body">We are working on easy to use and advanced plugins for <strong>Easy Property Listings</strong> that you can find them <a href="http://www.asanaplugins.com/?utm_source=asanaplugins_messages&utm_medium=link"><strong>here</strong></a>.</p>
			<p class="asn-adv-body"><strong>Please support us</strong> by purchasing our plugins and we <strong>promise</strong> to creating easy to use and advanced plugins for <strong>Easy Property Listings</strong> with less price and better support.</p>
			<p class="asn-adv-body">Do you want custom works on <strong>Easy Property Listings</strong> <a href="http://www.asanaplugins.com/contact/?utm_source=asanaplugins_messages&utm_medium=link" target="_blank">Contact US</a>.</p>
			<p class="asn-adv-body">Please note that without your supports we can't <strong>live</strong>.</p>
			<ul class="asn-adv-body">
				<li>
					<span class="dashicons dashicons-media-text"></span>
					<a href="https://asanaplugins.freshdesk.com/support/solutions" target="_blank">Documentation</a>
				</li>
				<li>
					<span class="dashicons dashicons-sos"></span>
					<a href="https://asanaplugins.freshdesk.com/support/tickets/new" target="_blank">Premium Support</a>
				</li>
				<li>
					<span class="dashicons dashicons-admin-plugins"></span>
					<a href="http://www.asanaplugins.com/products/?utm_source=asanaplugins_messages&utm_medium=link" target="_blank">Plugins</a>
				</li>
				<li>
					<span class="dashicons dashicons-dismiss"></span>
					<a href="<?php echo esc_url( add_query_arg( 'ignore_asana_plugins_messages', '1' ) ); ?>">Dismiss</a>
				</li>
			</ul>
		</div>
		<?php
		// Use minified libraries if SCRIPT_DEBUG is turned off
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_style( 'els_admin_notices', $this->get_css_url() . 'els-admin-notices' . $suffix . '.css' );
	}

	/**
	 * Ignoring Asana Plugins messages.
	 *
	 * @since  1.0.1
	 * @return void
	 */
	public function ignore_asana_messages() {
		if ( isset( $_GET['ignore_asana_plugins_messages'] ) && current_user_can( 'manage_options' ) ) {
			update_option( 'ignore_asana_plugins_messages', 1 );
			$query_str = remove_query_arg( 'ignore_asana_plugins_messages' );
			wp_redirect( $query_str );
			exit;
		}
	}

}
