<?php get_header(); ?>
<div class="page-header">
	<div class="container-fluid">
		<div class="col-md-12">
			<h1 class="display-3 text-center pg-title text-uppercase">Shop</h1>
		</div>
	</div>
</div>
<div class="container">
	<main class="main-content-area pb-3 pt-3">
		
		<?php woocommerce_content(); ?>
		
	
			
	</main>
	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
		<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
			
	</div>
</div>
<?php get_footer(); ?>
