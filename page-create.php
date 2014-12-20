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
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer">
					<div class="leftRoundel halfEight">
						<span><h2><?php the_title(); ?></h2></span>
					</div>
					<div class="rightRoundel halfEight">
						<span><?php the_content(); ?></span>
					</div>
				</div>
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