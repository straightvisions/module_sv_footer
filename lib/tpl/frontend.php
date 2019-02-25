<footer class="<?php echo $this->get_module_name(); ?>">
	<div class="sv_container">
		<div class="sv_section_wrapper">
			<section>
				<?php echo do_shortcode( '[sv_sidebar template = "footer_left"]' ); ?>
			</section>
			<section>
				<?php echo do_shortcode( '[sv_sidebar template = "footer_center"]' ); ?>
			</section>
			<section>
				<?php echo do_shortcode( '[sv_sidebar template = "footer_right"]' ); ?>
			</section>
		</div>
	</div>

	<div class="sv_copyright">
		<div class="sv_container">
			© 2018 Copyright:
			<a href="https://straightvisions.com">straightvisions.com</a>
		</div>
	</div>
</footer>