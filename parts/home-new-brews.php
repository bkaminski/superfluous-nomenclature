	<div class="new-release">
		<div class="container-fluid new-fade">
			<!-- CPT loop -->
			<?php $loop = new WP_Query( array( 'post_type' => 'beers', 'posts_per_page' => 1 ));?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-md-12">
				<h3 class="text-center pt-4 pb-4 text-uppercase">New at Wilmington Brew Works</h3>
			</div>
			<div class="card-deck pb-3">
				<div class="col-lg-5 card rounded-0">
					<div class="card-body">
						<h4 class="card-title text-center"><?php the_title(); ?></h4>
						<?php the_post_thumbnail( 'medium', array( 'class' => 'img-thumbnail aligncenter mt-4 shadow' ) ); ?>

					</div>
				</div>
				<div class="col-lg-7 card rounded-0">
					<div class="card-header">
						<h4 class="card-title text-center">About <?php the_title(); ?></h4>
					</div>
					<div class="card-body">
						
						<?php the_excerpt(); ?>
						
					</div>
					<div class="card-footer text-center"><?php echo get_the_date(); ?></div>
				</div>
			</div>
			<!-- do stuff -->
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
