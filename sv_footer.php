<?php
	namespace sv100;
	
	/**
	 * @version         4.000
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
				 ->get_root()
				 ->add_section( $this );
		}
		
		protected function load_settings(): sv_footer {
			// Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'text_color','text_color', '#ffffff' );
			$this->get_settings_component( 'line_height','line_height', 23 );
			
			// Widgets Title
			$this->get_settings_component( 'font_family_widget_title','font_family' );
			$this->get_settings_component( 'font_size_widget_title','font_size', 32 );
			$this->get_settings_component( 'text_color_widget_title','text_color', '#85868c' );
			$this->get_settings_component( 'line_height_widget_title','line_height', 48 );
			
			// Background Settings
			$this->get_settings_component( 'bg_color','background_color', '#1e1f22' );
			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position','background_position', 'center top' );
			$this->get_settings_component( 'bg_size','background_size', 0 );
			$this->get_settings_component( 'bg_fit','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment', 'fixed' );
			
			// Color Settings
			$this->get_settings_component( 'highlight_color','highlight_color', '#358ae9' );
			
			$this->get_setting( 'bg_color_widget' )
				 ->set_title( __( 'Widget background color', 'sv100' ) )
				 ->set_default_value( '#353639' )
				 ->load_type( 'color' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_footer {
			// Register Styles
			$this->get_script( 'default' )
				 ->set_path( 'lib/frontend/css/default.css' );
	
			$this->get_script( 'sidebar_default' )
				 ->set_path( 'lib/frontend/css/sidebar_default.css' );

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
					'inline'		=> false,
				),
				$settings,
				$this->get_module_name()
			);
	
			return $this->router( $settings );
		}
	
		// Handles the routing of the templates
		protected function router( array $settings ): string {
			$template = array();
			
			if ( $this->has_footer_content() ) {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->get_script( 'default' )->set_inline( $settings['inline'] ),
						$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] ),
					),
				);
			}
			
			if(apply_filters( $this->get_prefix('credits'), true)) {
				$template['scripts'][] = $this->get_script( 'credits' )->set_inline( $settings['inline'] );
			}
			
			$this->get_script( 'inline_config' )->set_is_enqueued();
	
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