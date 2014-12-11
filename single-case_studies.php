<?php get_header(); ?>
<style>
	body {
		<?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); if($colour != '') : ?>
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?>;
		<?php endif; ?>
		<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if($bg != '') : ?>
		background-image: <?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>;
		<?php endif; ?>
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}	
	<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	header h1 a, nav ul li a {
		color: #fff;
	}
	header h1 a:hover {
		color: #9992c4;
	}
	header {
		border-color: #fff;
	}
	footer {
		color: #fff;
	}
	<?php endif; ?>
</style>
<div class="grid large">

	<h2 class="mainTitle"><?php the_title(); ?></h2>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="col-1-1">
				
		<div class="grid">
			
			<div class="col-1-4">
				<h4>Brief</h4>
				<?php the_content(); ?>
				<div class="keyfacts" <?php global $post; $kc = get_post_meta( $post->ID, '_cmb_keycolour', true ); if($kc != '') : ?>style="background: <?php global $post; $kc = get_post_meta( $post->ID, '_cmb_keycolour', true ); echo $kc; ?>"<?php endif; ?>>
					<h4>Key Facts</h4>
					<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_cmb_key', true ) ); ?>
				</div>
			</div>
			
			<div class="col-1-4">
				<blockquote>
					<p><?php global $post; $quote = get_post_meta( $post->ID, '_cmb_quote', true ); echo $quote; ?></p>
					<?php global $post; $author = get_post_meta( $post->ID, '_cmb_author', true ); if($author != '') : ?>
						<cite>
							<?php global $post; $author = get_post_meta( $post->ID, '_cmb_author', true ); echo $author; ?>
						</cite>
					<?php endif; ?>
				</blockquote>
				<h4>Solution</h4>
				<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_cmb_solution', true ) ); ?>
			</div>
			
			<div class="col-1-2">
				<?php the_post_thumbnail('big_case'); ?>
			<?php
				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'people_case',
				  'connected_items' => $post,
				  'nopaging' => true,
				) );
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				<div class="grid caseperson">
				    <a href="<?php the_permalink(); ?>">
					<div class="col-1-2">
				    	<?php the_post_thumbnail('case'); ?>
					</div>
					<div class="col-1-2">
				    	<h2><?php the_title(); ?></h2>
						<h5><?php global $post; $title = get_post_meta( $post->ID, '_cmb_title', true ); echo $title; ?></h5>
					</div>
				    </a>
				<?php endwhile; ?>
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				
				endif;
			?>					
			</div>

	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>