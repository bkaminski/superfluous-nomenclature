<?php
/*
 * Template Name: WBW BEERS
 * Template Post Type: post, page, product
 */
  
get_header();  ?>
<div class="beer-header pt-3 pb-3">
	<figure id="cmb2Image" class="text-center">
		<?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), 'beer_logo_image_id', 1 )); ?>
			
	</figure>
</div>
<div class="container pt-5 beer-container">
	<div class="row">
		<div class="col-md-6">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail( 'medium', array( 'class' => 'mx-auto d-block img-fluid shadow mb-3' ) ); ?>
					
		</div>
		<div class="col-md-6">
			<div class="card rounded-0">
				<div class="card-header">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="card-body">
					<?php the_content(); ?>
						
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item bg-beer-card">ABV: <?php $text = get_post_meta( get_the_ID(), 'beer_abv', true ); echo esc_html( $text ); ?>%</li>
					<li class="list-group-item bg-beer-card">Style: <?php $text1 = get_post_meta( get_the_ID(), 'beer_style', true ); echo esc_html( $text1 ); ?></li>
					<li class="list-group-item bg-beer-card rounded-0">Easily Enjoyed</li>
				</ul>
			</div>
			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<br />
	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
		<?php the_tags('Related: '); ?>
			
	</div>
</div>
<?php get_footer(); ?>
