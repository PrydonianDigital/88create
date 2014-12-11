<?php get_header(); ?>

<div class="grid large">

	<?php global $post; $title = get_post_meta( $post->ID, '_cmb_title', true ); if($title != '') : ?><h2 class="mainTitle"><?php global $post; $title = get_post_meta( $post->ID, '_cmb_title', true ); echo $title; ?></h2><?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="grid">
	
		<div class="col-1-1">
	
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); if($video != '') : ?>
				<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
			<?php endif; ?>
			<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if($bg != '') : ?>
			<img src="<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>" alt="<?php the_title(); ?>">
			<?php else : ?>
			<?php the_content(); ?>
			<?php endif; ?>
			<?php the_content(); ?>
		</div>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>