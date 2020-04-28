<div class="<?php echo $this->get_prefix('wrapper'); ?>">
    <footer class="<?php echo $this->get_prefix(); ?>">
        <div class="<?php echo $this->get_prefix('bar'); ?>">
    <?php
        if ( $this->has_footer_content() ) {
            include( $this->get_path( 'lib/frontend/tpl/sidebar.php' ) );
        }

        ?>
        </div>
    </footer>
	<?php
	    include( $this->get_path('lib/frontend/tpl/credits.php') );
	?>
</div>