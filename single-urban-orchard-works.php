<?php
/*
 * Template Name: Urban Orchard Works Single
 * Template Post Type: urban-orchard-works
 */
  
get_header();  ?>
<div itemscope itemtype="http://schema.org/IndividualProduct" itemid="#product">
	<div class="sr-only" itemprop="brand">Wilmington Brew Works</div>
	<?php get_template_part( 'parts/page', 'cider-header' ); ?>
	<div class="container pt-4 cider-container">
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
		<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
			
			<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
				
		</div>
	</div>
	<?php if( ! is_page( array ('contact') ) ) {
	get_template_part( 'parts/page', 'contact-us' );
}?>	
</div>
<?php get_footer(); ?>
