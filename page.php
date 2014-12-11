<?php get_header(); ?>

<div class="grid">
	
	<div class="col-1-1 bg">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>
			
	<?php endwhile; ?>
	
	<?php endif; ?>
	
	</div>
	
</div>

<?php get_footer(); ?>