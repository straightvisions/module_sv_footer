<div class="sv_setting_subpage">
    <h2><?php _e( 'General', 'sv100' ); ?></h2>

    <h3 class="divider"><?php _e( 'Position & Alignment', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'max_width_container' )->form();
		echo $module->get_setting( 'max_width_bar' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'position' )->form();
		echo $module->get_setting( 'alignment' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Columns Content Alignments', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
		for($i = 1; $i < 6; $i++){
			echo $module->get_setting( 'sidebar_'.$i.'_alignment' )->form();
		}
        ?>
    </div>

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

    <h3 class="divider"><?php _e( 'Spacing', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'margin' )->form();
		echo $module->get_setting( 'padding' )->form();
		?>
    </div>
    <h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'bg_color' )->form();
		echo $module->get_setting( 'box_shadow_color' )->form();
		?>
    </div>

</div>