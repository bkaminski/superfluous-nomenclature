	<div class="card rounded-0">
		<div class="card-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="card-body">
			<?php the_content(); ?>
				
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item bg-beer-card font-weight-bold">ABV: <?php $text = get_post_meta( get_the_ID(), 'beer_abv', true ); echo esc_html( $text ); ?>%</li>
			<li class="list-group-item bg-beer-card font-weight-bold">Style: <?php $text1 = get_post_meta( get_the_ID(), 'beer_style', true ); echo esc_html( $text1 ); ?></li>
			<li class="list-group-item bg-beer-card" style="margin-bottom: -25px;"></li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col bg-beer-card">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/Easily-Enjoyed-01-01.svg' ) . '" height="150" width="150" alt="Easily Enjoyed">'; ?>
				</div>
				<div class="col bg-beer-card">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/WBW-W-Diamond1-01.svg' ) . '" height="150" width="150" alt="WBWBEER">'; ?>
				</div>
				<div class="col bg-beer-card">
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
	<div class="container kill-padding">
		<div class="untappd">
			<a class="btn btn-lg btn-block btn-blue rounded-0 text-uppercase" href=" <?php $text2 = get_post_meta( get_the_ID(), 'untappd_url', true ); echo esc_html( $text2 ); ?>" target="_blank"><i class="fab fa-untappd"></i> Check in on Untappd</a>
		</div>
	</div>



				
				
