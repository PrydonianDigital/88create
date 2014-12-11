<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="DC.title" content="88Create" />
<meta name="ICBM" content="51.523803, -0.098877" />
<meta name="geo.position" content="51.523803, -0.098877" />	
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<style>
<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?>
	body {
		background-image: url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
<?php endif; ?>
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
</head>
<body <?php body_class(); ?>>
<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;	
?>
<div id="animation">
	<div id="ball1" class="ball"></div>
	<div id="ball2" class="ball"></div>
	<div id="ball3" class="ball"></div>
	<div id="ball4" class="ball"></div>
	<div id="ball5" class="ball"></div>
	<div id="ball6" class="ball"></div>
	<div id="ball7" class="ball"></div>
	<div id="ball8" class="ball"></div>
	<div id="ball9" class="ball"></div>
	<div id="ball10" class="ball"></div>
</div>
<aside class="fadeInDownBig animated" id="cookies">
	<?php
	$args = array (
		'pagename' => 'Cookie Blurb',
	);
	
	$qcookie = new WP_Query( $args );
	if ( $qcookie->have_posts() ) {
		while ( $qcookie->have_posts() ) {
			$qcookie->the_post();
	?>
			<?php echo $post->post_content; ?>
	<?php
		}
	} else {
		// no posts found
	}
	wp_reset_postdata();	
	?>
	 <a id="close" href="#close"><i class="icon-cancel-circle"></i>
</aside>
<header>
	<h1 class="fadeInLeftBig animated"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><i class="ee-create"></i></a></h1>
	<?php if ( $detect->isMobile() ) { ?>
		<a class="toggle fadeInRightBig animated"><i class="icon-menu"></i></a>
	<?php } else { ?>
		<nav class="fadeInRightBig animated" id="desktop">
			<?php wp_nav_menu( array( 'theme_location' => 'eemenu', 'container' => false ) ); ?>
		</nav>
	<?php } ?>
	</nav>
</header>
<?php if ( $detect->isMobile() ) { ?>
	<nav class="" id="mobile">
		<?php wp_nav_menu( array( 'theme_location' => 'eemobile', 'container' => false ) ); ?>
	</nav>
<?php } ?>