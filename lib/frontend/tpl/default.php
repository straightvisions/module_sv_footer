<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="sv_common_container">
		<div class="<?php echo $this->get_prefix( 'widgets_bar' ); ?> ">
			<?php
			echo do_shortcode( '[sv_sidebar id = "' . $this->get_module_name() . '_left"]' );
			echo do_shortcode( '[sv_sidebar id = "' . $this->get_module_name() . '_center"]' );
			echo do_shortcode( '[sv_sidebar id = "' . $this->get_module_name() . '_right"]' );
			?>
		</div>
	</div>
</footer>