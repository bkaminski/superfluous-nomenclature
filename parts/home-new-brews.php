	<div class="new-release">
		<div class="container-fluid new-fade">
			<?php $loop = new WP_Query( array( 'post_type' => 'beers', 'posts_per_page' => 1 ));?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-md-12">
				<h3 class="text-center pt-4 pb-4 text-uppercase">New at Wilmington Brew Works</h3>
			</div>
			<div class="card-deck pb-3">
				<div class="card rounded-0 kill-padding img-card shadow">
					<div class="card-header img-header-card">
						<h4 class="text-center pt-1 h2 text-uppercase"><?php the_title(); ?></h4>
					</div>
					<div class="card-body">
						<?php the_post_thumbnail( 'medium', array( 'class' => 'img-thumbnail aligncenter mt-2 shadow' ) ); ?>

					</div>
				</div>
				<div class="card rounded-0 kill-padding shadow wbw-about-beer-bg">
					<div class="card-header">
						<h4 class="text-center pt-1 h2 text-uppercase">About <?php the_title(); ?></h4>
					</div>
						<div class="card-body wbw-beer-bg">
							<?php the_excerpt(); ?>
								
						</div>
					<div class="card-footer text-center kill-padding v-waves-bg">Posted on: <?php echo get_the_date(); ?></div>
				</div>
			</div>
			<!-- do stuff -->
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
