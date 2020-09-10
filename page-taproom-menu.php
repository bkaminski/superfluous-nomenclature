<?php
/**
* Template Name: Taproom Service Menu
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
<div class="page-header">
	<div class="container-fluid">
		<div class="col-md-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="display-3 text-center pg-title text-uppercase">
					<?php the_title(); ?>
						
				</h1>
		</div>
	</div>
</div>
<div class="container">
	<main class="main-content-area pb-3 pt-3">
		<div class="row">
			<div class="col-md-6">
				<!-- BEER -->
				<h2 class="text-uppercase pb-3 text-center">
					<u><?php the_field('specialty'); ?></u>
						
				</h2>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_1_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_1_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_1_price'); ?>
					</span>
					
				</p>
				
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_2_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_2_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_2_price'); ?>
					</span>
					
				</p>
				
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_3_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_3_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_3_price'); ?>
					</span>
					
				</p>
			
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_4_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_4_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_4_price'); ?>
					</span>
					
				</p>
			
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_5_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_5_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_5_price'); ?>
					</span>
					
				</p>
		
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_6_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_6_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_6_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('specialty_item_7_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('specialty_item_7_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('specialty_item_7_price'); ?>
					</span>
					
				</p>
				<!-- WINE -->
				<h2 class="text-uppercase pb-3 text-center">
					<u><?php the_field('wine_offerings'); ?></u>
						
				</h2>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('wine_1_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('wine_1_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('wine_1_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('wine_2_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('wine_2_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('wine_2_price'); ?>
					</span>
					
				</p>
				<!-- Non Alcoholic -->
				<h2 class="text-uppercase pb-3 text-center">
					<u><?php the_field('non_alcoholic'); ?></u>
						
				</h2>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('na_1_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('na_1_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('na_1_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('na_2_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('na_2_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('na_2_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('na_3_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('na_3_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('na_3_price'); ?>
					</span>
					
				</p>
			</div>
			<div class="col-md-6">
				<!-- Snacks -->
				<h2 class="text-uppercase pb-3 text-center">
					<u><?php the_field('snacks'); ?></u>
						
				</h2>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_1_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_1_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_1_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_2_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_2_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_2_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_3_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_3_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_3_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_4_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_4_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_4_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_5_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_5_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_5_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_6_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_6_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_6_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_7_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_7_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_7_price'); ?>
					</span>
					
				</p>
				<p class="h5 text-uppercase font-weight-bold">
					<?php the_field('snack_8_name'); ?>
						
				</p>
				<p class="pb-3">
					<?php the_field('snack_8_desc'); ?>
					<span class="float-right font-weight-bold">
						<?php the_field('snack_8_price'); ?>
					</span>
					
				</p>
			</div>
		</div>		
	</main>
	<div class="col-md-12 kill-padding">
		<?php the_content(); ?>
	</div>
	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
		<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
				
	</div>
</div>
	<?php if( ! is_page( array ('contact', 'events') ) ) {
		get_template_part( 'parts/page', 'contact-us' );
	}?>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>