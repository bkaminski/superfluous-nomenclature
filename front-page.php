<?php get_header(); ?>
<header>
	<div class="wbw-home-head">
		<div class="container text-center">

			<?php $uploads = wp_upload_dir(); echo '<img class="img-fluid logo-img" src="' . esc_url( $uploads['baseurl'] . '/2019/10/wbw-diamond.svg' ) . '" height="500" width="500" alt="Wilmington Brew Works Logo" />' ;?>
		</div>
	</div>
</header>
<main class="mission">
	<?php get_template_part( 'parts/home', 'about' ); ?>

</main>
<section class="wbw-social">
	<?php get_template_part( 'parts/page', 'social' ); ?>

</section>
<section class="new-release pb-5">
	<?php get_template_part( 'parts/home', 'new-brews-events' ); ?>
</section>
<aside class="video pt-3">
	<h3 class="text-center pb-2">Welcome to Wilmington Brew Works</h3>
	<div class="container-fluid kill-padding">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/T5TW5XNeVYU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</aside>

<?php get_template_part( 'parts/home', 'modal' ); ?>

<?php get_footer(); ?>
