<?php get_header(); ?>
<div class="page-header">
	<div class="container-fluid">
		<div class="col-md-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="display-3 text-center pg-title text-uppercase"><?php the_title(); ?></h1>

		</div>
	</div>
</div>
<div class="container">
	<main class="main-content-area pb-3 pt-3">
		<?php the_content(); ?>
				
	</main>
	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
		<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
				
	</div>
</div>
	<?php if( ! is_page( array ('contact', 'events') ) ) {
		get_template_part( 'parts/page', 'contact-us' );
	}?>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>
