<?php
	// columns outer ---------------------------------------------------------------------------------------------------
	for($i = 1; $i < 6; $i++){
		$properties					= array();

		if(${'sidebar_'.$i.'_alignment'}){
			$properties['justify-content'] = $setting->prepare_css_property_responsive(${'sidebar_'.$i.'_alignment'});
		}

		echo $setting->build_css(
			'.sv100_sv_footer .sv100_sv_footer_bar > .sv100_sv_sidebar_sv_footer_'.$i,
			$properties
		);
	}

	// columns inner ---------------------------------------------------------------------------------------------------
	$properties					= array();

	// color
	if($text_color) {
		$properties['color'] = $setting->prepare_css_property_responsive(array('mobile'=>$text_color), 'rgba(',')', '');
	}

	if($font_family) {
		$properties['font-family'] = $setting->prepare_css_property_responsive(array('mobile'=>$font_family), '', '');
	}

	if($font_size) {
		$properties['font-size'] = $setting->prepare_css_property_responsive($font_size, '', 'px');
	}

	if($line_height) {
		$properties['line-height'] = $setting->prepare_css_property_responsive($line_height, '', '');
	}


	echo $setting->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar *',
		$properties
	);

	// widget_title ----------------------------------------------------------------------------------------------------
	$properties					= array();

	// color
	if($text_color_widget_title) {
		$properties['color'] = $setting->prepare_css_property_responsive(array('mobile'=>$text_color_widget_title), 'rgba(',')', '');
	}

	if($font_family_widget_title) {
		$properties['font-family'] = $setting->prepare_css_property_responsive(array('mobile'=>$font_family_widget_title), '', '');
	}

	if($font_size_widget_title) {
		$properties['font-size'] = $setting->prepare_css_property_responsive($font_size_widget_title, '', 'px');
	}

	if($line_height_widget_title) {
		$properties['line-height'] = $setting->prepare_css_property_responsive($line_height_widget_title, '', '');
	}

	echo $setting->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar > div > .sv100_sv_footer_sv_sidebar',
		$properties
	);

