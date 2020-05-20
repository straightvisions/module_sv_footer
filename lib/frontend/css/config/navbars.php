<?php
	// links ----------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .menu-item a',
		array_merge(
			$script->get_parent()->get_setting('navbar_item_font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('navbar_item_font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('navbar_item_line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('navbar_item_margin')->get_css_data(),
			$script->get_parent()->get_setting('navbar_item_padding')->get_css_data('padding'),
			$script->get_parent()->get_setting('navbar_item_text_color_link')->get_css_data(),
			$script->get_parent()->get_setting('navbar_item_text_bg_color_link')->get_css_data('background-color'),
			$script->get_parent()->get_setting('navbar_item_text_deco_link')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar .menu-item a:hover',
		array_merge(
			$script->get_parent()->get_setting('navbar_item_text_color_link_hover')->get_css_data(),
			$script->get_parent()->get_setting('navbar_item_text_bg_color_link_hover')->get_css_data('background-color'),
			$script->get_parent()->get_setting('navbar_item_text_deco_link_hover')->get_css_data()
		)
	);