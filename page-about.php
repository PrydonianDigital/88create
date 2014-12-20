<?php get_header(); ?>

<div id="homePageAbout" class="fadeIn animated">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php global $post; $lr = get_post_meta( $post->ID, '_cmb_lr', true ); if($lr != '') : ?>
		
		<div id="leftroundel">
			<?php global $post; $lr = get_post_meta( $post->ID, '_cmb_lr', true ); echo $lr; ?>
		</div>
		
		<?php endif; ?>
		
		<div id="plus">+</div>
		
		<?php global $post; $rr = get_post_meta( $post->ID, '_cmb_rr', true ); if($rr != '') : ?>
		
		<div id="rightroundel">
			<?php global $post; $rr = get_post_meta( $post->ID, '_cmb_rr', true ); echo $rr; ?>
		</div>
		
		<div id="pageContent">
			<?php the_content(); ?>
		</div>
	
	<?php endif; ?>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>