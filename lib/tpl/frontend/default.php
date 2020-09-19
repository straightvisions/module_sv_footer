<div class="<?php echo $this->get_prefix('wrapper'); ?>">
    <?php if ( $this->has_footer_content() ) { ?>
    <footer class="<?php echo $this->get_prefix(); ?>">
        <div class="<?php echo $this->get_prefix('bar'); ?>">
			<?php include( $this->get_path( 'lib/tpl/frontend/sidebar.php' ) ); ?>
        </div>
    </footer>
	<?php
    }
	    echo $this->get_module( 'sv_footer_copyright' ) ? $this->get_module( 'sv_footer_copyright' )->load() : '';
	    include( $this->get_path('lib/tpl/frontend/credits.php') );
	?>
</div>