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
		$this->scripts_queue['default']        = static::$scripts
			->create( $this )
			->set_ID( 'default' )
			->set_path( 'lib/frontend/css/default.css' )
			->set_inline( true );

		$this->scripts_queue['sidebar_default'] = static::$scripts
			->create( $this )
			->set_ID( 'sidebar_default' )
			->set_path( 'lib/frontend/css/sidebar_default.css' )
			->set_inline( true );

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

		$this->router( $settings );
	}

	// Handles the routing of the templates
	protected function router( array $settings ) :sv_footer {
		$template = array(
			'name'      => 'default',
			'scripts'   => array(
				$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
				$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
			),
		);

		$this->load_template( $template, $settings );

		return $this;
	}

	// Loads the templates
	protected function load_template( array $template, array $settings ) :sv_footer {
		foreach ( $template['scripts'] as $script ) {
			$script->set_is_enqueued();
		}

		// Loads the template
		include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );

		return $this;
	}
}