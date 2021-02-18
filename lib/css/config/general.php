<?php

	// footer ----------------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer_wrapper',
		$module->get_setting('position')->get_css_data('position')
	);

	echo $_s->build_css(
		'.sv100_sv_footer',
		array_merge(
			$module->get_setting('max_width_container')->get_css_data('max-width'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('border')->get_css_data(),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar',
		array_merge(
			$module->get_setting('max_width_bar')->get_css_data('max-width'),
			$module->get_setting('direction')->get_css_data('flex-direction'),
			$module->get_setting('padding')->get_css_data('padding')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer_credits > .sv100_sv_footer_credits_info',
		array_merge(
			$module->get_setting('direction')->get_css_data('flex-direction')
		)
	);

	// columns outer ---------------------------------------------------------------------------------------------------
	$prepared_properties = array();
	for($i = 1; $i < 6; $i++){
		if($module->get_setting('sidebar_' . $i . '_alignment')->get_data()) {
			$prepared_properties[$i] = $_s->prepare_css_property_responsive($module->get_setting('sidebar_' . $i . '_alignment')->get_data());
		}
	}

	for($i = 1; $i < 6; $i++){
		$properties					= array();

		if($module->get_setting('sidebar_' . $i . '_alignment_content')->get_data()){
			// inner stuff
			$properties['text-align'] 		= $_s->prepare_css_property_responsive($module->get_setting('sidebar_' . $i . '_alignment_content')->get_data());
		}

		if($module->get_setting('sidebar_' . $i . '_alignment')->get_data()){

			// outer stuff
			$properties['justify-self'] = array(); // row
			$properties['align-self'] 	= array(); // column
			$properties['margin-left'] 	= array();
			$properties['margin-right'] = array();

			foreach($prepared_properties[$i] as $key => $value) {
				$properties['margin-left'][$key]	= '15px';
				$properties['margin-right'][$key]	= '15px';
				$properties['justify-self'][$key]	= 'center';
				$properties['align-self'][$key]		= 'center';

				// flex hacks to simulate parent justify content and add more options
				if( isset($module->get_setting('direction')->get_data()[$key]) && $module->get_setting('direction')->get_data()[$key] === 'row' ) {

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
				if( isset($module->get_setting('direction')->get_data()[$key]) && $module->get_setting('direction')->get_data()[$key] === 'column' ) {
					$properties['margin-left'][$key] 	= '0';
					$properties['margin-right'][$key] 	= '0';
				}
				$properties['align-self'][$key] 	= $value;
			}

		}

		echo $_s->build_css(
			'.sv100_sv_footer .sv100_sv_footer_bar > .sv100_sv_footer_'.$i,
			$properties
		);
	}