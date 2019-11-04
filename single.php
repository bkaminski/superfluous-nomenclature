<?php get_header(); ?>
<div class="container pt-3">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<?php the_post_thumbnail( 'medium', array( 'class' => 'mx-auto d-block' ) ); ?>

		<?php the_content(); ?>
		
		<p>ABV: <?php $text = get_post_meta( get_the_ID(), '_beer_abv', true ); echo esc_html( $text ); ?>%</p>

		<p>Style: <?php $select_value = get_post_meta( get_the_ID(), 'beer_style', true ); echo ( $select_value ); ?></p>

		<?php the_tags(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	
</div>
<?php get_footer(); ?>
