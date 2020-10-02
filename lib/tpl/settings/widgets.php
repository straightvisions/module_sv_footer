<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Widgets', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'Text', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'font' )->form();
				echo $module->get_setting( 'font_size' )->form();
				echo $module->get_setting( 'line_height' )->form();
				echo $module->get_setting( 'text_color' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Widgets title', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'font_widget_title' )->form();
				echo $module->get_setting( 'font_size_widget_title' )->form();
				echo $module->get_setting( 'line_height_widget_title' )->form();
				echo $module->get_setting( 'text_color_widget_title' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Link', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color_link' )->form();
				echo $module->get_setting( 'text_bg_color_link' )->form();
				echo $module->get_setting( 'text_deco_link' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Link Hover/Focus', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color_link_hover' )->form();
				echo $module->get_setting( 'text_bg_color_link_hover' )->form();
				echo $module->get_setting( 'text_deco_link_hover' )->form();
			?>
		</div>
	</div>
<?php } ?>