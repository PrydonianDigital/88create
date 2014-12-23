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
		<div class="col-1-7 person">		
			<?php if ( $detect->isMobile() ) { ?>
			<?php the_post_thumbnail('person'); ?>
			<?php } else { ?>
				<?php the_post_thumbnail('persondesktop'); ?>
			<?php } ?>
			<div class="padding">
				<h2><?php the_title(); ?></h2>
				<h5><?php global $post; $title = get_post_meta( $post->ID, '_cmb_title', true ); echo $title; ?></h5>
				<?php the_content(); ?>
			</div>
		</div>
		
		<?php endwhile; ?>
	
		<?php endif; ?>
	
	</div>
	
<?php get_footer(); ?>