<?php get_header(); ?>
<?php $events = eme_wordpress_search_events(); ?>
<?php if ( have_posts() || !empty($events) ) : ?>
<div class="container">
	<div class="alert alert-blue mt-3 shadow">
		<h4 class="text-uppercase text-center pt-2">
			<?php printf( __( 'Search Results for: "%s"', 'superfluous-nomenclature' ), get_search_query() ); ?>

		</h4>
	</div>
	<?php foreach ($events as $event) {
		print "<h1 class='tag-link mb-2'><a href='".eme_event_url($event)."'>".$event['event_name']."</a></h1>";
		print "".$event['event_start_date']."<br /><br />";
		print substr($event['event_notes'],0,250)."[...]<br />";
		print "<a class='btn btn-blue btn-lg mt-4 pr-4 pl-4 rounded-0 text-uppercase' href='".eme_event_url($event)."'>Read More<i class='fas fa-angle-double-right fa-fw fa-lg'></i></a>";
		print "<hr />";
	} ?>
</div>
<div class="container">
	<div class="row mt-5">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-md-12 mb-4">
				<main>
					<h1 class="tag-link mb-5">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php 
							$value = get_field( "name" );
							if( $value ) {
								echo $value;
							} else {
								the_title();
							}?>
								
						</a>
					</h1>
					<?php search_excerpt_highlight(); ?>

					<hr>
				</main>
			</div>
		<?php endwhile; else : ?>
			<div class="col alert alert-blue text-center font-weight-bold">
				<?php esc_html_e( 'Sorry, we could not find what you were searching for, please try again.' ); ?>
					
			</div>
		<?php endif; ?>
	</div>
	<div class="col">
		<?php echo wbwbeer_pagination(); ?>
			
	</div>
</div>
<?php get_footer(); ?>
