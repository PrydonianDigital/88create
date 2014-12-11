<?php get_header(); ?>
<style>
	body {
		<?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); if($colour != '') : ?>
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?>;
		<?php endif; ?>
		<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if($bg != '') : ?>
		background-image: <?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>;
		<?php endif; ?>
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}	
	<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	header h1 a, nav ul li a {
		color: #fff;
	}
	header h1 a:hover {
		color: #9992c4;
	}
	header {
		border-color: #fff;
	}
	footer {
		color: #fff;
	}
	<?php endif; ?>
</style>
<div class="grid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="col-1-1">

		<h2><?php the_title(); ?></h2>
		<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); if($video != '') : ?>
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
		<?php endif; ?>
		<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if($bg != '') : ?>
		<img src="<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>" alt="<?php the_title(); ?>">
		<?php else : ?>
		<?php the_content(); ?>
		<?php endif; ?>
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>