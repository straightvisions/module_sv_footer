<?php
	// common ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .menu',
		array_merge(
			$module->get_setting('navbar_direction')->get_css_data('flex-direction')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .menu-item a',
		array_merge(
			$module->get_setting('navbar_item_font')->get_css_data('font-family'),
			$module->get_setting('navbar_item_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('navbar_item_line_height')->get_css_data('line-height'),
			$module->get_setting('navbar_item_margin')->get_css_data(),
			$module->get_setting('navbar_item_padding')->get_css_data('padding'),
			$module->get_setting('navbar_item_text_color_link')->get_css_data(),
			$module->get_setting('navbar_item_text_bg_color_link')->get_css_data('background-color'),
			$module->get_setting('navbar_item_text_deco_link')->get_css_data('text-decoration')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .menu-item a:hover',
		array_merge(
			$module->get_setting('navbar_item_text_color_link_hover')->get_css_data(),
			$module->get_setting('navbar_item_text_bg_color_link_hover')->get_css_data('background-color'),
			$module->get_setting('navbar_item_text_deco_link_hover')->get_css_data('text-decoration')
		)
	);