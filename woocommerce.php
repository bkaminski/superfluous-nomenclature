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

		<div class="col text-center shop-button">
			<a href="/store/merchandise/" class="btn btn-lg btn-blue rounded-0"><i class="fas fa-shopping-basket"></i> View Merchandise Shop</a>
		</div>
	</main>
</div>
<?php get_footer(); ?>
