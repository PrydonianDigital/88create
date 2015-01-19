<?php get_header(); ?>
<style>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}	

	header {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	header:before {
	    content: "";
	    position: fixed;
	    background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
	    -webkit-transform-origin: top left;
	    -moz-transform-origin: top left;
	    transform-origin: top left;
	    -webkit-filter: blur(10px); 
	    -moz-filter: blur(10px); 
	    -o-filter: blur(10px); 
	    -ms-filter: blur(10px); 
	    filter: blur(10px);
	    left: 0;
	    top: 0;
	    z-index: -1;
	    width: 100%;
	    height: 188px;
	    top: -20px;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
		filter:url(#blur-effect);
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
	#bodyContent {
		color: #fff;
		text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
	}
	#closeWork {
		color: #efefef;
	}
	<?php endif; ?>
</style>
<div class="grid large">
		
	<h2><?php the_title(); ?></h2>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="grid mobile">
	
		<div <?php post_class('col-1-1'); ?>>
			<?php the_content(); ?>
		</div>
		
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>