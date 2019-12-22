	<div class="new-release">
		<div class="container-fluid new-fade">
			<?php $loop = new WP_Query( array( 'post_type' => 'wbwbeers', 'posts_per_page' => 1 ));?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-md-12">
				<h3 class="text-center pt-4 pb-4 text-uppercase">New Brews and Events</h3>
			</div>
			<div class="card-deck">
				<div class="card rounded-0 kill-padding img-card shadow mb-3">
					<div class="card-header img-header-card">
						<h4 class="text-center pt-1 h2 text-uppercase">New Release:</h4>
					</div>
					<div class="card-body">
						<h3 class="text-center"><?php the_field('name'); ?></h3>
							<div class="row">
								<div class="col-md-6">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium', array( 'class' => 'img-thumbnail aligncenter mt-2 shadow' ) ); ?>
										
									</a>
								</div>
								<div class="col-md-6">
									<?php the_field('description'); ?>

									<br />
									<a href="<?php the_permalink(); ?>" class="btn btn-blue rounded-0 mt-3 pl-5 pr-5">More Info <i class="fas fa-angle-double-right fa-fw"></i></a>
								</div>
							</div>
					</div>
				</div>
				<div class="card rounded-0 kill-padding shadow wbw-about-beer-bg mb-3">
					<div class="card-header">
						<h4 class="text-center pt-1 h2 text-uppercase">Upcoming Events:</h4>
					</div>
					<?php echo do_shortcode('[eme_events limit=4]'); ?>

				</div>
			</div>
			<?php endwhile; wp_reset_query(); ?>
		
		</div>
	</div>
