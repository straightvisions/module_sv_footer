 <?php
    for($i = 1; $i < 6; $i++){
        echo $this->get_module( 'sv_sidebar' )
            ? $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_'. $i ) )
            : '';
    }
