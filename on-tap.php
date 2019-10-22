<?php
/**
 * Template Name: On Tap Template
 *
 * @package WordPress
 * @subpackage Superlous Nomenclature
 * 
 */
get_header(); ?>
<main>
	<div class="on-tap pb-5">
		<div class="container-fluid">
			<h1 class="pl-3 text-uppercase"><?php the_title(); ?></h1>
			<div class="col-md-12">
				<div class="embed-responsive embed-responsive-16by9">
	  				<iframe class="embed-responsive-item" src="https://wilmington-brew-works.firebaseapp.com/#/active_digital_menu"></iframe>
				</div>
			</div>
			<div class="col-md-12 pt-3">
				<?php the_content(); ?>
				
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>