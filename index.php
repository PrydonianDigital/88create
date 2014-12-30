<?php get_header(); ?>
<?php
$background_color = get_background_color();
$background_image = get_background_image();
?>
<style>
	body {
		background: #<?php echo $background_color; ?>;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}

	header {
		background: #<?php echo $background_color; ?>;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
</style>
<div class="grid" id="portfolio">

	<?php 
	$args = array (
		'post_type' => 'post',
		'posts_per_page' => '-1',
	);
	$blog = new WP_Query( $args );
	if ( $blog->have_posts() ) {
		while ( $blog->have_posts() ) {
			$blog->the_post();
	?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio' ); $url = $thumb['0']; ?>
	
		<?php if(in_category('twitter')) { ?>
		
			<div <?php post_class('col-1-3 portfolio'); ?>>
				<div class="tweet">
					<?php the_content(); ?>
					<p class="alignright"><i class="icon-twitter"></i>
				</div>
			</div>
		
		<?php } elseif ( 'video' == get_post_format() ) { ?>
		
			<div <?php post_class('col-2-3 portfolio'); ?>>
				<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</div>
		
		<?php } else { ?>
		
			<div <?php post_class('col-1-3 portfolio'); ?>>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<div class="thumbnail">
						<?php the_post_thumbnail('portfolio'); ?>
					</div>
					<div class="padding">
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
					</div>
				</a>
			</div>
		
		<?php } ?>
	
	<?php 
			}
		} else {
		}
	wp_reset_postdata();
	?>

</div>

<?php get_footer(); ?>