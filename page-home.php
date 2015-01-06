<?php get_header(); ?>

<div id="skills" class="fadeIn animated home">	
	<div class="reveal">
		<div class="slides">
			<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
				<div class="roundelContainer">
					<div class="leftRoundel halfEight title">
						<span><h2>TAKE</h2></span>
					</div>
					<div class="rightRoundel halfEight title">
						<span><h2>CREATE</h2></span>
					</div>
					<div id="centerPlus">
						<span>+</span>
					</div>
				</div>
			</section>			
		</div>
	</div>
</div>

<?php get_footer(); ?>