<?php
	// columns outer ---------------------------------------------------------------------------------------------------
	$prepared_properties = array();
	for($i = 1; $i < 6; $i++){
		if(${'sidebar_'.$i.'_alignment'}) {
			$prepared_properties[$i] = $setting->prepare_css_property_responsive(${'sidebar_' . $i . '_alignment'});
		}
	}
	for($i = 1; $i < 6; $i++){
		$properties					= array();

		if(${'sidebar_'.$i.'_alignment_content'}){
			// inner stuff
			$properties['text-align'] 		= $setting->prepare_css_property_responsive(${'sidebar_' . $i . '_alignment_content'});
		}

		if(${'sidebar_'.$i.'_alignment'}){

			// outer stuff
			$properties['justify-self'] = array(); // row
			$properties['align-self'] 	= array(); // column
			$properties['margin-left'] 	= array();
			$properties['margin-right'] = array();

			foreach($prepared_properties[$i] as $key => $value) {
				$properties['margin-left'][$key]	= '15px';
				$properties['margin-right'][$key]	= '15px';
				$properties['justify-self'][$key]	= 'unset';
				$properties['align-self'][$key]		= 'unset';

				// flex hacks to simulate parent justify content and add more options
				if( isset($direction[$key]) && $direction[$key] === 'row' ) {

					if( $value === 'flex-start' && isset($prepared_properties[$i+1]) && $prepared_properties[$i+1][$key] != 'flex-start'){
						$properties['margin-right'][$key] = 'auto';
					}

					if( $value === 'flex-end' && isset($prepared_properties[$i+1]) && $prepared_properties[$i-1][$key] != 'flex-end'){
						$properties['margin-left'][$key] = 'auto';
					}

					if( $value === 'center' ){
						$properties['margin-left'][$key] 	= 'auto';
						$properties['margin-right'][$key] 	= 'auto';
					}

					$properties['justify-self'][$key] = $value;
				}

				// column direction doesn't need any hacks ;)
				if( isset($direction[$key]) && $direction[$key] === 'column' ) {
					$properties['align-self'][$key] 	= $value;
					$properties['margin-left'][$key] 	= '0';
					$properties['margin-right'][$key] 	= '0';
				}

			}

		}

		echo $setting->build_css(
			'.sv100_sv_footer .sv100_sv_footer_bar > .sv100_sv_sidebar_sv_footer_'.$i,
			$properties
		);
	}

	// columns inner ---------------------------------------------------------------------------------------------------
	
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar *',
		array_merge(
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data()
		)
	);

	// widget_title ----------------------------------------------------------------------------------------------------

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar > div > .sv100_sv_footer_sv_sidebar',
		array_merge(
			$script->get_parent()->get_setting('font_widget_title')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size_widget_title')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height_widget_title')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color_widget_title')->get_css_data()
		)
	);