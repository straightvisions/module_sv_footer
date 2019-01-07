<footer class="<?php echo $this->get_module_name(); ?> bg-dark text-center text-md-left">
	<!-- Footer Links -->
	<div class="container text-white py-5">
		<div class="row">
			<section class="left col-12 col-md-4">
				<?php echo do_shortcode( '[sv_sidebar template = "footer_left"]' ); ?>
			</section>
			<section class="center col-12 col-md-4">
				<?php echo do_shortcode( '[sv_sidebar template = "footer_center"]' ); ?>
			</section>
			<section class="right col-12 col-md-4">
				<?php echo do_shortcode( '[sv_sidebar template = "footer_right"]' ); ?>
			</section>
		</div>
	</div>

	<!-- Copyright -->
	<div class="copyright container-fluid text-center text-white-50 py-3">
		© 2018 Copyright:
		<a href="https://straightvisions.com">straightvisions.com</a>
	</div>
</footer>