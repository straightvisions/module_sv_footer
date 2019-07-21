<?php
	if ( $this->get_module( 'sv_sidebar' )
	&& empty( $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_left' ) ) )
	&& empty( $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_center' ) ) )
	&& empty( $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_right' ) ) )
	) {
		echo '';
	} else {
?>

<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="<?php echo $this->get_prefix( 'widgets_bar' ); ?> ">
		<?php
			echo $this->get_module( 'sv_sidebar' )
				? $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_left' ) )
				: '';
			
			echo $this->get_module( 'sv_sidebar' )
				? $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_center' ) )
				: '';
			
			echo $this->get_module( 'sv_sidebar' )
				? $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_right' ) )
				: '';
		?>
	</div>
</footer>
<?php
	}
	include($this->get_path('lib/frontend/tpl/credits.php'));
?>