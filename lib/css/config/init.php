<?php

	require( $script->get_parent()->get_path( 'lib/css/config/general.php' ) );

	if( $script->get_parent()->get_root()->get_module( 'sv_sidebar' ) ){
		$check = false;
		$sidebar = $script->get_parent()->get_root()->get_module( 'sv_sidebar' );
		for($i = 1; $i < 6 ;$i++){
			$check = $sidebar->load( array( 'id' => $script->get_parent()->get_module_name().'_1' ) ) ? true : false;
		}

		if( $check ){
			require( $script->get_parent()->get_path( 'lib/css/config/widgets.php' ) );
			require( $script->get_parent()->get_path( 'lib/css/config/navbars.php' ) );
		}
	}

