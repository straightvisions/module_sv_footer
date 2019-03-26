<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions GmbH
 * @package			sv_100
 * @copyright		2019 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_footer extends init {
	public function __construct() {

	}

	public function init() {
		// Translates the module
		load_theme_textdomain( $this->get_module_name(), $this->get_path( 'languages' ) );

		// Module Info
		$this->set_module_title( 'SV Footer' );
		$this->set_module_desc( __( 'This module gives the ability to display the footer via the "[sv_footer]" shortcode.', $this->get_module_name() ) );

		// Shortcodes
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );

		$this->register_scripts()->register_sidebars();
	}

	protected function register_scripts() :sv_footer {
		// Register Styles
		$this->scripts_queue['frontend']        = static::$scripts
			->create( $this )
			->set_ID('frontend')
			->set_path( 'lib/css/frontend.css' )
			->set_inline(true);

		return $this;
	}

	protected function register_sidebars() :sv_footer {
		if ( isset( $this->get_root()->sv_sidebar ) ) {
			$this->get_root()
				->sv_sidebar
				->create( $this )
				->set_ID( 'left' )
				->set_name( __( 'Footer - Left', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the left section of the footer.', $this->get_module_name() ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'center' )
				->set_name( __( 'Footer - Center', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the center section of the footer.', $this->get_module_name() ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'right' )
				->set_name( __( 'Footer - Right', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the right section of the footer.', $this->get_module_name() ) )
				->load_sidebar();
		}

		return $this;
	}

	public function shortcode( $settings, $content = '' ) {
		$settings								= shortcode_atts(
			array(
				'inline'						=> true
			),
			$settings,
			$this->get_module_name()
		);

		// Load Styles
		$this->scripts_queue['frontend']
			->set_inline($settings['inline'])
			->set_is_enqueued();

		ob_start();
		include( $this->get_path( 'lib/tpl/frontend.php' ) );
		$output									= ob_get_contents();
		ob_end_clean();

		return $output;
	}
}