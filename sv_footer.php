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
			// Text Settings
			$this->get_setting( 'font_family' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
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
				 ->set_default_value( 32 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_widget_title' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( '1.3' )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color_widget_title' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#85868c' )
				 ->load_type( 'color' );
			
			// Background Settings
			$this->get_setting( 'bg_color' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#1e1f22' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );
			
			// Color Settings
			$this->get_setting( 'highlight_color' )
				 ->set_title( __( 'Highlight Color', 'sv100' ) )
				 ->set_description( __( 'This color is used for highlighting elements, like links on hover/focus.', 'sv100' ) )
				 ->set_default_value( '#358ae9' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'bg_color_widget' )
				 ->set_title( __( 'Widget background color', 'sv100' ) )
				 ->set_default_value( '#353639' )
				 ->load_type( 'color' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_footer {
			// Register Styles
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
					 ->set_ID( 'left' )
					 ->set_title( __( 'Footer - Left', 'sv100' ) )
					 ->set_desc( __( 'Widgets in this sidebar will be shown in the left section of the footer.', 'sv100' ) )
					 ->load_sidebar()
					 ->create( $this )
					 ->set_ID( 'center' )
					 ->set_title( __( 'Footer - Center', 'sv100' ) )
					 ->set_desc( __( 'Widgets in this sidebar will be shown in the center section of the footer.', 'sv100' ) )
					 ->load_sidebar()
					 ->create( $this )
					 ->set_ID( 'right' )
					 ->set_title( __( 'Footer - Right', 'sv100' ) )
					 ->set_desc( __( 'Widgets in this sidebar will be shown in the right section of the footer.', 'sv100' ) )
					 ->load_sidebar();
			}
	
			return $this;
		}
		public function has_footer_content(): bool{
			if(!$this->get_module( 'sv_sidebar' )){
				return false;
			}

			$i = false;
			if($this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_left' ) ) ){
				$i = true;
			}
			if($this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_center' ) ) ){
				$i = true;
			}
			if($this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_right' ) ) ){
				$i = true;
			}

			return $i;
		}
		public function load( $settings = array() ): string {
			$settings				= shortcode_atts(
				array(
					'inline'		=> true,
				),
				$settings,
				$this->get_module_name()
			);
	
			return $this->router( $settings );
		}
	
		// Handles the routing of the templates
		protected function router( array $settings ): string {
			$template = array('name' => 'default');
			
			if ( apply_filters( $this->get_prefix('credits'), true ) ) {
				$template['scripts'][] = $this->get_script( 'credits' )->set_inline( $settings['inline'] );
			}
			
			if($this->has_footer_content()){
				$template['scripts'][] = $this->get_script( 'sidebar' )->set_inline( $settings['inline'] );
				$this->get_script( 'inline_config' )->set_is_enqueued();
			}
	
			return $this->load_template( $template, $settings );
		}
	
		// Loads the templates
		protected function load_template( array $template, array $settings ) :string {
			$output	= '';
			
			if ( $template['scripts'] ) {
				ob_start();
				
				foreach ( $template['scripts'] as $script ) {
					$script->set_is_enqueued();
				}
				
				// Loads the template
				include( $this->get_path( 'lib/frontend/tpl/' . $template['name'] . '.php' ) );
				$output							        = ob_get_contents();
				ob_end_clean();
			}
	
			return $output;
		}
	}