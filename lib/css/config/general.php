<?php

	// footer ----------------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer_wrapper',
		$module->get_setting('position')->get_css_data('position')
	);

	echo $_s->build_css(
		is_admin()
			? 'div[data-widget-area-id="'.$module->get_setting('sidebar')->get_data().'"] > .block-editor-block-list__layout'
			: '.sv100_sv_footer',
		array_merge(
			$module->get_setting('max_width_container')->get_css_data('max-width'),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar',
		array_merge(
			$module->get_setting('max_width_bar')->get_css_data('max-width')
		)
	);