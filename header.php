<?php
/**
 * @package WordPress
 * @subpackage dark_snow
 * @since Dark Snow 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'darksnow' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="icon" 
      type="image/png" 
      href="http://darksnowproject.org/wp-content/themes/darksnow/images/dark_snow_fav.png">


<!-- Webfont js file -->
<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/0bec35f4-1f66-477e-a4b7-c47d81b503e3.css"/>


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

?>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.min.1.8.3.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/waypoints.js" type="text/javascript" charset="utf-8"></script
<!--script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.queryloader2.js" type="text/javascript" charset="utf-8"></script-->

<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.mousewheel.js" type="text/javascript" charset="utf-8"></script>
<!--script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.scrolling-parallax.js" type="text/javascript" charset="utf-8"></script-->
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.scrollorama.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.scrollTo-1.4.2-min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/jquery.colorbox-min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/fabric.js" type="text/javascript" charset="utf-8"></script>
<script>
var testing = "<?php echo $_REQUEST['testing']; ?>";

$(function() {    
	// $("body").queryLoader2({backgroundColor:'#000', barColor:'#ff0000'});
	// $('div.parallax').scrollingParallax();
});


</script>

<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/plane.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/js/main.js?t=<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/css/anythingslider.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/css/colorbox.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php
gravity_form_enqueue_scripts(1, false);
?>

<?php wp_head(); ?>
</head>
<body id="layout">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=211153399041909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="main-wrapper" class="<?php ds_body_modifier(); ?>">
		<div id="main" class="page-<?php echo $post->ID; ?> <?php echo $post->post_name; ?>">