<?php get_header(); ?>
<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;	
?>
<h2 class="aligncenter mainTitle"><?php the_title(); ?></h2>

	<?php if (have_posts()) : ?>
<div class="grid">	
	<div class="col-1-1">
	<?php while (have_posts()) : the_post(); ?>
		
		

		<?php the_content(); ?>
		
		<div id="roundels">
			<div id="spacer">
				<?php
					// WP_Query arguments
					$args = array (
						'post_type' => 'services',
					);
					// The Query
					$roundels = new WP_Query( $args );
					// The Loop
					if ( $roundels->have_posts() ) {
						while ( $roundels->have_posts() ) {
							$roundels->the_post();
				?>		
				<a class="roundel" href="#<?php global $post; echo $post->post_name; ?>"><?php the_title(); ?></a>
				<?php
						}
					} else {
						// no posts found
					}
					// Restore original Post Data
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>
<div class="grid large">
	<div class="col-1-1">
		<?php
			// WP_Query arguments
			$args = array (
				'post_type' => 'services',
			);
			// The Query
			$services = new WP_Query( $args );
			// The Loop
			if ( $services->have_posts() ) {
				while ( $services->have_posts() ) {
					$services->the_post();
		?>
		<div <?php post_class('section col-1-1'); ?>>
		<div class="grid">
			<div class="col-1-1">
				<h2 class="aligncenter" id="<?php global $post; echo $post->post_name; ?>"><?php the_title(); ?></h2>
			</div>
			<div class="col-1-2">
				<?php global $post; $sh = get_post_meta( $post->ID, '_cmb_sh', true ); if( $sh != '' ) : ?>
				<h2 class="subhead"><?php global $post; $sh = get_post_meta( $post->ID, '_cmb_sh', true ); echo $sh; ?></h2>
				<?php endif; ?>
				<?php the_content(); ?>
				<?php global $post; $bt = get_post_meta( $post->ID, '_cmb_bt', true ); if( $bt != '' ) : ?>
				<a href="/contact/" class="button"><?php global $post; $bt = get_post_meta( $post->ID, '_cmb_bt', true ); echo $bt; ?></a>
				<?php endif; ?>
			</div>
		
			<div class="col-1-2">
			<?php if ( $detect->isMobile() ) { ?>
			<?php
				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'services_case',
				  'connected_items' => $post,
				  'nopaging' => true,
				) );
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				    <a href="<?php the_permalink(); ?>" class="mobileRollover">
				    	<?php the_post_thumbnail('case'); ?>
				    	<h3><i class="icon-zoomin"></i></h3>
				    </a>
				    <br />
				    <p><a href="<?php the_permalink(); ?>" class="button">View this Case Study</a> <a href="/case_studies/" class="button">View all Case Studies</a></p>
				<?php endwhile; ?>
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				
				endif;
			?>		
			
			<?php } else { ?>
			<?php
				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'services_case',
				  'connected_items' => $post,
				  'nopaging' => true,
				) );
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				    <a href="<?php the_permalink(); ?>" class="rollover">
				    	<?php the_post_thumbnail('case'); ?>
				    	<h3><i class="icon-zoomin"></i></h3>
				    </a>
				    <br />
				    <p><a href="<?php the_permalink(); ?>" class="button">View this Case Study</a> <a href="/case_studies/" class="button">View all Case Studies</a></p>
				<?php endwhile; ?>
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				
				endif;
			?>					
			<?php } ?>		
			</div>
		</div>
		</div>
		
		<?php
				}
			} else {
				// no posts found
			}
			// Restore original Post Data
			wp_reset_postdata();
		?>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	</div>	
</div>

<?php get_footer(); ?>