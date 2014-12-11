<?php get_header(); ?>

<div class="grid large">
	
	<h2 class="mainTitle"><?php the_title(); ?></h2>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="grid">

		<div class="col-1-1">
	
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); if($video != '') : ?>
				<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
			<?php endif; ?>
			<?php the_content(); ?>
			
		</div>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>