<?php get_header(); ?>
	<div class="page-header">
		<div class="header-img-left"></div>
		<div class="header-img-right"></div>
		<div class="container-fluid">
			<div class="col-md-12">
				<h1 class="display-3 text-center pg-title text-uppercase"><?php _e( '404: Page Not Found', 'superfluous-nomenclature' ); ?></h1>
			</div>
		</div>
	</div>
	<div class="container">
		<main class="main-content-area pt-3">
			<div class="container main-content pt-5">
				<h2><?php _e( '<div class="alert alert-blue h1">404 - Page Not Found</div><br />Oops, something went wrong!', 'superfluous-nomenclature' ); ?>
					
				</h2>
				<p><?php _e( 'The page you are looking for has either been moved, deleted, or come across by user error. Please choose an option from the above menu.', 'superfluous-nomenclature' ); ?>
					
				</p>
			</div>
		</main>
	</div>
<?php get_footer(); ?>
