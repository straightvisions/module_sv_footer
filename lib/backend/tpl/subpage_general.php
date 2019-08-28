<div class="sv_setting_subpage">
    <h2><?php _e( 'General', 'sv100' ); ?></h2>
    
    <h3 class="divider"><?php _e( 'Text', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'font_family' )->run_type()->form();
            echo $module->get_settings_component( 'font_size' )->run_type()->form();
            echo $module->get_settings_component( 'line_height' )->run_type()->form();
            echo $module->get_settings_component( 'text_color' )->run_type()->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Widgets title', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'font_family_widget_title' )->run_type()->form();
            echo $module->get_settings_component( 'font_size_widget_title' )->run_type()->form();
            echo $module->get_settings_component( 'line_height_widget_title' )->run_type()->form();
            echo $module->get_settings_component( 'text_color_widget_title' )->run_type()->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_color' )->run_type()->form();
            echo $module->get_settings_component( 'bg_image' )->run_type()->form();
            echo $module->get_settings_component( 'bg_media_size' )->run_type()->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_position' )->run_type()->form();
            echo $module->get_settings_component( 'bg_size' )->run_type()->form();
            echo $module->get_settings_component( 'bg_fit' )->run_type()->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_repeat' )->run_type()->form();
            echo $module->get_settings_component( 'bg_attachment' )->run_type()->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_color_widget' )->run_type()->form();
            echo $module->get_settings_component( 'highlight_color' )->run_type()->form();
        ?>
    </div>
</div>