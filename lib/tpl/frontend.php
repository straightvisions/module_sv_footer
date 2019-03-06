<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="sv_common_container">
		<div class="<?php echo $this->get_prefix( 'widgets_bar' ); ?> ">
			<?php
			echo do_shortcode( '[sv_sidebar template = "footer_left"]' );
			echo do_shortcode( '[sv_sidebar template = "footer_center"]' );
			echo do_shortcode( '[sv_sidebar template = "footer_right"]' );
			?>
		</div>
	</div>
</footer>