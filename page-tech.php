<?php get_header(); ?>

<div id="legend">
	To navigate, use your keyboard left and right arrow keys, click the arrows at the bottom right or swipe on mobile devices <a id="close" href="#close"><i class="icon-cancel-circle"></i></a>
</div>

<div id="skills" class="fadeIn animated">	
	<div class="reveal">
		<div class="slides">
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer">
					<div class="leftRoundel halfEight title">
						<span><h2><?php global $post; $lr = get_post_meta( $post->ID, '_cmb_lr', true ); echo $lr; ?></h2></span>
					</div>
					<div class="rightRoundel halfEight title">
						<span><h2><?php global $post; $rr = get_post_meta( $post->ID, '_cmb_rr', true ); echo $rr; ?></h2></span>
					</div>
					<div id="centerPlus">
						<span>+</span>
					</div>
				</div>
			</section>			
			<?php
				$args = array (
					'post_type' => 'tech',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_parent' => 0
				);
				$services = new WP_Query( $args );
				if ( $services->have_posts() ) {
					while ( $services->have_posts() ) {
						$services->the_post();
						
						get_template_part( 'content', 'reveal' );
						
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