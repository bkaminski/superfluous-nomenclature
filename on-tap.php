<?php
/**
 * Template Name: On Tap Template
 *
 * @package WordPress
 * @subpackage Superlous Nomenclature
 * 
 */
get_header(); ?>
<div class="page-header">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="display-3 text-center pg-title text-uppercase"><?php the_title(); ?></h1>

</div>
<main>
	<div class="on-tap pb-5">
		<div class="container-fluid">
			<h4 class="text-center">Currently On Tap:</h4>
			<div class="col-md-12">
				<div id="wbwFrame" class="embed-responsive">
					<iframe class="embed-responsive-item" src="https://wilmington-brew-works.firebaseapp.com/#/active_digital_menu"></iframe>
				</div>
			</div>
			<div class="col-md-12 pt-5 text-center">
				<?php the_content(); ?>
							
			</div>
		</div>
	</div>
	<?php if( ! is_page( array ('contact') ) ) {
		get_template_part( 'parts/page', 'contact-us' );
	}?>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
