<?php
	namespace sv100;

	class sv_footer extends init {
		public function init() {
			$this->set_module_title( __( 'SV Footer', 'sv100' ) )
				->set_module_desc( __( 'Manages the footer.', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(4000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 18h6v6h-6v-6zm-9 6h6v-6h-6v6zm-9 0h6v-6h-6v6zm0-8h24v-16h-24v16z"/></svg>')
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_footer {
			$this->get_setting( 'sidebar' )
				->set_title( __( 'Sidebar', 'sv100' ) )
				->set_description( __( 'Select Sidebar for this position.', 'sv100' ) )
				->set_options( $this->get_module('sv_sidebar') ? $this->get_module('sv_sidebar')->get_sidebars_for_settings_options() : array('' => __('Please activate module SV Sidebar for this Feature.', 'sv100')) )
				->load_type( 'select' );

			// Background Settings
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '30,31,34,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'max_width_container' )
				->set_title( __( 'Max Width Footer Container', 'sv100' ) )
				->set_description( __( 'Set the max width of the Footer container', 'sv100' ) )
				->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'max_width_bar' )
				->set_title( __( 'Max Width Footer Inner Content', 'sv100' ) )
				->set_description( __( 'Set the max width of the Footer inner content', 'sv100' ) )
				->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
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

			$this->load_settings_navbars();

			return $this;
		}
		protected function load_settings_navbars(): sv_footer {
			// Navbars
			$this->get_setting( 'navbar_direction' )
				->set_title( __( 'Navbar Direction', 'sv100' ) )
				->set_options( array(
					'row'		=> __( 'Horizontal', 'sv100' ),
					'column'	=> __( 'Vertical', 'sv100' ),
				) )
				->set_default_value( 'column' )
				->set_description( __( 'The direction of columns.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navbar_item_font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navbar_item_font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 16 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'navbar_item_line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'navbar_item_text_color_link' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_setting('text_color_link')->get_data() : false )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'navbar_item_text_color_link_hover' )
				->set_title( __( 'Color', 'sv100' ) )
				->set_default_value( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_setting('text_color_link_hover')->get_data() : false )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'navbar_item_text_deco_link' )
				->set_title( __( 'Decoration', 'sv100' ) )
				->set_default_value( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_setting('text_deco_link')->get_data() : false )
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
				->set_default_value( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_setting('text_deco_link_hover')->get_data() : false )
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
			parent::register_scripts();

			// Register Styles
			$this->get_script( 'credits' )
				->set_inline(true)
				->set_path( 'lib/css/common/credits.css' );

			return $this;
		}
		public function has_footer_content(): bool{
			if ( !$this->get_module( 'sv_sidebar' ) ) {
				return false;
			}

			if( $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar')->get_data() ) ) {
				return true;
			}

			return false;
		}

		public function load( $settings = array() ): string {
			if(!is_admin()){
				$this->load_settings()->register_scripts();

				if ( $this->has_footer_content() ) {
					foreach($this->get_scripts() as $script){
						$script->set_is_enqueued();
					}
				}else{
					$this->get_script( 'credits' )->set_is_enqueued();
				}
			}

			ob_start();
			require ( $this->get_path('lib/tpl/frontend/default.php' ) );
			$output							= ob_get_clean();

			return $output;
		}
	}