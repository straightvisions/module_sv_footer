<?php

	// text ---------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input',
		array_merge(
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data(),
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

	// links ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar a',
		array_merge(
			$script->get_parent()->get_setting('text_color_link')->get_css_data(),
			$script->get_parent()->get_setting('text_bg_color_link')->get_css_data('background-color'),
			$script->get_parent()->get_setting('text_deco_link')->get_css_data('text-decoration')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar a:hover',
		array_merge(
			$script->get_parent()->get_setting('text_color_link_hover')->get_css_data(),
			$script->get_parent()->get_setting('text_bg_color_link_hover')->get_css_data('background-color'),
			$script->get_parent()->get_setting('text_deco_link_hover')->get_css_data('text-decoration')
		)
	);

	// Search ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input',
		array_merge(
			$script->get_parent()->get_setting('text_color_link')->get_css_data(),
			$script->get_parent()->get_setting('text_color_link')->get_css_data('border-color'),
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search form:hover input,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search form:focus input',
		array_merge(
			$script->get_parent()->get_setting('text_color_link_hover')->get_css_data('border-color'),
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input:hover,
		.sv100_sv_footer .sv100_sv_footer_bar .sv100_sv_sidebar .widget_search input:focus',
		array_merge(
			$script->get_parent()->get_setting('text_color_link_hover')->get_css_data(),
		)
	);