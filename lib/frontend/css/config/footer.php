<?php

	// footer ----------------------------------------------------------------------------------------------------------
	$properties					= array();

	// Background
	if($position) {
		$properties['position'] = $setting->prepare_css_property_responsive($position, '', '');
	}

	echo $setting->build_css(
		'.sv100_sv_footer_wrapper',
		$properties
	);

	$properties					= array();

	if($bg_color) {
		$properties['background-color'] = $setting->prepare_css_property_responsive(array('mobile'=>$bg_color), 'rgba(', ')');
	}

	if($max_width_container) {
		$properties['max-width'] = $setting->prepare_css_property($max_width_container, '', '');
	}

	// Margin
	if($margin) {
		$imploded		= false;
		foreach($margin as $breakpoint => $val) {
			$top 		= (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : false;
			$right 		= (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : false;
			$bottom 	= (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : false;
			$left 		= (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : false;

			if($top !== false || $right !== false || $bottom !== false || $left !== false) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['margin'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	echo $setting->build_css(
		'.sv100_sv_footer',
		$properties
	);

	// footer bar-------------------------------------------------------------------------------------------------------
	$properties = array();
	if($max_width_bar) {
		$properties['max-width'] = $setting->prepare_css_property($max_width_bar, '', '');
	}

	// Padding
	// @todo: same as margin, refactor to avoid doubled code

	if($padding) {
		$imploded		= false;
		foreach($padding as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : false;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : false;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : false;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : false;

			if($top !== false || $right !== false || $bottom !== false || $left !== false) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['padding'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	if($direction){
		$properties['flex-direction']  = $setting->prepare_css_property_responsive($direction);
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_footer .sv100_sv_footer_bar, .editor-styles-wrapper .sv100_sv_footer .sv100_sv_footer_bar'
			: '.sv100_sv_footer .sv100_sv_footer_bar',
		$properties
	);

	// footer children -------------------------------------------------------------------------------------------------
/*
	// children flex setup
	$properties = array();
	$container_alignment  = $setting->prepare_css_property_responsive($alignment);
	$properties['flex']   = $setting->get_breakpoints();

	foreach( $properties['flex'] as $key => &$value){
		$value = '1 1 0';
		if(isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['center', 'spread'])){
			$value = '0 1 auto';
		}

		if($key === 'mobile' && isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['spread'])){
			$value = '1 1 auto; width:100%;'; // inject flex hack fix
		}
	}

	$properties['margin']   = $setting->get_breakpoints();

	foreach( $properties['margin'] as $key => &$value){
		$value = '0 15px';
		if($key === 'mobile' && isset($container_alignment[$key]) && in_array($container_alignment[$key] , ['center'])){
			$value = '0 0 15px  0';
		}
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_footer .sv100_sv_footer_bar > *, .editor-styles-wrapper .sv100_sv_footer .sv100_sv_footer_bar > *'
			: '.sv100_sv_footer .sv100_sv_footer_bar > *',
		$properties
	);
*/
