<?php
if ( apply_filters( $this->get_prefix('credits'), true ) ) {
	$text = '<span>'
			. __( 'Theme by', 'sv100' )
			. '</span><a href="' . wp_get_theme()->display( 'AuthorURI' )
			. '" rel="nofollow noopener" target="_blank">'
			. strip_tags( wp_get_theme()->display( 'Author' ))
			. '</a>';
	?>
	<div class="<?php echo $this->get_prefix( 'credits' ); ?>">
		<div class="<?php echo $this->get_prefix( 'credits_info' ); ?>">
			<?php echo apply_filters($this->get_prefix('credits_text'), $text ); ?>
		</div>
	</div>
	<?php
}