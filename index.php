<?php get_header(); ?>

<style>
	body {
		background-image: url(<?php header_image(); ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}	
</style>

<div class="grid" id="portfolio">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio' ); $url = $thumb['0']; ?>
	<div <?php post_class('col-1-3 portfolio'); ?>>
		<?php if(in_category('twitter')) { ?>
			<div class="tweet">
				<?php the_content(); ?>
				<p class="alignright"><i class="icon-twitter"></i>
			</div>
		<?php } elseif ( 'video' == get_post_format() ) { ?>
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php } else { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="thumbnail">
					<?php the_post_thumbnail('portfolio'); ?>
				</div>
				<div class="padding">
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
				</div>
			</a>
		<?php } ?>
	</div>

<?php endwhile; ?>
<div class="navigation">
 <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
 <div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
 </div>
<?php endif; ?>

</div>

<?php get_footer(); ?>