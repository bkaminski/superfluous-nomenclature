<div class="beer-header pt-4 pb-3">
	<figure id="logoVector" class="text-center">
		<?php if( get_field('logo-graphic') ): ?>
			<img src="<?php the_field('logo-graphic'); ?>" alt="<?php the_title(); ?>" />
		<?php endif; ?>
	</figure>
</div>
