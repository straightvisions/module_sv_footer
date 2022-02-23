<?php if ($this->get_module('sv_sidebar')->load($this->get_setting('sidebar')->get_data())) { ?>
	<div class="sv100_sv_sidebar_sv_footer"><?php echo $this->get_module('sv_sidebar')->load($this->get_setting('sidebar')->get_data()); ?></div>
<?php
	}