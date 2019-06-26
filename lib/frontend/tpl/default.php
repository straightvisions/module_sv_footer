<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="<?php echo $this->get_prefix( 'widgets_bar' ); ?> ">
		<?php
			echo $this->get_root()->get_module( 'sv_sidebar' )
				? $this->get_root()->get_module( 'sv_sidebar' )->load( array(
					'id' => $this->get_module_name() . '_left'
				) )
				: '';
			
			echo $this->get_root()->get_module( 'sv_sidebar' )
				? $this->get_root()->get_module( 'sv_sidebar' )->load( array(
					'id' => $this->get_module_name() . '_center'
				) )
				: '';
			
			echo $this->get_root()->get_module( 'sv_sidebar' )
				? $this->get_root()->get_module( 'sv_sidebar' )->load( array(
					'id' => $this->get_module_name() . '_right'
				) )
				: '';
		?>
	</div>
</footer>
<div class="<?php echo $this->get_prefix( 'credits' ); ?>">
	<div class="<?php echo $this->get_prefix( 'credits_info' ); ?>">
		<?php
			echo '<span>' . __( 'Theme developed by', 'straightvisions_100' ) . '</span>';
			echo wp_get_theme()->display( 'Author' );
		?>
	</div>
</div>