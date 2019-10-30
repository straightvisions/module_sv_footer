<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->run_type()->get_data();
		
		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}
	
	// Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                     = false;
	}
	
	if ( $font_family_widget_title ) {
		$font_widget_title		= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_widget_title );
	} else {
		$font_widget_title      = false;
	}
?>

/* General */
.sv100_sv_footer,
.sv100_sv_footer a,
.sv100_sv_footer_widgets_bar .widget,
.sv100_sv_footer_widgets_bar .widget a,
.sv100_sv_footer_widgets_bar .widget a:hover,
.sv100_sv_footer_widgets_bar .widget a:focus {
	<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: rgba(<?php echo $text_color; ?>);
	line-height: <?php echo $line_height; ?>px;
}

.sv100_sv_footer {
	background-color: rgba(<?php echo $bg_color; ?>);

<?php
	if ( $bg_image ) {
		$bg_size = $bg_size > 0 ? $bg_size . 'px' : $bg_fit;
		?>
	background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image, $bg_media_size )[0]; ?>' );
	background-position:<?php echo $bg_position; ?>;
	background-size:<?php echo $bg_size; ?>;
	background-repeat:<?php echo $bg_repeat; ?>;
	background-attachment:<?php echo $bg_attachment; ?>;
<?php } ?>
}

.sv100_sv_footer a:hover,
.sv100_sv_footer a:focus {
	color: rgba(<?php echo $highlight_color; ?>);
}

/* Widgets */
.sv100_sv_footer_widgets_bar .widget h3 {
	<?php echo ( $font_widget_title ? 'font-family: "' . $font_widget_title['family'] . '", sans-serif;' : '' ); ?>
	font-weight: <?php echo ( $font_widget_title ? $font_widget_title['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_widget_title; ?>px;
	color: rgba(<?php echo $text_color_widget_title; ?>);
	line-height: <?php echo $line_height_widget_title; ?>px;
}

.sv100_sv_footer_widgets_bar .widget ul li,
.sv100_sv_footer_widgets_bar .widget select option,
.sv100_sv_footer_widgets_bar .widget.widget_recent_comments li:hover,
.sv100_sv_footer_widgets_bar .widget.widget_recent_comments li:focus,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:hover,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:focus,
.sv100_sv_footer_widgets_bar .widget.widget_rss ul li:hover,
.sv100_sv_footer_widgets_bar .widget.widget_rss ul li:focus {
	background-color: rgba(<?php echo $bg_color_widget; ?>);
}

.sv100_sv_footer_widgets_bar .widget ul li:hover,
.sv100_sv_footer_widgets_bar .widget ul li:focus,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:hover > a,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:focus > a {
	background-color: rgba(<?php echo $highlight_color; ?>);
}

.sv100_sv_footer_widgets_bar .widget select,
.sv100_sv_footer_widgets_bar .widget select option,
.sv100_sv_footer_widgets_bar .widget input[type="search"],
.sv100_sv_footer_widgets_bar .widget input::placeholder {
	color: rgba(<?php echo $text_color; ?>);
}
.sv100_sv_footer_widgets_bar .widget select,
.sv100_sv_footer_widgets_bar .widget select option,
.sv100_sv_footer_widgets_bar .widget input[type="search"],
.sv100_sv_footer_widgets_bar .widget_calendar table td,
.sv100_sv_footer_widgets_bar .widget_calendar table th {
	border-color: rgba(<?php echo $text_color; ?>);
}

.sv100_sv_footer_widgets_bar .widget_recent_comments a:hover,
.sv100_sv_footer_widgets_bar .widget_recent_comments a:focus,
.sv100_sv_footer_widgets_bar .widget_text a:hover,
.sv100_sv_footer_widgets_bar .widget_text a:focus,
.sv100_sv_footer_widgets_bar .widget_tag_cloud a:hover,
.sv100_sv_footer_widgets_bar .widget_tag_cloud a:focus,
.sv100_sv_footer_widgets_bar .widget_rss ul li > a:hover,
.sv100_sv_footer_widgets_bar .widget_rss ul li > a:focus {
	color: rgba(<?php echo $highlight_color; ?>);
}

/* Sidebar - Alignment */
<?php
if ( count( $script->get_parent()->get_module( 'sv_sidebar' )->get_sidebars( $script->get_parent() ) ) > 0 ) {
	foreach ( $script->get_parent()->get_module( 'sv_sidebar' )->get_sidebars( $script->get_parent() ) as $sidebar ) {
		$alignment = $script->get_parent()->get_setting( $sidebar['id'] )->run_type()->get_data();
		
		switch ( $alignment ) {
			case 'left':
				$align_items 	= 'flex-start';
				break;
			case 'right':
				$align_items 	= 'flex-end';
				break;
		}
		
		echo '.' . $sidebar['id'] . '{';
		echo 'text-align: ' . $alignment . ';';
		echo 'align-items: ' . $align_items . ';';
		echo '}';
	}
}
?>