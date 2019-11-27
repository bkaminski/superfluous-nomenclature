<?php
/**
* Template Name: Main Beers Page
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
<div class="page-header">
	<h1 class="display-3 text-center"><?php the_title(); ?></h1>
</div>
<div class="container">
	<main class="main-content-area pt-3">
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array(
			'post_type' => 'wbwbeers',
			'paged' => $paged,
		);

		$loop = new WP_Query( $args ); 
		if ($loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<div class="row">
				<div class="col-md-3">
					<a href="<?php the_permalink(); ?>">
						<figure>
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-thumbnail aligncenter mt-2 shadow' ) ); ?>
						
						</figure>
					</a>
				</div>
				<div class="col-md-9">
					<h2><?php the_title(); ?></h2>
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
</div>

<?php get_footer(); ?>
