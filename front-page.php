<?php get_header(); ?>
<header>
	<div class="wbw-home-head">
		<div class="container text-center">

			<?php $uploads = wp_upload_dir(); echo '<img class="img-fluid logo-img" src="' . esc_url( $uploads['baseurl'] . '/2019/10/wbw-diamond.svg' ) . '" height="500" width="500" alt="Wilmington Brew Works Logo" />' ;?>
		</div>
	</div>
</header>
<main class="mission shadow">
	<div class="container pt-5 home-about">
		<h1 class="text-center text-uppercase text-white">Wilmington Brew Works</h1>
		<p class="text-center pt-3 pb-4 h5 text-white">Wilmington Brew Works is the first production brewery in Delaware’s largest city since 1955. Housed in a 100-year old former laboratory in the old 9th Ward, we are keeping the spirit of the building’s origins alive with new and innovative Ales, Lagers, Sours and Ciders. Our family-friendly taproom has plenty of indoor and outdoor seating for you to enjoy a drink with friends - old and new. Playfully Pretentious, Easily Enjoyed.</p>
		<br />
		<p class="text-center pb-3"><a href="#" class="btn btn-lg btn-success text-uppercase p-3">Check out our beers!</a></p>
	</div>
</main>
<aside>
	<?php get_template_part( 'parts/home', 'event-carousel' ); ?>

</aside>
<section class="wbw-social">
	<?php get_template_part( 'parts/page', 'social' ); ?>

</section>
<section class="new-release pb-5">
	<?php get_template_part( 'parts/home', 'new-brews' ); ?>
</section>


<?php get_template_part( 'parts/home', 'modal' ); ?>

<?php get_footer(); ?>
