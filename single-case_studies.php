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
<div class="grid large">

	<h2 class="mainTitle"><?php the_title(); ?></h2>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="col-1-1">
		<div class="grid">
			<div class="col-1-1">
				<?php the_content(); ?>	
			</div>
		</div>
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>