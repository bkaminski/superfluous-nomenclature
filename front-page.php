<?php get_header(); ?>
<header>
	<div class="wbw-home-head1">
		<div id="homeHero" class="wbw-home-head2">
			<div class="container text-center">

				<?php $uploads = wp_upload_dir(); echo '<img class="img-fluid logo-img" src="' . esc_url( $uploads['baseurl'] . '/2020/01/wbw-diamond-gold.svg' ) . '" height="500" width="500" alt="Wilmington Brew Works Logo" />' ;?>
			</div>
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
	<?php get_template_part( 'parts/home', 'video' ); ?>

</aside>

<?php get_template_part( 'parts/home', 'modal' ); ?>

<?php get_footer(); ?>
