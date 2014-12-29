<?php get_header(); ?>

<?php
$args = array (
	'pagename' => 'Work',
);
$workPage = new WP_Query( $args );
if ( $workPage->have_posts() ) {
	while ( $workPage->have_posts() ) {
		$workPage->the_post();
?>
<style>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
</style>
<?php
	}
} else {
	// no posts found
}
wp_reset_postdata();
?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;	
?>

	<?php 
		$args = array(
			'post_type' => 'people',
			'orderby' => 'menu_order'
		); 
		$work = new WP_Query($args);
	?>
	
	<div id="people">
		
		<?php if ($work->have_posts()) : while ($work->have_posts()) : $work->the_post(); ?>	
		<div id="hcard-<?php global $post; echo $post->post_name; ?>" class="vcard person col-1-7">
			<a href="#">
			<?php if ( $detect->isMobile() ) { ?>
				<?php the_post_thumbnail('person'); ?>
			<?php } else { ?>
					<?php the_post_thumbnail('persondesktop'); ?>
			<?php } ?>
			<h2 class="fn"><?php the_title(); ?></h2>
			<h5><?php global $post; $title = get_post_meta( $post->ID, '_cmb_title', true ); echo $title; ?></h5>
			<div class="org">88Create</div>
			<div class="adr">
				<span class="locality">London</span>, 
				<span class="postcode">EC1V 7DB</span>
			</div>
			</a>
		</div>
		<?php endwhile; ?>
	
		<?php endif; ?>
	
	</div>

<dialog id="contact">
<a id="close" href="#close"><i class="icon-cancel-circle"></i></a>	<?php
		$args = array (
			'pagename' => 'Contact',
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
</dialog>
	
<?php get_footer(); ?>