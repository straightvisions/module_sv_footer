<div class="sv_setting_subpage">
    <h2><?php _e( 'General', 'sv100' ); ?></h2>
    
    <h3 class="divider"><?php _e( 'Text', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'font_family' )->form();
            echo $module->get_setting( 'font_size' )->form();
            echo $module->get_setting( 'line_height' )->form();
            echo $module->get_setting( 'text_color' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Widgets title', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'font_family_widget_title' )->form();
            echo $module->get_setting( 'font_size_widget_title' )->form();
            echo $module->get_setting( 'line_height_widget_title' )->form();
            echo $module->get_setting( 'text_color_widget_title' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_color' )->form();
            echo $module->get_setting( 'bg_image' )->form();
            echo $module->get_setting( 'bg_media_size' )->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_position' )->form();
            echo $module->get_setting( 'bg_size' )->form();
            echo $module->get_setting( 'bg_fit' )->form();
        ?>
    </div>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_repeat' )->form();
            echo $module->get_setting( 'bg_attachment' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'bg_color_widget' )->form();
            echo $module->get_setting( 'highlight_color' )->form();
        ?>
    </div>
</div>