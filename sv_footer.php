<?php
	namespace sv_100;
	
	/**
	 * @author			Matthias Reuter
	 * @package			sv_100
	 * @copyright		2017 Matthias Reuter
	 * @link			https://straightvisions.com
	 * @since			1.0
	 * @license			See license.txt or https://straightvisions.com
	 */
	class sv_footer extends init{
		static $scripts_loaded						= false;

		public function __construct($path,$url){
			$this->path								= $path;
			$this->url								= $url;
			$this->name								= get_class($this);
			
			add_shortcode($this->get_module_name(), array($this, 'shortcode'));
			add_action('widgets_init', array($this, 'sidebars'));
			add_action('after_setup_theme', array($this, 'after_setup_theme'));
		}
		public function shortcode($settings, $content=''){
			$settings								= shortcode_atts(
				array(
					'inline'						=> false
				),
				$settings,
				$this->get_module_name()
			);
			$this->module_enqueue_scripts($settings['inline']);
			
			ob_start();
			include($this->get_path('lib/tpl/frontend.php'));
			$output									= ob_get_contents();
			ob_end_clean();
			
			return $output;
		}
		public function sidebars(){
			register_sidebar(array(
			'name'									=> __('Footer Sidebar', 'sv_100'),
			'id'									=> $this->get_module_name(),
			'description'							=> __( 'Widgets in this area will be shown in footer.', 'sv_100' ),
			'before_widget'							=> '<li id="%1$s" class="widget %2$s">',
			'after_widget'							=> '</li>',
			'before_title'							=> '<h2 class="'.$this->get_module_name().'">',
			'after_title'							=> '</h2>',
			));
		}
		public function after_setup_theme(){
			register_nav_menus(
				array(
					$this->get_module_name().'_1'			=> __('Footer Menu 1', 'sv_100'),
					$this->get_module_name().'_2'			=> __('Footer Menu 2', 'sv_100'),
					$this->get_module_name().'_3'			=> __('Footer Menu 3', 'sv_100'),
					$this->get_module_name().'_4'			=> __('Footer Menu 4', 'sv_100'),
				)
			);
		}
	}
?>