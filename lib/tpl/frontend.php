<footer class="<?php echo $this->get_prefix(); ?>">
	<div class="sv_common_container">
		<div class="<?php echo $this->get_prefix( 'widgets_bar' ); ?> ">
			<?php
			echo do_shortcode( '[sv_sidebar template = "footer_left"]' );
			echo do_shortcode( '[sv_sidebar template = "footer_center"]' );
			echo do_shortcode( '[sv_sidebar template = "footer_right"]' );
			?>
		</div>
		<div class="<?php echo $this->get_prefix( 'theme_bar' ); ?>">
			<div class="<?php echo $this->get_prefix( 'theme_branding' ); ?>">
				<a href="https://straightvisions.com/de/">
					<img src="https://media-straightvisions.com/2018/02/logo.svg" alt="straightvisions Logos">
				</a>
			</div>
			<div class="<?php echo $this->get_prefix( 'theme_info' ); ?>">
				<span>straightvisions 100-Theme - developed by <a href="https://straightvisions.com/de/">straightvisions</a></span>
			</div>
			<div class="<?php echo $this->get_prefix( 'theme_links' ); ?>">
				<a href="">Link 1</a>
				<a href="">Link 2</a>
				<a href="">Link 3</a>
				<a href="">Link 4</a>
			</div>
		</div>
	</div>
</footer>