<?php get_header(); ?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;	
?>
<?php if ( $detect->isTablet() ) { ?>
<div id="legend">
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, swipe left and right.
</div>
<?php } if ( $detect->isMobile() ) { ?>

<?php } else { ?>
<div id="legend">
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, use your keyboard left and right arrow keys or click the arrows at the bottom right	
</div>
<?php } ?>

<?php if ( $detect->isMobile() && !$detect->isTablet() ) { ?>
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
	header:before {
	    content: "";
	    position: fixed;
	    background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
	    -webkit-transform-origin: top left;
	    -moz-transform-origin: top left;
	    transform-origin: top left;
	    left: 0;
	    top: 0;
	    z-index: -1;
	    width: 100%;
	    height: 188px;
	    top: -20px;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	
</style>

	<div class="grid large mobile">
		<div <?php post_class('col-1-1'); ?>>
		<?php
			$args = array (
				'post_type' => 'case_studies',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_parent' => 0
			);
			$services = new WP_Query( $args );
			if ( $services->have_posts() ) {
				while ( $services->have_posts() ) {
					$services->the_post();
		?>	
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>			
		<?php
					
				}
			} else {
			// no posts found
			}
			wp_reset_postdata();
		?>
		</div>
	</div>
	
<?php } else { ?>

<div id="skills" class="fadeIn animated case_studies">	
	<div class="reveal">
		<div class="slides">
			<?php
				$args = array (
					'post_type' => 'case_studies',
					'orderby' => 'menu_order',
					'order' => 'ASC',
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

<?php } ?>

<?php get_footer(); ?>