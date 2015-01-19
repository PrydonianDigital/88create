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
			<h2>About Us</h2>
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

<div id="skills" class="fadeIn animated">	
	<div class="reveal">
		<div class="slides">
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer" itemprop="name headline">
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
					<div class="nonRoundelContent" itemprop="articleBody">
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

<?php } ?>

<?php get_footer(); ?>