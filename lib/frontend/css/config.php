<?php
	// Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                     = false;
	}
	
	$font_size					= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$text_color					= $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
	$line_height				= $script->get_parent()->get_setting( 'line_height' )->run_type()->get_data();
	
	// Widget Titles
	$font_family_widget_title	= $script->get_parent()->get_setting( 'font_family_widget_title' )->run_type()->get_data();
	
	if ( $font_family_widget_title ) {
		$font_widget_title		= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_widget_title );
	} else {
		$font_widget_title      = false;
	}
	
	$font_size_widget_title		= $script->get_parent()->get_setting( 'font_size_widget_title' )->run_type()->get_data();
	$text_color_widget_title	= $script->get_parent()->get_setting( 'text_color_widget_title' )->run_type()->get_data();
	$line_height_widget_title	= $script->get_parent()->get_setting( 'line_height_widget_title' )->run_type()->get_data();
	
	// Background Settings
	$bg_color					= $script->get_parent()->get_setting( 'bg_color' )->run_type()->get_data();
	$bg_image					= $script->get_parent()->get_setting( 'bg_image' )->run_type()->get_data();
	$bg_media_size				= $script->get_parent()->get_setting( 'bg_media_size' )->run_type()->get_data();
	$bg_position				= $script->get_parent()->get_setting( 'bg_position' )->run_type()->get_data();
	$bg_size					= $script->get_parent()->get_setting( 'bg_size' )->run_type()->get_data();
	$bg_fit						= $script->get_parent()->get_setting( 'bg_fit' )->run_type()->get_data();
	$bg_repeat					= $script->get_parent()->get_setting( 'bg_repeat' )->run_type()->get_data();
	$bg_attachment				= $script->get_parent()->get_setting( 'bg_attachment' )->run_type()->get_data();
	
	// Color Settings
	$bg_color_widget			= $script->get_parent()->get_setting( 'bg_color_widget' )->run_type()->get_data();
	$highlight_color			= $script->get_parent()->get_setting( 'highlight_color' )->run_type()->get_data();
?>

/* General */
.sv100_sv_footer,
.sv100_sv_footer a,
.sv100_sv_footer_widgets_bar .widget,
.sv100_sv_footer_widgets_bar .widget a,
.sv100_sv_footer_widgets_bar .widget a:hover,
.sv100_sv_footer_widgets_bar .widget a:focus {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $text_color; ?>;
	line-height: <?php echo $line_height; ?>px;
}

.sv100_sv_footer {
	background-color: <?php echo $bg_color; ?>;

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
	color: <?php echo $highlight_color; ?>;
}

/* Widgets */
.sv100_sv_footer_widgets_bar .widget h3 {
	font-family: <?php echo ( $font_widget_title ? '"' . $font_widget_title['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_widget_title ? $font_widget_title['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_widget_title; ?>px;
	color: <?php echo $text_color_widget_title; ?>;
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
	background-color: <?php echo $bg_color_widget; ?>;
}

.sv100_sv_footer_widgets_bar .widget ul li:hover,
.sv100_sv_footer_widgets_bar .widget ul li:focus,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:hover > a,
.sv100_sv_footer_widgets_bar .widget_nav_menu ul > li.menu-item-has-children:focus > a {
	background-color: <?php echo $highlight_color; ?>;
}

.sv100_sv_footer_widgets_bar .widget select,
.sv100_sv_footer_widgets_bar .widget select option,
.sv100_sv_footer_widgets_bar .widget input[type="search"],
.sv100_sv_footer_widgets_bar .widget input::placeholder {
	color: <?php echo $text_color; ?>;
}
.sv100_sv_footer_widgets_bar .widget select,
.sv100_sv_footer_widgets_bar .widget select option,
.sv100_sv_footer_widgets_bar .widget input[type="search"],
.sv100_sv_footer_widgets_bar .widget_calendar table td,
.sv100_sv_footer_widgets_bar .widget_calendar table th {
	border-color: <?php echo $text_color; ?>;
}

.sv100_sv_footer_widgets_bar .widget_recent_comments a:hover,
.sv100_sv_footer_widgets_bar .widget_recent_comments a:focus,
.sv100_sv_footer_widgets_bar .widget_text a:hover,
.sv100_sv_footer_widgets_bar .widget_text a:focus,
.sv100_sv_footer_widgets_bar .widget_tag_cloud a:hover,
.sv100_sv_footer_widgets_bar .widget_tag_cloud a:focus,
.sv100_sv_footer_widgets_bar .widget_rss ul li > a:hover,
.sv100_sv_footer_widgets_bar .widget_rss ul li > a:focus {
	color: <?php echo $highlight_color; ?>;
}