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
			$module->get_setting('border')->get_css_data(),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar',
		array_merge(
			$module->get_setting('max_width_bar')->get_css_data('max-width'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('padding')->get_css_data('padding')
		)
	);