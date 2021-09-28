<?php
	for($i = 1; $i < 6; $i++) {
		if ($this->get_module('sv_sidebar')->load($this->get_setting('sidebar_' . $i)->get_data())) {
?>
	<div class="sv100_sv_sidebar_sv_footer_<?php echo $i; ?>"><?php echo $this->get_module('sv_sidebar')->load($this->get_setting('sidebar_' . $i)->get_data()); ?></div>
<?php
		}
	}