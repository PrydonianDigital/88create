<?php get_header(); ?>

<h2 class="mainTitle"><?php the_title(); ?></h2>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="grid">
		<div class="col-1-1">
			<?php the_content(); ?>
		</div>
	</div>
			
<?php endwhile; ?>
	
<?php endif; ?>

<?php get_footer(); ?>