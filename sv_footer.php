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
	
	protected function is_first_load(): bool {
		if ( get_option( $this->get_prefix( 'first_load' ) ) ) {
			return false;
		} else {
			add_option( $this->get_prefix( 'first_load' ), true );
			
			return true;
		}
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
				->set_title( __( 'Footer - Left', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the left section of the footer.', $this->get_module_name() ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'center' )
				->set_title( __( 'Footer - Center', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the center section of the footer.', $this->get_module_name() ) )
				->load_sidebar()
				->create( $this )
				->set_ID( 'right' )
				->set_title( __( 'Footer - Right', $this->get_module_name() ) )
				->set_desc( __( 'Widgets in this area will be shown in the right section of the footer.', $this->get_module_name() ) )
				->load_sidebar();

			var_dump(get_option( 'sidebars_widgets' ));
			
			if ( $this->is_first_load() ) {
				$widgets 											= get_option( 'sidebars_widgets' );
				$widgets['sv_100_sv_sidebar_sv_footer_left'] 		= array( 'recent-posts-1' );
				$widgets['sv_100_sv_sidebar_sv_footer_center'] 		= array( 'recent-comments-1' );
				$widgets['sv_100_sv_sidebar_sv_footer_right'] 		= array( 'meta-1' );
				
				update_option( 'sidebars_widgets', $widgets );
			}
		}

		return $this;
	}

	public function shortcode( $settings, $content = '' ) :string {
		$settings								= shortcode_atts(
			array(
				'inline'						=> true
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