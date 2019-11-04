<?php
/*
 * Template Name: WBW BEERS
 * Template Post Type: post, page, product
 */
  
get_header();  ?>
<div class="container pt-5 beer-container">
	<div class="row">
		<div class="col-md-6">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail( 'medium', array( 'class' => 'mx-auto d-block img-fluid shadow' ) ); ?>

		</div>
		<div class="col-md-6">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

			<p>ABV: <?php $text = get_post_meta( get_the_ID(), '_beer_abv', true ); echo esc_html( $text ); ?>%</p>
			<p>Style: <?php $text1 = get_post_meta( get_the_ID(), 'beer_style', true ); echo esc_html( $text1 ); ?></p>
		</div>
		<div class="col-md-12 pt-3 pb-3">
			<?php the_tags(); ?>
				
		</div>
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
