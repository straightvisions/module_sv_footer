<div class="sv_setting_subpage">
    <h2><?php _e('Sidebar', 'sv100'); ?></h2>
	<?php
	// Sidebars - Alignment Settings
	$i = 0;
	
	echo '<h3 class="divider">' . __( 'Sidebar Alignments', 'sv100' ) . '</h3>';
	
	foreach ( $module->get_module( 'sv_sidebar' )->get_sidebars( $module ) as $sidebar ) {
		echo $i === 0 ? '<div class="sv_setting_flex">' : '';
		
		echo $module->get_setting( $sidebar['id'] )->form();

		$i++;
		
		if ( $i === 3 || $i === $count ) {
			$i = 0;
			
			echo '</div>';
		}
	}
	?>
</div>