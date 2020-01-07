<?php
/**
* Template Name: Our Team Page
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
<div class="page-header">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="display-3 text-center pg-title text-uppercase"><?php the_title(); ?></h1>
</div>
<div class="container">
	<div class="main-content-area pb-3">
		<h2 class="text-center pt-3">Ownership Team:</h2>
		<div class="card-deck mt-3 mb-3">
			<div class="card">
				<?php 
				$image = get_field('craig_image');
				if( !empty($image) ): ?>
				
				<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Craig Wensell">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Craig Wensell<br />Chief Executive Officer and Master Brewer</h5>
					<p class="card-text small">
						<?php the_field('craig_bio'); ?>
						
					</p>
				</div>
			</div>
			<div class="card">
				<?php 
				$image = get_field('keith_image');
				if( !empty($image) ): ?>
				
				<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Keith Hughes">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Keith Hughes<br /> CFO and Chief Operating Officer</h5>
					<p class="card-text small">
						<?php the_field('keith_bio'); ?>
						
					</p>
				</div>
			</div>
			<div class="card">
				<?php 
				$image = get_field('john_image');
				if( !empty($image) ): ?>
				
				<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="John Fusco">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">John Fusco<br /> VP of Marketing and Brand Management</h5>
					<p class="card-text small">
						<?php the_field('john_bio'); ?>
						
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<div class="card">
				<?php 
				$image = get_field('dan_image');
				if( !empty($image) ): ?>
				
				<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Dan Yopp">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Dan 'Beerman' Yopp<br /> Partner</h5>
					<p class="card-text small">
						<?php the_field('dan_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card">
				<?php 
				$image = get_field('derek_image');
				if( !empty($image) ): ?>
				
				<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Derek Berkeley">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Derek Berkeley<br /> Facilities Maintenance</h5>
					<p class="card-text small">
						<?php the_field('derek_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<hr>
		<h2 class="text-center pt-3">Staff:</h2>
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
