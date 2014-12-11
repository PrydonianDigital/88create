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
<!--div class="grid">
	<div class="col-1-1">
		<ul id="filters" class="aligncenter">
		    <li><a href="#" data-filter="*" class="selected">Everything</a></li>
			<?php 
				$terms = get_terms('cs_type');
				$count = count($terms);
				if ( $count > 0 ) {
					foreach ( $terms as $term ) {
						echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
					}
				} 
			?>
		</ul>
	</div>
</div-->

<div class="grid" id="portfolio">
	
	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'case_studies',
			'paged' => $paged
		); 
		$work = new WP_Query($args);
		if ($work->have_posts()) : while ($work->have_posts()) : $work->the_post(); 
	?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'work' ); $url = $thumb['0']; ?>
	
	<?php if ( 'video' == get_post_format() ) { ?>
	
		<div <?php post_class('col-2-3 portfolio'); ?>>
			<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		</div>
	
	<?php } else { ?>
	
		<div <?php post_class('col-1-3 portfolio'); ?>>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="project">
				<div class="thumbnail">
					<?php the_post_thumbnail('portfolio'); ?><i class="icon-zoomin"></i>
				</div>
			</a>
		</div>
	
	<?php } ?>
	
	<?php endwhile; ?>

</div>

<div class="navigation">
	<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
</div>

<?php endif; ?>
	
<?php get_footer(); ?>