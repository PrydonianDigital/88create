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
<div id="legend">
	<a id="close" href="#close"><i class="icon-cancel-circle"></i></a> To navigate, use your keyboard left and right arrow keys or click the arrows at the bottom right	
</div>
<?php } ?>

<div id="skills" class="fadeIn animated">	
	<div class="reveal">
		<div class="slides">
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer">
					<div class="leftRoundel halfEight title">
						<span><h2>About</h2></span>
					</div>
					<div class="rightRoundel halfEight title">
						<span><h2>Us</h2></span>
					</div>
					<div id="centerPlus">
						<span>+</span>
					</div>
				</div>
			</section>			
			<?php
				$args = array (
					'pagename' => 'About Content',
					'orderby' => 'menu_order',
					'order' => 'ASC',
				);
				$services = new WP_Query( $args );
				if ( $services->have_posts() ) {
					while ( $services->have_posts() ) {
						$services->the_post();
			?>			
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer">
					<div class="nonRoundelContent">
						<?php the_content(); ?>
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