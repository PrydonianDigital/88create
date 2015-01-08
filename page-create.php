<?php get_header(); ?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;	
?>
<?php if ( $detect->isMobile() ) { ?>
<div id="legend">
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, swipe left and right.
</div>
<?php } else { ?>
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, use your keyboard left and right arrow keys or click the arrows at the bottom right	
<?php } ?>

<div id="skills" class="fadeIn animated">	
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