<?php
/**
* Template Name: Cornhole League
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
<div class="page-header">
	<h1 class="display-3 text-center pg-title text-uppercase">Cornhole League</h1>
</div>
<div class="container">
	<main class="main-content-area pt-3 pb-3" style="margin-top:0px;">
		<figure class="pb-3">
			<?php the_post_thumbnail( 'full', array( 'class' => 'aligncenter shadow mb-3 img-fluid aboutwbw mt-0' ) ); ?>
				
			</figure>
			<?php the_content(); ?>
			<br />
		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array(
			'posts_per_page' => 10,
			'post_type' => 'cornhole-league',
			'paged' => $paged,
		);

		$loop = new WP_Query( $args ); 
		if ($loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<div class="row">
				<div class="col-md-12">

					<h2><?php the_title(); ?></h2>
					<small>Posted on: <?php echo get_the_date(); ?></small>
					<?php the_excerpt(); ?>

				</div>
			</div>
			<hr />

		<?php endwhile;
		$total_pages = $loop->max_num_pages; 
		if ($total_pages > 1){
			$current_page = max(1, get_query_var('paged'));
			echo paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => '/page/%#%',
				'current' => $current_page,
				'total' => $total_pages,
				'prev_text'    => __('« prev'),
				'next_text'    => __('next »'),
			));
		}}
		wp_reset_postdata(); ?>

	</main>
	<div class="col-md-12 pt-3 pb-3 beer-tags shadow">
			<?php the_tags('<span class="badge badge-secondary"><i class="fas fa-tags"></i> Related:</span>  ', ', '); ?>
				
		</div>
</div>
	
<?php get_footer(); ?>
