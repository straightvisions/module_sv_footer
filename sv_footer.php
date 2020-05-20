<?php
	namespace sv100;
	
	/**
	 * @version         4.125
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
				->load_settings_widgets()
				->load_settings_navbars()
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
			$common = $this->get_module( 'sv_common' );

			$this->get_setting( 'direction' )
				->set_title( __( 'Content Direction', 'sv100' ) )
				->set_options( array(
					'row'		=> __( 'Horizontal', 'sv100' ),
					'column'	=> __( 'Vertical', 'sv100' ),
				) )
				->set_default_value( 'row' )
				->set_description( __( 'The direction of columns.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'select' );

			// sidebar settings
			for($i = 1; $i < 6; $i++){
				$this->get_setting( 'sidebar_'.$i.'_alignment' )
					->set_title( __( 'Footer - '.$i, 'sv100' ) )
					->set_options( array(
						'flex-start'	=> __( 'Left', 'sv100' ),
						'center'		=> __( 'Center', 'sv100' ),
						'flex-end'		=> __( 'Right', 'sv100' )
					) )
					->set_default_value( 'flex-start' )
					->set_is_responsive(true)
					->load_type( 'select' );
			}

			for($i = 1; $i < 6; $i++){
				$this->get_setting( 'sidebar_'.$i.'_alignment_content' )
					->set_title( __( 'Footer - '.$i, 'sv100' ) )
					->set_options( array(
						'left'	=> __( 'Left', 'sv100' ),
						'center'		=> __( 'Center', 'sv100' ),
						'right'		=> __( 'Right', 'sv100' ),
					) )
					->set_default_value( 'center' )
					->set_is_responsive(true)
					->load_type( 'select' );
			}
			
			// Background Settings
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '30,31,34,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			// Box Shadow
			$this->get_setting('box_shadow_color')
				->set_title( __( 'Box Shadow Color', 'sv100' ) )
				->set_description( __( 'Color of the box shadow.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'max_width_container' )
				->set_title( __( 'Max Width Footer Container', 'sv100' ) )
				->set_description( __( 'Set the max width of the Footer container', 'sv100' ) )
				->set_options( $this->get_module('sv_common')->get_max_width_options() )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'max_width_bar' )
				->set_title( __( 'Max Width Footer Inner Content', 'sv100' ) )
				->set_description( __( 'Set the max width of the Footer inner content', 'sv100' ) )
				->set_options( $this->get_module('sv_common')->get_max_width_options() )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'position' )
				->set_title( __( 'Position', 'sv100' ) )
				->set_description( __( 'The footer bar behavior when scrolling down the page.', 'sv100' ) )
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
				->set_default_value(array(
					'top' => '15px',
					'right' => 'auto',
					'bottom' => '0',
					'left' => 'auto',
					)
				)
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->set_default_value( array(
					'top' => '30px',
					'right' => '15px',
					'bottom' => '30px',
					'left' => '15px',
				) )
				->load_type('margin');

			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'border' );
			return $this;
		}
		protected function load_settings_widgets(): sv_footer
		{
			$common = $this->get_module('sv_common');

			// Text Settings
			$this->get_setting( 'font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 16 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_default_value( '1.3' )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( $common->get_setting('text_color')->get_data() )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'text_color_link' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $common->get_setting('text_color_link')->get_data() )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'text_color_link_hover' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $common->get_setting('text_color_link_hover')->get_data() )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'text_deco_link' )
				->set_title( __( 'Decoration', 'sv100' ) )
				->set_default_value( $common->get_setting('text_deco_link')->get_data() )
				->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'text_deco_link_hover' )
				->set_title( __( 'Decoration', 'sv100' ) )
				->set_default_value( $common->get_setting('text_deco_link_hover')->get_data() )
				->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'text_bg_color_link' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '0,0,0,0' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'text_bg_color_link_hover' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '0,0,0,0' )
				->set_is_responsive(true)
				->load_type( 'color' );

			// Widgets Title
			$this->get_setting( 'font_widget_title' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'font_size_widget_title' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 32 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'line_height_widget_title' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_default_value( '1.3' )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'text_color_widget_title' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '#85868c' )
				->set_is_responsive(true)
				->load_type( 'color' );

			return $this;
		}
		protected function load_settings_navbars(): sv_footer {
			$common = $this->get_module( 'sv_common' );

			// Navbars
			$this->get_setting( 'navbar_item_text_color_link' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $common->get_setting('text_color_link')->get_data() )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'navbar_item_text_color_link_hover' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $common->get_setting('text_color_link_hover')->get_data() )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'navbar_item_text_deco_link' )
				->set_title( __( 'Decoration', 'sv100' ) )
				->set_default_value( $common->get_setting('text_deco_link')->get_data() )
				->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navbar_item_text_deco_link_hover' )
				->set_title( __( 'Decoration', 'sv100' ) )
				->set_default_value( $common->get_setting('text_deco_link_hover')->get_data() )
				->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navbar_item_text_bg_color_link' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '0,0,0,0' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'navbar_item_text_bg_color_link_hover' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '0,0,0,0' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting('navbar_item_margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('navbar_item_padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			return $this;
		}
		protected function register_scripts(): sv_footer {
			// Register Styles
			$this->get_script( 'common' )
				->set_path( 'lib/frontend/css/common.css' );

			$this->get_script( 'sidebars' )
				 ->set_path( 'lib/frontend/css/sidebars.css' );

			$this->get_script( 'credits' )
				->set_path( 'lib/frontend/css/credits.css' );
			
			// Inline Config
			$this->get_script( 'config' )
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
								$this->get_script( 'sidebars' )->set_inline( $settings['inline'] ),
								$this->get_script( 'credits' )->set_inline( $settings['inline'] ),
							),
						);
						break;
				}
			} else {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->get_script( 'common' )->set_inline( $settings['inline'] ),
						$this->get_script( 'sidebars' )->set_inline( $settings['inline'] ),
						$this->get_script( 'credits' )->set_inline( $settings['inline'] ),
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

			$this->get_script( 'config' )->set_is_enqueued();

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