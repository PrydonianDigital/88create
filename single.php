<?php get_header(); ?>

<div class="grid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="col-1-1">

		<h2><?php the_title(); ?></h2>
		<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); if($video != '') : ?>
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
		<?php endif; ?>
		<?php the_content(); ?>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>