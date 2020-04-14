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
	<section class="main-content-area pb-3 pt-3">
		<figure class="pb-2">
			<?php the_post_thumbnail( 'full', array( 'class' => 'aligncenter shadow mb-3 img-fluid aboutwbw mt-0' ) ); ?>
				
			</figure>
			<small>Posted on: <?php echo get_the_date(); ?></small>
			<br />
			<small class="text-uppercase">Share:</small>
				<div class="addthis_inline_share_toolbox"></div> 
		<?php the_content(); ?>
				
	</section>
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
<?php get_footer(); ?>
