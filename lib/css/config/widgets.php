<?php

	// text ---------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar, .sv100_sv_footer .sv100_sv_footer_bar p,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data()
		)
	);

	// widget_title ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'
		.sv100_sv_footer .sv100_sv_footer_bar .widget h1,
		.sv100_sv_footer .sv100_sv_footer_bar .widget h2,
		.sv100_sv_footer .sv100_sv_footer_bar .widget h3,
		.sv100_sv_footer .sv100_sv_footer_bar .widget h4,
		.sv100_sv_footer .sv100_sv_footer_bar .widget h5,
		.sv100_sv_footer .sv100_sv_footer_bar .widget h6
		',
		array_merge(
			$module->get_setting('font_widget_title')->get_css_data('font-family'),
			$module->get_setting('font_size_widget_title')->get_css_data('font-size','','px'),
			$module->get_setting('line_height_widget_title')->get_css_data('line-height'),
			$module->get_setting('text_color_widget_title')->get_css_data()
		)
	);

	// Search ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input',
		array_merge(
			$module->get_setting('text_color_link')->get_css_data(),
			$module->get_setting('text_color_link')->get_css_data('border-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search form:hover input,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search form:focus input',
		array_merge(
			$module->get_setting('text_color_link_hover')->get_css_data('border-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input:hover,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input:focus',
		array_merge(
			$module->get_setting('text_color_link_hover')->get_css_data()
		)
	);