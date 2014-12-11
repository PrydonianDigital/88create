<?php get_header(); ?>
<div id="map"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="form">
		<?php the_content(); ?>
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>

<?php get_footer(); ?>