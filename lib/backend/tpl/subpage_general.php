<div class="sv_setting_subpage">
    <h2><?php _e( 'General', 'sv100' ); ?></h2>
    
    <h3 class="divider"><?php _e( 'Text', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'font_family' )->form();
            echo $module->get_settings_component( 'font_size' )->form();
            echo $module->get_settings_component( 'line_height' )->form();
            echo $module->get_settings_component( 'text_color' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Widgets title', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'font_family_widget_title' )->form();
            echo $module->get_settings_component( 'font_size_widget_title' )->form();
            echo $module->get_settings_component( 'line_height_widget_title' )->form();
            echo $module->get_settings_component( 'text_color_widget_title' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_color' )->form();
            echo $module->get_settings_component( 'bg_image' )->form();
            echo $module->get_settings_component( 'bg_media_size' )->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_position' )->form();
            echo $module->get_settings_component( 'bg_size' )->form();
            echo $module->get_settings_component( 'bg_fit' )->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_settings_component( 'bg_repeat' )->form();
            echo $module->get_settings_component( 'bg_attachment' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_color_widget' )->form();
            echo $module->get_settings_component( 'highlight_color' )->form();
        ?>
    </div>
</div>