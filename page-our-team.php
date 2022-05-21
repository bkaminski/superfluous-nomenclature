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
					<?php $image = get_field('craig_image'); if( !empty($image) ): ?>
					<figure>
						<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Craig Wensell">
					</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Craig Wensell<br />Chief Executive Officer and Master Brewer</h5>
					<p class="card-text small">
						<?php the_field('craig_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<?php $image = get_field('keith_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Keith Hughes">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Keith Hughes<br /> CFO and Chief Operating Officer</h5>
					<p class="card-text small">
						<?php the_field('keith_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<?php $image = get_field('john_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="John Fusco">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">John Fusco<br /> VP Creative &amp; Brand Marketing</h5>
					<p class="card-text small">
						<?php the_field('john_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<?php $image = get_field('dan_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Dan Yopp">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Dan 'Beerman' Yopp<br /> Partner</h5>
					<p class="card-text small">
						<?php the_field('dan_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<?php $image = get_field('derek_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Derek Berkeley">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Derek Berkeley<br /> Facilities and Maintenance Manager</h5>
					<p class="card-text small">
						<?php the_field('derek_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<hr>
		<h2 class="text-center pt-3">Staff:</h2>
		<div class="card-deck">
			<div class="card mb-3">
				<?php $image = get_field('jen_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Jennifer Hughes">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Jennifer Hughes<br /> Director of Administration</h5>
					<p class="card-text small">
						<?php the_field('jen_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<?php $image = get_field('ryan_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Ryan Rice">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Ryan Rice<br /> Production Assistant and Draught Technician</h5>
					<p class="card-text small">
						<?php the_field('ryan_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<?php if( get_field('senior_shift_1_name') ): ?>
			<div class="card mb-3">
				<?php $image = get_field('senior_shift_1'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="<?php echo the_field('senior_shift_1_name');?>">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold"><?php echo the_field('senior_shift_1_name'); ?></h5>
					<p class="card-text small">
						<?php the_field('senior_shift_1_bio'); ?>
							
					</p>
				</div>
			</div>
			<?php endif; ?>
			<?php if( get_field('senior_shift_2_name') ): ?>
			<div class="card mb-3">
				<?php $image = get_field('senior_shift_2'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="<?php echo the_field('senior_shift_2_name'); ?>">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold"><?php echo the_field('senior_shift_2_name'); ?></h5>
					<p class="card-text small">
						<?php the_field('senior_shift_2_bio'); ?>
							
					</p>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="card-deck">
			<?php if( get_field('senior_shift_3_name') ): ?>
			<div class="card mb-3">
				<?php $image = get_field('senior_shift_3'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="<?php echo the_field('senior_shift_3_name');?>">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold"><?php echo the_field('senior_shift_3_name'); ?></h5>
					<p class="card-text small">
						<?php the_field('senior_shift_3_bio'); ?>
							
					</p>
				</div>
			</div>
			<?php endif; ?>
			<?php if( get_field('senior_shift_4_name') ): ?>
			<div class="card mb-3">
				<?php $image = get_field('senior_shift_4'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="<?php echo the_field('senior_shift_4_name'); ?>">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold"><?php echo the_field('senior_shift_4_name'); ?></h5>
					<p class="card-text small">
						<?php the_field('senior_shift_4_bio'); ?>
							
					</p>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<?php $image = get_field('ben_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Ben Kaminski">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Ben Kaminski<br /> WordPress Development</h5>
					<p class="card-text small">
						<?php the_field('ben_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<?php $image = get_field('jeff_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Jeff Kempista">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Jeff Kempista<br /> App Development</h5>
					<p class="card-text small">
						<?php the_field('jeff_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<div class="card mb-3">
				<?php $image = get_field('laura_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Laura McDonald">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Laura McDonald<br /> Photographer</h5>
					<p class="card-text small">
						<?php the_field('laura_bio'); ?>
							
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<?php $image = get_field('lisa_image'); if( !empty($image) ): ?>
				<figure>
					<img src="<?php echo $image['url']; ?>" class="card-img-top about--img" alt="Lisa Fusco">
				</figure>
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Lisa Fusco<br /> Designer</h5>
					<p class="card-text small">
						<?php the_field('lisa_bio'); ?>
							
					</p>
				</div>
			</div>
		</div>
		<br />
		<br />
		<?php the_content(); ?>
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<!-- Employee Loop -->
		<div class="col">
			<h4 class="text-center text-uppercase">Employees</h4>
			<?php $args=array(
				'post_type' => 'employee-section',
				'posts_per_page' => 30,
				'category_name' => 'wbw-employees',
				'orderby' => 'date',
            	'order'   => 'ASC',
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				$i = 0;
				while ($my_query->have_posts()) : $my_query->the_post();
					if($i % 3 == 0) { ?>
						<div class="row">
						<?php } ?>
						<div class="col-lg-4 mb-4">
							<div class="card shadow h-100">
								<?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid aligncenter mt-2 shadow' ) ); ?>
								<div class="card-body p-0">
									<p class="card-title text-center pt-2"><?php the_title(); ?></p>
									<div class="card-text p-3" style="font-size: 1rem;">
										<?php the_content(); ?>
											
									</div>
								</div>
							</div>
						</div>
						<?php $i++; if($i != 0 && $i % 3 == 0) { ?>
						</div>
						<div class="clearfix"></div>
					<?php } ?>
				<?php endwhile; } wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
		<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
			
	</div>
</div>
<?php if( ! is_page( array ('contact', 'events') ) ) {
	get_template_part( 'parts/page', 'contact-us' );
}?>	
<?php get_footer(); ?>
