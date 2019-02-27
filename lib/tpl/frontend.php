<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="<?php echo $this->get_prefix( 'main_bar' ); ?> sv_common_container">
		<?php
		echo do_shortcode( '[sv_sidebar template = "footer_left"]' );
		echo do_shortcode( '[sv_sidebar template = "footer_center"]' );
		echo do_shortcode( '[sv_sidebar template = "footer_right"]' );
		?>
	</div>
	<div class="<?php echo $this->get_prefix( 'theme_bar' ); ?> sv_common_container">
		<div class="<?php echo $this->get_prefix( 'theme_info' ); ?>">
			<a href="https://straightvisions.com/de/">
				<img src="https://media-straightvisions.com/2018/02/logo.svg" alt="straightvisions Logos">
			</a>
			<span>straightvisions 100-Theme - developed by <a href="https://straightvisions.com/de/">straightvisions</a></span>
		</div>
		<div class="<?php echo $this->get_prefix( 'theme_links' ); ?>"></div>
	</div>
</footer>