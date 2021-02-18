 <?php
    for($i = 1; $i < 6; $i++){
        echo $this->get_module( 'sv_sidebar' )
            ? $this->get_module( 'sv_sidebar' )->load( $this->get_prefix($i) )
            : '';
    }
