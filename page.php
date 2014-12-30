<?php get_header(); ?>
<style>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	header {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
</style>
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