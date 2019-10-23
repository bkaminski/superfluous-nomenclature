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
