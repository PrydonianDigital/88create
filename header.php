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
<script src="//use.typekit.net/rwx4edd.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--
     888888888          888888888             CCCCCCCCCCCCC                                                                tttt                              
   88:::::::::88      88:::::::::88        CCC::::::::::::C                                                             ttt:::t                              
 88:::::::::::::88  88:::::::::::::88    CC:::::::::::::::C                                                             t:::::t                              
8::::::88888::::::88::::::88888::::::8  C:::::CCCCCCCC::::C                                                             t:::::t                              
8:::::8     8:::::88:::::8     8:::::8 C:::::C       CCCCCCrrrrr   rrrrrrrrr       eeeeeeeeeeee    aaaaaaaaaaaaa  ttttttt:::::ttttttt        eeeeeeeeeeee    
8:::::8     8:::::88:::::8     8:::::8C:::::C              r::::rrr:::::::::r    ee::::::::::::ee  a::::::::::::a t:::::::::::::::::t      ee::::::::::::ee  
 8:::::88888:::::8  8:::::88888:::::8 C:::::C              r:::::::::::::::::r  e::::::eeeee:::::eeaaaaaaaaa:::::at:::::::::::::::::t     e::::::eeeee:::::ee
  8:::::::::::::8    8:::::::::::::8  C:::::C              rr::::::rrrrr::::::re::::::e     e:::::e         a::::atttttt:::::::tttttt    e::::::e     e:::::e
 8:::::88888:::::8  8:::::88888:::::8 C:::::C               r:::::r     r:::::re:::::::eeeee::::::e  aaaaaaa:::::a      t:::::t          e:::::::eeeee::::::e
8:::::8     8:::::88:::::8     8:::::8C:::::C               r:::::r     rrrrrrre:::::::::::::::::e aa::::::::::::a      t:::::t          e:::::::::::::::::e 
8:::::8     8:::::88:::::8     8:::::8C:::::C               r:::::r            e::::::eeeeeeeeeee a::::aaaa::::::a      t:::::t          e::::::eeeeeeeeeee  
8:::::8     8:::::88:::::8     8:::::8 C:::::C       CCCCCC r:::::r            e:::::::e         a::::a    a:::::a      t:::::t    tttttte:::::::e           
8::::::88888::::::88::::::88888::::::8  C:::::CCCCCCCC::::C r:::::r            e::::::::e        a::::a    a:::::a      t::::::tttt:::::te::::::::e          
 88:::::::::::::88  88:::::::::::::88    CC:::::::::::::::C r:::::r             e::::::::eeeeeeeea:::::aaaa::::::a      tt::::::::::::::t e::::::::eeeeeeee  
   88:::::::::88      88:::::::::88        CCC::::::::::::C r:::::r              ee:::::::::::::e a::::::::::aa:::a       tt:::::::::::tt  ee:::::::::::::e  
     888888888          888888888             CCCCCCCCCCCCC rrrrrrr                eeeeeeeeeeeeee  aaaaaaaaaa  aaaa         ttttttttttt      eeeeeeeeeeeeee  
-->
<style>

<?php if(is_page()) { ?>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	.mainTitle {
		text-shadow: 1px 1px 1px #fff;
	}
<?php } elseif(is_archive()) { ?>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?>;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	header {
		border-color: #fff;
	}
	<?php else : ?>
	header {
		border-color: #000;
	}
	<?php endif; ?>
<?php } elseif(is_home()) { ?>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
<?php } elseif(is_single()) { ?>
	body {
		background: <?php global $post; $colour = get_post_meta( $post->ID, '_cmb_colour', true ); echo $colour; ?> url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	body:before {
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
	    height: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
		filter:url(#blur-effect);
	}
<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	.mainTitle {
		color: #efefef;
		text-shadow: 1px 1px 1px rgba(0,0,0,0.8);
	}
	header {
		border-color: #fff;
	}
<?php else : ?>
	header {
		border-color: #000;
	}
<?php endif; ?>
<?php } else { ?>
<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); if( $bg != '' ) : ?>
	body {
		background: url(<?php global $post; $bg = get_post_meta( $post->ID, '_cmb_bg', true ); echo $bg; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
	}
	body:before {
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
	    height: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
		filter:url(#blur-effect);
	}
<?php endif; ?>
<?php }  ?>
<?php global $post; $dbg = get_post_meta( $post->ID, '_cmb_dbg', true ); if( $dbg == 'on' ) : ?>
	header h1 a, nav ul li a {
		color: #efefef;
	}
	header h1 a:hover {
		color: #9992c4;
	}
	header {
		border-color: #efefef;
	}
	footer {
		color: #efefef;
	}
<?php endif; ?>
	.dark header h1 a, nav ul li a {
		color: #efefef;
	}
	.dark header h1 a:hover {
		color: #9992c4;
	}
	.dark header {
		border-color: #efefef;
	}
	.dark footer {
		color: #efefef;
	}
	.dark #legend {
		background: #efefef;
		color: #000;
	}
	.dark footer {
		color: #000;
	}
	.light header h1 a, nav ul li a {
		color: #000;
	}
	.light header h1 a:hover {
		color: #453a8a;
	}
	.light header {
		border-color: #000;
	}
	.dark #close, .dark #close i {
		color: #000 !important;
	}
	.light #legend {
		
	}
	.light footer {
		color: #fff;
	}
</style>
</head>
<body <?php body_class(); ?>>
<svg id="svg-image-blur">
    <filter id="blur-effect">
        <feGaussianBlur stdDeviation="8" />
    </filter>
</svg>
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
<header id="header">
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
<div id="bodyContent">