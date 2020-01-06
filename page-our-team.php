<?php
/**
* Template Name: Our Team Page
*
* @package WordPress
* @subpackage Superfluous Nomenclature
* 
*/
get_header(); ?>
<div class="page-header">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="display-3 text-center pg-title text-uppercase"><?php the_title(); ?></h1>
</div>
<div class="container">
	<div class="main-content-area pb-3">
		<h2 class="text-center pt-3">Ownership Team:</h2>
		<div class="card-deck mt-3 mb-3">
			<div class="card">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Bio-Craig2.png" class="card-img-top about--img" alt="Craig Wensell" style="background:#1d547e;">
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Craig Wensell<br />Chief Executive Officer and Master Brewer</h5>
					<p class="card-text small">Craig Wensell, Sanitizer in Chief, Brewing Operations Manager, CEO, and Janitor. Craig has degrees from Oklahoma State University and The Florida State University. Early in his career, he taught orchestra K-12 before moving on to teaching at different universities to include The Florida State University. Craig is an amateur Double Bassist and has played across the country with many different groups such as The Columbus Symphony, Tulsa Philharmonic, and The Delaware Symphony Orchestra. He has performed at The Oklahoma Music Hall of Fame for Barney Kessel and has performed music in Weil Hall in New York City. Craig also served in Afghanistan as a Blackhawk (UH-60 A/L) Crew Chief. During his service he reach the rank of E-5 and earned numerous commendation for outstanding performance including 1000 accident free flight hours. His family has a long rich history of home-brewing that goes back to the 1980s. Craig enjoys endless hours at the brew kettle, reading technical papers, and watching yeast make beer!</p>
				</div>
			</div>
			<div class="card">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/keith-bio.png" class="card-img-top about--img" alt="B. Keith Hughes" style="background:#1d547e;">
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Keith Hughes<br /> CFO and Chief Operating Officer</h5>
					<p class="card-text small">Keith Hughes, CFO and Chief Operating Officer, individual grain counter and IT/website help desk. Keith has a degree in Accounting from The State University of New York. Early in his career, Keith employed his talents to the cosmetics industry, working for Estee Lauder companies. Having conquered lipstick costing, Keith embraced the complicated world of software revenue recognition. By day, Keith serves as the Director of Finance for the Digital Science group of Thermo Fisher Scientific. By night, he fashions himself a critic of many things. Check out his website at www.moviescigarsandabrew.com and look for his upcoming podcast endeavor focused on the world of craft beer. Keith's heart and soul will forever be of the lemmings in their eternal quest for a new hops combination. "NEIPA'S forever," will likely be a headstone epitaph.</p>
				</div>
			</div>
			<div class="card">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Bio-John2.png" class="card-img-top about--img" alt="John Fusco" style="background:#1d547e;">
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">John Fusco<br /> VP of Marketing and Brand Management</h5>
					<p class="card-text small">John is a Marine Engineer by trade, with a degree from the US Merchant Marine Academy. In his day job he’s a navy civilian, and has been a Navy Reserve Officer since 2001. In 2004 he started a T-shirt company in Wilmington with some friends that eventually became WhizBang Concepts. He has drawn logos and artwork, and produced apparel, for a number of local businesses, charities and breweries, which is how he met Craig. John and his wife Lisa, have also chaired the Philadelphia Walk for Williams Syndrome twice. He plays drums and guitar in a band called Double Down that rarely plays outside a basement in Glen Mills. He’s a New Yorker by birth, but has now lived in Delaware almost as long as he has in NY, he, has three young girls, and will never turn down a new IPA.</p>
				</div>
			</div>
		</div>
		<div class="card-deck">
			<div class="card">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Bio-Dan2.png" class="card-img-top about--img2" alt="Dan Yopp" style="background:#1d547e;">
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Dan 'Beerman' Yopp<br /> Partner</h5>
					<p class="card-text small">Dan “Beerman” Yopp is the Master of the Custodial Arts at Wilmington Brew Works. As a Delaware native who has spent his entire life in the state, he graduated from Wilmington University with a B.A. in Business Management, then went on to be a Lab Technician at Delstar Technologies. Dan became interested in homebrewing from a neighbor and quickly realized he enjoyed it very much. As an avid gardener who enjoyed growing everything from sweet garlic to habanero peppers, he found the “Do it Yourself” method in homebrewing very rewarding. He joined the First State Brewers to enhance his skills, and along the way he met the esteemed gentlemen which would go on to being his business partners. Favorite beers styles are Stout, Porter, & Barleywine, especially if they are barrel aged.</p>
				</div>
			</div>
			<div class="card">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Bio-derek2.png" class="card-img-top about--img2" alt="Derek Berkeley" style="background:#1d547e;">
				<div class="card-body">
					<h5 class="card-title text-center font-weight-bold">Derek Berkeley<br /> Facilities Maintenance</h5>
					<p class="card-text small">Derek Berkeley, Beer Hunter, and Janitor In Training. Derek hails from Canada which helps explain his love for beer and hockey. Nomadic by nature, his travels have taken him from the snowy tundras of Montreal to the badlands of Boston, deserts of Charlotte, wilderness of Virginia and most recently the ‘burbs of Delaware. Having realized at an early age that earning a college degree would allow him to buy more beer, he embarked on his “Decade of Learning” at the University of Lowell where he almost became the first undergrad in history to get tenure. When not honing his Beer Hunting techniques, Derek enjoys spending time with his Girlfriend and her 2 children, racing tricycles, and refereeing Women’s Roller Derby.</p>
				</div>
			</div>
		</div>
		<hr>
		<h2 class="text-center pt-3">Staff:</h2>
		<?php the_content(); ?>
	</div>
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
