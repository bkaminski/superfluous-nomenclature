<?php get_header(); ?>
<header>
	<?php get_template_part( 'parts/home', 'hero' ); ?>

</header>
<main class="mission">
	<?php get_template_part( 'parts/home', 'about' ); ?>

</main>
<div class="container-fluid pt-4">
	<div class="jumbotron text-center rounded-0">
		<h3 class="pb-4"><?php the_field('to_go_information'); ?> 
			<br /><?php the_field('time'); ?></h3>
		<a href="/shop" class="btn btn-blue btn-lg rounded-0 pr-3 pl-3"><i class="fas fa-shopping-cart pr-2"></i>Shop Now</a>
	</div>
</div>
<section class="wbw-social">
	<?php get_template_part( 'parts/page', 'social' ); ?>

</section>
<section class="new-release pb-5">
	<?php get_template_part( 'parts/home', 'new-brews-events' ); ?>
	
</section>
<aside class="video pt-3">
	<?php get_template_part( 'parts/home', 'video' ); ?>

</aside>

<?php get_template_part( 'parts/home', 'modal' ); ?>

<?php get_footer(); ?>
