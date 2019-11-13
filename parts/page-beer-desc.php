	<div class="card rounded-0">
		<div class="card-header">
			<h1><span itemprop="name"><?php the_title(); ?></span></h1>
		</div>
		<div class="card-body">
			<span itemprop="description">
				<?php the_field('description'); ?>
				
			</span>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item bg-beer-card font-weight-bold">ABV: <?php the_field('abv'); ?>%</li>
			<li class="list-group-item bg-beer-card font-weight-bold">Style: <?php the_field('style'); ?></li>
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
			<div class="container bg-beer-card text-center pb-3"><hr />
				<a class="btn btn-lg btn-block btn-blue rounded-0 text-uppercase" href="<?php the_field('untappd_link'); ?>" target="_blank"><i class="fab fa-untappd"></i> Check in on Untappd</a>
			</div>
		</div>
		<div class="container kill-padding text-center">
			<div class="addthis-social pb-2">
				<small class="text-uppercase">Share:</small>
				<div class="addthis_inline_share_toolbox"></div> 
			</div>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) {
				setTimeout(addScript, 1000)
			});
			function addScript() {
				script = document.createElement('script');
				script.async = true;
				script.onload = function() {
					console.log("Addthis script loaded");
				};
				script.src = '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc4a6918644ec08';
				document.getElementsByTagName('head')[0].appendChild(script);
			}
		</script>



				
				
