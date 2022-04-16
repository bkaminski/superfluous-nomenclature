<?php
/**
* Template Name: Superb Sign-up
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
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
		<!-- Begin Mailchimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#f8f9fa; clear:left; font:14px Helvetica,Arial,sans-serif; }
			/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
			We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
			<form action="https://wilmingtonbrewworks.us18.list-manage.com/subscribe/post?u=075d739ef93b837700be05256&amp;id=ff4261fc85" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<h2>Subscribe</h2>
					<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
					</div>
					<div class="mc-field-group">
						<label for="mce-FNAME">First Name </label>
						<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
					</div>
					<div class="mc-field-group">
						<label for="mce-LNAME">Last Name </label>
						<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
					</div>
					<div class="mc-field-group size1of2">
						<label for="mce-BIRTHDAY-month">Birthday </label>
						<div class="datefield">
							<span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> / 
							<span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span> 
							<span class="small-meta nowrap">( mm / dd )</span>
						</div>
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_075d739ef93b837700be05256_ff4261fc85" tabindex="-1" value=""></div>
					<div class="clear">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-lg btn-success"></div>
					</div>
				</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!--End mc_embed_signup-->
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
