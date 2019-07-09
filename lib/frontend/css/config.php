<?php
	// Font - General
	$font_family							= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	if ( $font_family ) {
		$font								= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                       		= false;
	}
	$font_size								= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$font_line_height						= $script->get_parent()->get_setting( 'font_line_height' )->run_type()->get_data();
	$text_decoration						= $script->get_parent()->get_setting( 'text_decoration' )->run_type()->get_data();
	$font_color								= $script->get_parent()->get_setting( 'font_color' )->run_type()->get_data();
	
	// Font - Links
	$font_family_link						= $script->get_parent()->get_setting( 'font_family_link' )->run_type()->get_data();
	if ( $font_family_link ) {
		$font_link							= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_link );
	} else {
		$font_link                      	= false;
	}
	$font_size_link							= $script->get_parent()->get_setting( 'font_size_link' )->run_type()->get_data();
	$font_line_height_link					= $script->get_parent()->get_setting( 'font_line_height_link' )->run_type()->get_data();
	$text_decoration_link					= $script->get_parent()->get_setting( 'text_decoration_link' )->run_type()->get_data();
	$font_color_link						= $script->get_parent()->get_setting( 'font_color_link' )->run_type()->get_data();
	$font_background_color_active_link		= $script->get_parent()->get_setting( 'font_background_color_active_link' )->run_type()->get_data();
	$font_background_color_link				= $script->get_parent()->get_setting( 'font_background_color_link' )->run_type()->get_data();
	
	// Font - Links (Hover/Focus)
	$font_family_link_hover					= $script->get_parent()->get_setting( 'font_family_link_hover' )->run_type()->get_data();
	if ( $font_family_link_hover ) {
		$font_link_hover					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family_link_hover );
	} else {
		$font_link_hover                    = false;
	}
	$font_size_link_hover					= $script->get_parent()->get_setting( 'font_size_link_hover' )->run_type()->get_data();
	$font_line_height_link_hover			= $script->get_parent()->get_setting( 'font_line_height_link_hover' )->run_type()->get_data();
	$text_decoration_link_hover				= $script->get_parent()->get_setting( 'text_decoration_link_hover' )->run_type()->get_data();
	$font_color_link_hover					= $script->get_parent()->get_setting( 'font_color_link_hover' )->run_type()->get_data();
	$font_background_color_active_link_hover= $script->get_parent()->get_setting( 'font_background_color_active_link_hover' )->run_type()->get_data();
	$font_background_color_link_hover		= $script->get_parent()->get_setting( 'font_background_color_link_hover' )->run_type()->get_data();
	
	// Background Settings
	$background_color						= $script->get_parent()->get_setting( 'background_color' )->run_type()->get_data();
	$background_image						= $script->get_parent()->get_setting( 'background_image' )->run_type()->get_data();
	$background_image_media_size			= $script->get_parent()->get_setting( 'background_image_media_size' )->run_type()->get_data();
	$background_image_position				= $script->get_parent()->get_setting( 'background_image_position' )->run_type()->get_data();
	$background_image_size					= $script->get_parent()->get_setting( 'background_image_size' )->run_type()->get_data();
	$background_image_fit					= $script->get_parent()->get_setting( 'background_image_fit' )->run_type()->get_data();
	$background_image_repeat				= $script->get_parent()->get_setting( 'background_image_repeat' )->run_type()->get_data();
	$background_image_attachment			= $script->get_parent()->get_setting( 'background_image_attachment' )->run_type()->get_data();
?>

/* General */
.sv100_sv_footer {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $font_color; ?>;
	line-height: <?php echo $font_line_height; ?>px;
	text-decoration: <?php echo $text_decoration; ?>;
	background-color: <?php echo $background_color; ?>;

<?php if ( $background_image ) { ?>
	background-image: url( '<?php echo wp_get_attachment_image_src( $background_image, $background_image_media_size )[0]; ?>' );
	background-position:<?php echo $background_image_position; ?>;
	background-size:<?php echo $background_image_size; ?>;
	background-repeat:<?php echo $background_image_repeat; ?>;
	background-attachment:<?php echo $background_image_attachment; ?>;
<?php } ?>
}

.sv100_sv_footer a {
	font-family: <?php echo ( $font_link ? '"' . $font_link['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_link ? '"' . $font_link['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size_link; ?>px;
	color: <?php echo $font_color_link; ?>;
	line-height: <?php echo $font_line_height_link; ?>px;
	text-decoration: <?php echo $text_decoration_link; ?>;
	background-color: <?php echo $font_background_color_active_link ?  $font_background_color_link : 'transparent'; ?>
}

.sv100_sv_footer a:hover,
.sv100_sv_footer a:focus {
	font-family: <?php echo ( $font_link_hover ? '"' . $font_link_hover['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font_link_hover ? '"' . $font_link_hover['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size_link_hover; ?>px;
	color: <?php echo $font_color_link_hover; ?>;
	line-height: <?php echo $font_line_height_link_hover; ?>px;
	text-decoration: <?php echo $text_decoration_link_hover; ?>;
	background-color: <?php echo $font_background_color_active_link_hover ?  $font_background_color_link_hover : 'transparent'; ?>
}