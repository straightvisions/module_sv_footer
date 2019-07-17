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
<?php } ?>

<div class="<?php echo $this->get_prefix( 'credits' ); ?>">
	<div class="<?php echo $this->get_prefix( 'credits_info' ); ?>">
		<?php
			echo '<span>' . __( 'Theme by', 'sv100' ) . '</span>';
			echo '<a href="'.wp_get_theme()->display( 'AuthorURI' ).'" rel="nofollow" target="_blank">'.strip_tags(wp_get_theme()->display( 'Author' )).'</a>';
		?>
	</div>
</div>