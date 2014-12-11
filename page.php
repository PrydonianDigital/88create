<?php get_header(); ?>
<style>
<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	body {
		color: #fff;
	}
<?php endif; ?>
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