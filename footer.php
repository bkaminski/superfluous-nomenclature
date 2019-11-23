	<footer class="wbw-footer">
		<div class="container-fluid pt-3">
			<div class="row">
				<div class="col-md-4">
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
				<div class="col-md-4">
					<div class="middle-foot pt-4">
						<h5 class="text-white pb-2">Email List:</h5>
						<small class="mt-0 text-white">Subscribe to our emailing list and never miss an update.</small>
						<?php echo do_shortcode('[mc4wp_form id="69012"]'); ?>

					</div>
				</div>
				<div class="col-md-4">
					<div class="right-foot pt-4">
						<h5 class="text-white">Wilmington Brew Works:</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<p class="text-center text-white copyright">Copyright &copy; <?php echo date('Y'); ?> Wilmington Brew Works <a target="_blank" href="https://benkaminski.com"><img src="https://benkaminski.com/files/kaminski-consulting-dark.png" class="img-fluid a" alt="Website Design by Benjamin Kaminski Consulting" style="opacity: 1;"><img src="https://benkaminski.com/files/kaminski-consulting.png" class="img-fluid b" alt="Website Design by Benjamin Kaminski Consulting"></a></p>
		</div>
	</footer>
	<?php wp_footer(); ?>

	</body>
</html>
