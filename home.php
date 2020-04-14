<?php get_header(); ?>
<div class="page-header">
	<div class="container-fluid">
		<div class="col-md-12">
			
				<h1 class="display-3 text-center pg-title text-uppercase">News</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-5">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-md-12 mb-4">
			<section>
				<h1 class="tag-link text-uppercase">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
							
					</a>
				</h1>
				<small>Posted on: <?php echo get_the_date(); ?></small>
					<?php the_excerpt(); ?>
				
				<hr>
			</section>
		</div>
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<div class="col">
			<?php echo wbwbeer_pagination(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
