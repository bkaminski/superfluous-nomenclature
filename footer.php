	<footer class="wbw-footer">
		<div class="container-fluid pt-3">
			<div class="row">
				<div class="col">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/Independent-craft-seal-Gold-01.svg' ) . '" width="200px" alt="Proudly Crafted in the First State">'; ?>
				</div>
				<div class="col">
					<?php $uploads = wp_upload_dir(); 
					echo '<img class="img-fluid" src="' . esc_url( $uploads['baseurl'] . '/2019/11/proudly-brewed-first-state.svg' ) . '" width="215px" alt="Proudly Crafted in the First State">'; ?>
				</div>
				<div class="col-md-4">
					<div class="middle-foot">
						<h5 class="text-white">Middle Footer</h5>

					</div>
				</div>
				<div class="col-md-4">
					<div class="right-foot">
						<h5 class="text-white">Right Footer</h5>

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
