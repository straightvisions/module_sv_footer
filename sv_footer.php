<?php
	namespace sv100;
	
	/**
	 * @version         4.124
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_footer extends init {
		public function init() {
			$this->set_module_title( __( 'SV Footer', 'sv100' ) )
				->set_module_desc( __( 'Manages the footer.', 'sv100' ) )
				->load_settings()
				->register_scripts()
				->register_sidebars()
				->set_section_title( __( 'Footer', 'sv100' ) )
				->set_section_desc( __( 'Sidebar & Color settings', 'sv100' ) )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(40)
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_footer {
			$this->get_setting( 'alignment' )
				->set_title( __( 'Content Alignment', 'sv100' ) )
				->set_options( array(
					'flex-start'		=> __( 'Left', 'sv100' ),
					'center'			=> __( 'Center', 'sv100' ),
					'flex-end'			=> __( 'Right', 'sv100' ),
					'space-between'		=> __( 'Space Between', 'sv100' ),
				) )
				->set_default_value( 'center' )
				->set_description( __( 'On desktop, space between is the same as center.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'select' );

			// Text Settings
			$this->get_setting( 'font_family' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value( 16 )
				->load_type( 'number' );

			$this->get_setting( 'line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value( '1.3' )
				->load_type( 'text' );

			$this->get_setting( 'text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '#ffffff' )
				->load_type( 'color' );
			
			// Widgets Title
			$this->get_setting( 'font_family_widget_title' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->load_type( 'select' );

			$this->get_setting( 'font_size_widget_title' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value( 32 )
				->load_type( 'number' );

			$this->get_setting( 'line_height_widget_title' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value( '1.3' )
				->load_type( 'text' );

			$this->get_setting( 'text_color_widget_title' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '#85868c' )
				->load_type( 'color' );
			
			// Background Settings
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '30,31,34,1' )
				->load_type( 'color' );

			// Box Shadow
			$this->get_setting('box_shadow_color')
				->set_title( __( 'Box Shadow Color', 'sv100' ) )
				->set_description( __( 'Color of the box shadow.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width', 'sv100' ) )
				->set_description( __( 'Set the max width of the Header', 'sv100' ) )
				->set_options( $this->get_module('sv_common')->get_max_width_options() )
				->set_default_value( '100%' )
				->load_type( 'select' );

			$this->get_setting( 'position' )
				->set_title( __( 'Position', 'sv100' ) )
				->set_description( __( 'The header bar behavior when scrolling down the page.', 'sv100' ) )
				->set_options( array(
					'relative'		=> __( 'Static', 'sv100' ),
					'absolute'		=> __( 'Absolute', 'sv100' ),
					'fixed'			=> __( 'Fixed', 'sv100' ),
					'sticky'		=> __( 'Sticky', 'sv100' )
				) )
				->set_default_value( 'relative' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting('margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->set_default_value( array(
					'top' => '15px',
					'right' => '15px',
					'bottom' => '15px',
					'left' => '15px',
				) )
				->load_type('margin');

			
			return $this;
		}
	
		protected function register_scripts(): sv_footer {
			// Register Styles
			$this->get_script( 'sidebar' )
				->set_path( 'lib/frontend/css/common.css' );

			$this->get_script( 'sidebar' )
				 ->set_path( 'lib/frontend/css/sidebar.css' );

			$this->get_script( 'credits' )
				->set_path( 'lib/frontend/css/credits.css' );
			
			// Inline Config
			$this->get_script( 'inline_config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true );
	
			return $this;
		}
	
		protected function register_sidebars(): sv_footer {
			if ( $this->get_module( 'sv_sidebar' ) ) {
				$this->get_module( 'sv_sidebar' )
					->create( $this )
					->set_ID( 1 )
					->set_title( __( 'Footer - 1', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar()

					->create( $this )
					->set_ID( 2 )
					->set_title( __( 'Footer - 2', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar()

					->create( $this )
					->set_ID( 3 )
					->set_title( __( 'Footer - 3', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar()

					->create( $this )
					->set_ID( 4 )
					->set_title( __( 'Footer - 4', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar()

					->create( $this )
					->set_ID( 5 )
					->set_title( __( 'Footer - 5', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar();

			}
	
			return $this;
		}
		public function has_footer_content(): bool{
			$check = false;
			if($this->get_module( 'sv_sidebar' )){

				for($i = 1; $i < 6; $i++){
					if($this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_'.$i ) ) ){
						$check = true;
					}
				}

			}

			return $check;
		}

		public function load( $settings = array() ): string {
			$settings								= shortcode_atts(
				array(
					'inline'						=> true,
					'template'                      => false,
				),
				$settings,
				$this->get_module_name()
			);

			return $this->router( $settings );
		}

		// Handles the routing of the templates
		protected function router( array $settings ): string {
			if ( $settings['template'] ) {
				switch ( $settings['template'] ) {
					case 'no_footer':
						$template = array(
							'name'      => 'default',
							'scripts'   => array(),
						);
						break;
					default:
						$template = array(
							'name'      => 'default',
							'scripts'   => array(
								$this->get_script( 'common' )->set_inline( $settings['inline'] ),
								$this->get_script( 'sidebar' )->set_inline( $settings['inline'] )
							),
						);
						break;
				}
			} else {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->get_script( 'common' )->set_inline( $settings['inline'] ),
						$this->get_script( 'sidebar' )->set_inline( $settings['inline'] )
					),
				);
			}

			// @filter: sv100_sv_footer_template
			return $this->load_template(
				apply_filters(
					$this->get_prefix( 'template' ),
					$template, $settings, $this
				), $settings
			);
		}

		// Loads the templates
		protected function load_template( array $template, array $settings ): string {
			ob_start();

			foreach ( $template['scripts'] as $script_name =>  $script ) {
				$script->set_is_enqueued();
			}

			$this->get_script( 'inline_config' )->set_is_enqueued();

			// Loads the template
			$path = isset($template['custom_path'])
				? $template['custom_path']
				: $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' );

			require ( $path );
			$output							        = ob_get_contents();
			ob_end_clean();

			return $output;
		}

		// Returns the settings value "mobile_zoom" from sv_common
		public function get_mobile_zoom(): bool {
			if (
				! $this->get_module( 'sv_common' )
				||
				! $this->get_module( 'sv_common' )->get_settings()['mobile_zoom']
			) return true;

			return boolval( $this->get_module( 'sv_common' )->get_setting( 'mobile_zoom' )->get_data() );
		}
	}