	<div class="card rounded-0">
		<div class="card-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="card-body">
			<?php the_content(); ?>
				
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item bg-beer-card">ABV: <?php $text = get_post_meta( get_the_ID(), 'cider_abv', true ); echo esc_html( $text ); ?>%</li>
			<li class="list-group-item bg-beer-card">Style: <?php $text1 = get_post_meta( get_the_ID(), 'cider_style', true ); echo esc_html( $text1 ); ?></li>
			<li class="list-group-item bg-beer-card" style="margin-bottom: -25px;"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col bg-beer-card pt-2 pb-2">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/Easily-Enjoyed-01-01.svg' ) . '" height="150" width="150" alt="Easily Enjoyed">'; ?>
				</div>
				<div class="col bg-beer-card pt-2 pb-2">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/Urban-Orchard-Works-01.svg' ) . '" height="150" width="150" alt="Urban Orchard Works">'; ?>
				</div>
				<div class="col bg-beer-card pt-2 pb-2">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/Playfully-Pretentious-01.svg' ) . '" height="150" width="150" alt="Playfully Pretentious">'; ?>
				</div>
			</div>
		</div>
		<div class="container bg-beer-card text-center pb-2"><hr />
			<small class="text-uppercase">Share:</small>
			<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_shjo"]'); ?>

		</div>
	</div>
