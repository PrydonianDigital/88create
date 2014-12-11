<?php get_header(); ?>
<div id="legend">
	To navigate, use your keyboards left and right arrow keys, click the arrows at the bottom right or swipe on mobile devices <a id="close" href="#close"><i class="icon-cancel-circle"></i></a>
</div>
<div id="skills">	
	<div class="reveal">
		<div class="slides">
		<?php
			$args = array (
				'post_type' => 'skill',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_parent' => 0
			);
			$services = new WP_Query( $args );
			if ( $services->have_posts() ) {
				while ( $services->have_posts() ) {
					$services->the_post();
		?>
			<section id="<?php global $post; echo $post->post_name; ?>">
				<h2><?php the_title(); ?></h2>
				<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); if($video != '') : ?>
				<div class="grid">
					<div class="col-1-2">
						<?php the_content(); ?>
					</div>
					<div class="col-1-2">
						<?php $v = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $v ); ?>
						<?php global $post; $lt = get_post_meta( $post->ID, '_cmb_lt', true ); if( $lt != '' ) : ?>
						<p><a href="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $lh; ?>" class="button" target="_blank"><?php global $post; $lt = get_post_meta( $post->ID, '_cmb_lt', true ); echo $lt; ?></a></p>
						<?php endif; ?>
					</div>
					<?php else : ?>
					<?php the_content(); ?>
					<?php endif; ?>
			</section>
		<?php
				}
			} else {
			// no posts found
			}
			wp_reset_postdata();
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>