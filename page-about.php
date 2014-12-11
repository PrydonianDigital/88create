<?php get_header(); ?>

<div id="about">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="content">

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>