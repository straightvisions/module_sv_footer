<footer>
	<div class="container-fluid gradient-black font-size-sm">
		<div class="container padding-v-lg text-grey">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
					<?php if (is_active_sidebar($this->get_module_name())){ ?>
						<div id="footer_widgets" class="widget-area">
							<ul>
								<?php dynamic_sidebar($this->get_module_name()); ?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</footer>