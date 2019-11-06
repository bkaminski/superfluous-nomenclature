	<div class="card rounded-0">
		<div class="card-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="card-body">
			<?php the_content(); ?>
				
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item bg-beer-card">ABV: <?php $text = get_post_meta( get_the_ID(), 'beer_abv', true ); echo esc_html( $text ); ?>%</li>
			<li class="list-group-item bg-beer-card">Style: <?php $text1 = get_post_meta( get_the_ID(), 'beer_style', true ); echo esc_html( $text1 ); ?></li>
			<li class="list-group-item bg-beer-card rounded-0">Easily Enjoyed</li>
		</ul>
	</div>
