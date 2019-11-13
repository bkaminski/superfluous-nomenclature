<?php
/*
 * Template Name: URBAN ORCHARD WORKS
 * Template Post Type: urban-orchard-ciders
 */
  
get_header();  ?>
<?php get_template_part( 'parts/page', 'cider-header' ); ?>
<div class="container pt-5 cider-container">
	<div class="row">
		<div class="col-md-6">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'parts/page', 'cider-feat-img'); ?>
					
		</div>
		<div class="col-md-6">
			
			<?php get_template_part( 'parts/page', 'cider-desc'); ?>
				
				<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
		
		</div>
	</div>
	<br />
	<div class="col-md-12 pt-3 pb-3 cider-tags shadow">
		
		<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
			
	</div>
</div>
<?php get_footer(); ?>
