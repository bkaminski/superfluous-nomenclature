<?php get_header(); ?>
<header>
	<?php get_template_part( 'parts/home', 'hero' ); ?>

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
