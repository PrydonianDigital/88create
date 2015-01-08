<section id="<?php global $post; echo $post->post_name; ?>"<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?> data-background="<?php global $post; $lh = get_post_meta( $post->ID, '_cmb_lh', true ); echo $bg; ?>"<?php endif; ?> <?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?> data-background-color="#000"<?php endif; ?>>
	<div class="roundelContainer">
		<div class="leftRoundel halfEight title">
			<span><h3><?php the_title(); ?></h3></span>
		</div>
		<div class="rightRoundel halfEight">
			<span><?php the_content(); ?></span>
		</div>
	</div>
</section>