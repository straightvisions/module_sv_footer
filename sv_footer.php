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
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Footer' );
		$this->set_module_desc( __( 'This module gives the ability to display the footer via the "[sv_footer]" shortcode.', 'straightvisions_100' ) );

		$this->register_scripts()->register_sidebars();
		
		// Action Hooks & Filter
		$this->is_first_load() ? add_action( 'wp_loaded', array( $this, 'add_widgets' ) ) : false;
	}
	
	public function add_widgets() {
		$this->get_root()->sv_sidebar
			->clear_sidebar( 'sv_100_sv_sidebar_sv_footer_left' )
			->clear_sidebar( 'sv_100_sv_sidebar_sv_footer_center' )
			->clear_sidebar( 'sv_100_sv_sidebar_sv_footer_right' )
			->add_widget_to_sidebar( 'recent-posts', 'sv_100_sv_sidebar_sv_footer_left' )
			->add_widget_to_sidebar( 'recent-comments', 'sv_100_sv_sidebar_sv_footer_center' )
			->add_widget_to_sidebar( 'meta', 'sv_100_sv_sidebar_sv_footer_right' );
	}

	protected function register_scripts() :sv_footer {
		// Register Styles
		$this->scripts_queue['default']        = static::$scripts
			->create( $this )
			->set_ID( 'default' )
			->set_path( 'lib/frontend/css/default.css' );

		$this->scripts_queue['sidebar_default'] = static::$scripts
			->create( $this )
			->set_ID( 'sidebar_default' )
			->set_path( 'lib/frontend/css/sidebar_default.css' );

		return $this;
	}

	protected function register_sidebars() :sv_footer {
		if ( isset( $this->get_root()->sv_sidebar ) ) {
			$this->get_root()
				->sv_sidebar
				->create( $this )
				->set_ID( 'left' )
				->set_title( __( 'Footer - Left', 'straightvisions_100' ) )
				->set_desc( __( 'Widgets in this area will be shown in the left section of the footer.', 'straightvisions_100' ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'center' )
				->set_title( __( 'Footer - Center', 'straightvisions_100' ) )
				->set_desc( __( 'Widgets in this area will be shown in the center section of the footer.', 'straightvisions_100' ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'right' )
				->set_title( __( 'Footer - Right', 'straightvisions_100' ) )
				->set_desc( __( 'Widgets in this area will be shown in the right section of the footer.', 'straightvisions_100' ) )
				->load_sidebar();
		}

		return $this;
	}

	public function load( $settings = array() ) :string {
		$settings								= shortcode_atts(
			array(
				'inline'						=> false,
			),
			$settings,
			$this->get_module_name()
		);

		return $this->router( $settings );
	}

	// Handles the routing of the templates
	protected function router( array $settings ) :string {
		$template = array(
			'name'      => 'default',
			'scripts'   => array(
				$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
				$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
			),
		);

		return $this->load_template( $template, $settings );
	}

	// Loads the templates
	protected function load_template( array $template, array $settings ) :string {
		ob_start();
		foreach ( $template['scripts'] as $script ) {
			$script->set_is_enqueued();
		}

		// Loads the template
		include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );
		$output							        = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}