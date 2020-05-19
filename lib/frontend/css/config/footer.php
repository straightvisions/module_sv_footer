<?php

	// footer ----------------------------------------------------------------------------------------------------------
	echo $_s->build_css(
		'.sv100_sv_footer_wrapper',
		$script->get_parent()->get_setting('position')->get_css_data('position')
	);

	echo $_s->build_css(
		'.sv100_sv_footer',
		array_merge(
			$script->get_parent()->get_setting('max_width_container')->get_css_data('max-width'),
			$script->get_parent()->get_setting('margin')->get_css_data(),
			$script->get_parent()->get_setting('border')->get_css_data(),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_footer .sv100_sv_footer_bar',
		array_merge(
			$script->get_parent()->get_setting('max_width_bar')->get_css_data('max-width'),
			$script->get_parent()->get_setting('direction')->get_css_data('flex-direction'),
			$script->get_parent()->get_setting('padding')->get_css_data('padding')
		)
	);