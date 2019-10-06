<nav class="navbar navbar-expand-lg">
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">WBW LOGO HERE</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wbwbeerNav" aria-controls="wbwbeerNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="wbwbeerNav">
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => '',
			'container_class'   => '',
			'container_id'      => '',
			'menu_class'        => 'navbar-nav ml-auto',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
		)); ?>
		
	</div>
</nav>
