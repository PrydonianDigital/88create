<?php get_header(); ?>

<div id="legend">
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, use your keyboard left and right arrow keys, click the arrows at the bottom right or swipe on mobile devices
</div>

<div id="skills" class="fadeIn animated case_studies">	
	<div class="reveal">
		<div class="slides">
			</section>			
			<?php
				$args = array (
					'post_type' => 'case_studies',
					'posts_per_page' => -1
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