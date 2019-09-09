<?php
	if ( $this->has_footer_content() ) {
		include( $this->get_path( 'lib/frontend/tpl/sidebar.php' ) );
	}
	
	include( $this->get_path('lib/frontend/tpl/credits.php') );