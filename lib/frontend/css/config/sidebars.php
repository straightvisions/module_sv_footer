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