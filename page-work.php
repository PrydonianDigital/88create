<?php get_header(); ?>

<div class="grid">
	<div class="col-1-1">
		<ul id="filters" class="aligncenter">
		    <li><a href="#" data-filter="*" class="selected">Everything</a></li>
			<?php 
				$terms = get_terms('type');
				$count = count($terms);
				if ( $count > 0 ) {
					foreach ( $terms as $term ) {
						echo "<li><a href='#" . $term->name . "' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
					}
				} 
			?>
		</ul>
	</div>
</div>
dfgsg
<div class="grid" id="portfolio">
	
	<?php 
		global $wp_query;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$work = array(
			'post_type' => 'portfolio',
			'posts_per_page' => '4',
			'paged' => $paged,
			'caller_get_posts' => 1
		);
		$query = new WP_Query( $work );
	?>
	
	<?php while ($query->have_posts()) : $query->the_post(); ?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio' ); $url = $thumb['0']; ?>
	<?php if ( 'video' == get_post_format() ) { ?>
	<div <?php post_class('col-1-3 portfolio'); ?>>
		<?php $video = get_post_meta( $post->ID, '_cmb_v', true ); echo wp_oembed_get( $video ); ?>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	</div>
	<?php } elseif ( 'quote' == get_post_format() ) { ?>
	<div <?php post_class('col-1-3 portfolio'); ?>>
		<blockquote><?php the_content(); ?></blockquote>
	</div>
	<?php } else { ?>
	<div <?php post_class('col-1-3 portfolio'); ?>>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="thumbnail">
				<?php the_post_thumbnail('portfolio'); ?>
			</div>
			<h2><?php the_title(); ?></h2>
		</a>
	</div>
	<?php } ?>
	
	<?php endwhile; ?>
	<div class="navigation">
		<div class="next">
			<?php next_posts_link('More &raquo;') ?>
			<?php previous_posts_link('&laquo; Previous') ?>
		</div>
	</div>
	
</div>
	
<?php get_footer(); ?>