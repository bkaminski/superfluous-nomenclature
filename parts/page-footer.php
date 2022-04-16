	<footer class="wbw-footer">
		<div class="container-fluid pt-3">
			<div class="row">
				<div class="col-md-3">
					<div class="left-foot text-center pt-3">
						<?php $uploads = wp_upload_dir(); 
						echo '<img class="img-fluid pb-3" src="' . esc_url( $uploads['baseurl'] . '/2019/11/proudly-independent-delaware.svg' ) . '" width="250px" alt="Proudly Independently Crafted in the First State">'; ?>
						
						<ul class="list-inline text-center">
							<li class="list-inline-item pr-4 pb-4"><a target="_blank" href="https://www.facebook.com/wilmingtonbrewworks/"><i class="fab fa-footer fa-facebook-square fa-2x"></i></a></li>
							<li class="list-inline-item pr-4"><a target="_blank" href="https://www.instagram.com/wilmingtonbrewworks/"><i class="fab fa-footer fa-instagram fa-2x"></i></a></li>
							<li class="list-inline-item pr-4 pb-4"><a target="_blank" href="https://twitter.com/WBWbeer"><i class="fab fa-footer fa-twitter-square fa-2x"></i></a></li>
							<li class="list-inline-item"><a target="_blank" href="https://www.youtube.com/channel/UCsq7IZYAhRAeYo9u-yIvr8w"><i class="fab fa-footer fa-youtube-square fa-2x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="middle-foot pt-4">
						<h5 class="text-white pb-2">Email List:</h5>
						<small class="mt-0 text-white">Subscribe to our emailing list and never miss an update.</small>
						<?php echo do_shortcode('[mc4wp_form id="69012"]'); ?>

					</div>
				</div>
				<div class="col-md-3 pt-4 pl-5 hours">
					<h5 class="text-white">Hours of Operation:</h5>
					<p class="text-white">Mon - Tue: 5pm to 9pm<br />
					Wed - Thurs: 3pm - 9pm<br />
					Fri - Sat: 12pm to 10pm<br />
					Sun: 12pm to 6pm</p>
				</div>
				<div class="col-md-3">
					<div class="right-foot pt-4">
						<h5 class="text-white">Wilmington Brew Works:</h5>
						<address class="text-white">
							3129 Miller Rd.<br />
							Wilmington DE, 19802<br />
							(302) 722-4828<br />
						</address>
						<p><a class="text-white" href="https://g.page/wilmingtonbrewworks?share" target="_blank">Map</a><br /></p>
						<a class="text-white" href="<?php echo get_home_url(); ?>/privacy-policy/">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<p class="text-center text-white copyright">Copyright &copy; <?php echo date('Y'); ?> Wilmington Brew Works <a target="_blank" href="https://benkaminski.com"><img src="https://benkaminski.com/files/kaminski-consulting-dark.png" class="img-fluid a" alt="Website Design by Benjamin Kaminski Consulting" style="opacity: 1;"><img src="https://benkaminski.com/files/kaminski-consulting.png" class="img-fluid b" alt="Website Design by Benjamin Kaminski Consulting"></a></p>
		</div>
	</footer>
