<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Navigation Bars', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'General', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'navbar_direction' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Font', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'navbar_item_font' )->form();
				echo $module->get_setting( 'navbar_item_font_size' )->form();
				echo $module->get_setting( 'navbar_item_line_height' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Link', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'navbar_item_text_color_link' )->form();
				echo $module->get_setting( 'navbar_item_text_bg_color_link' )->form();
				echo $module->get_setting( 'navbar_item_text_deco_link' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Item Link Hover/Focus', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'navbar_item_text_color_link_hover' )->form();
				echo $module->get_setting( 'navbar_item_text_bg_color_link_hover' )->form();
				echo $module->get_setting( 'navbar_item_text_deco_link_hover' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Item Spacing', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'navbar_item_margin' )->form();
				echo $module->get_setting( 'navbar_item_padding' )->form();
			?>
		</div>
	</div>
<?php } ?>