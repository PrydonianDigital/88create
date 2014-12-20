<?php get_header(); ?>
<?php
$background_color = get_background_color();
$background_image = get_background_image();
?>
<style type="text/css" id="custom-css">
.header { background: #<?php echo $background_color; ?> url("<?php header_image(); ?>") no-repeat center center; background-size: cover;}
</style>
<div class="grid">
	<div class="col-1-1">
		<div id="filterlist"></div>
		<ul id="filters" class="aligncenter">
		    <li><a href="#" data-filter="*" class="selected">Everything</a></li>
			<?php 
				$terms = get_terms('type');
				$count = count($terms);
				if ( $count > 0 ) {
					foreach ( $terms as $term ) {
						echo "<li><a href='#' data-show='".$term->slug."' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
					}
				} 
			?>
		</ul>
	</div>
</div>

<div class="grid" id="portfolio">
	
	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'work',
			'posts_per_page' => -1,
			'paged' => $paged
		); 
		$work = new WP_Query($args);
		if ($work->have_posts()) : while ($work->have_posts()) : $work->the_post(); 
		$terms = wp_get_post_terms( $work->post->ID, array( 'type' ) );
	?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'work' ); $url = $thumb['0']; ?>
	
		<div <?php post_class('col-1-4 portfolio'); ?> data-filters="<?php foreach ( $terms as $term ) : ?><?php echo $term->slug; ?><?php endforeach; ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="project">
				<div class="thumbnail">
					<?php the_post_thumbnail('portfolio', array( 'class' => 'lazy' )); ?><i class="icon-zoomin"></i>
				</div>
			</a>
		</div>
	
	<?php endwhile; ?>

</div>

<div class="navigation">
	<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
</div>

<?php endif; ?>
	
<?php get_footer(); ?>