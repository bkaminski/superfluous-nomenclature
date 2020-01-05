<nav class="navbar navbar-expand-lg fixed-top wbw-navbar-solid shadow">
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
		<?php $uploads = wp_upload_dir(); 
		echo '<img src="' . esc_url( $uploads['baseurl'] . '/2019/12/wbw-navbar-logo.svg' ) . '" width="133" alt="Wilmington Brew Works Logo">'; ?>
	</a>
	<button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#wbwbeerNav" aria-controls="wbwbeerNav" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars fa-2x"></i>
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
