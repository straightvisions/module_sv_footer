<?php
	if($module->has_footer_content()){
		require( $module->get_path( 'lib/css/config/general.php' ) );
		require( $module->get_path( 'lib/css/config/widgets.php' ) );
		require( $module->get_path( 'lib/css/config/navbars.php' ) );
	}