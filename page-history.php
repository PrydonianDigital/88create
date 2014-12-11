<?php get_header(); ?>
<div class="grid small">
	<section id="cd-timeline" class="cd-container">
		<?php $args = array(
			'post_type' => 'timeline',
			'posts_per_page' => '100',
			'order' => 'ASC',
			'orderby' => 'date',
		); ?>
	    <?php $timeline = new WP_Query( $args ); ?>
		<?php if ($timeline->have_posts()) : while ($timeline->have_posts()) : $timeline->the_post(); ?>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-default"></div>
	            <div class="cd-timeline-content">
	            	<!--h2><?php the_title(); ?></h2-->
	                <?php the_content(); ?>
	                <span class="cd-date"><?php global $post; $text = get_post_meta( $post->ID, '_cmb_year', true ); echo $text; ?></span>
	            </div>
	        </div>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>