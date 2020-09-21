<?php

	require( $module->get_path( 'lib/css/config/general.php' ) );

	if( $module->get_root()->get_module( 'sv_sidebar' ) ){
		$check = false;
		$sidebar = $module->get_root()->get_module( 'sv_sidebar' );
		for($i = 1; $i < 6 ;$i++){
			$check = $sidebar->load( array( 'id' => $module->get_module_name().'_1' ) ) ? true : false;
		}

		if( $check ){
			require( $module->get_path( 'lib/css/config/widgets.php' ) );
			require( $module->get_path( 'lib/css/config/navbars.php' ) );
		}
	}