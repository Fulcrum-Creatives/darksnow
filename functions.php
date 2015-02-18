<?php
/**
 * @package WordPress
 * @subpackage dark_snow
 * @since Dark Snow 1.0
 */

/* quick and dirty admin section and screen */
define( 'THEME_NICE_NAME', 'darksnow');
define( 'NONCE_STRING', 'SnowDark' );
define( 'ADMIN_PAGE_TITLE', 'DarkSnow Admin' );
define( 'ADMIN_MENU_TITLE', 'DarkSnow Admin' );
define( 'ADMIN_SLUG', 'ds-admin' );
define( 'ADMIN_ICON_URL', false );
define( 'ADMIN_MENU_POSITION', 2 );


class ThemeUtil{

	public static function mpuke( $obj ){
		echo '<pre>';
		print_r( $obj );
		echo '</pre>';
	}

	public static function mpuke_ta( $obj ){
		echo '<textarea style="width:100%;height:300px">';
		print_r( $obj );
		echo '</textarea>';
	}

	public static function log_something( $str ){
	  // return;
    $filepath = $_SERVER['DOCUMENT_ROOT'] . '/utl.log.txt';

    if( $fp = fopen( $filepath, "a" ) ){
      fputs ( $fp, date("m/d/y : H:i:s", time())  . "\n" );
      fputs ( $fp, $str . "\n" );
      fputs ( $fp, "------------------------------\n" );
      fclose ( $fp );
    }

	}

} 

// hiding the WP admin bar
add_filter('show_admin_bar', '__return_false'); 

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * kill 2011 sidebars
 */
function ds_remove_widgets(){
	// unregister_sidebar('sidebar-1');
	unregister_sidebar('sidebar-2');
	// unregister_sidebar('sidebar-3');
	// unregister_sidebar('sidebar-4');
	unregister_sidebar('sidebar-5');
}
add_action( 'widgets_init', 'ds_remove_widgets', 11 );

/**
 * Tell WordPress to run darksnow_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'darksnow_setup');

if ( ! function_exists( 'darksnow_setup' ) ):
/**
 * @since Dark Snow 1.0
 */
function darksnow_setup() {
	
}
endif; // darksnow_setup

if ( ! function_exists( 'darksnow_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Dark Snow 1.0
 */
function darksnow_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // darksnow_header_style

if ( ! function_exists( 'darksnow_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in darksnow_setup().
 *
 * @since Dark Snow 1.0
 */
function darksnow_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 1000px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // darksnow_admin_header_style

if ( ! function_exists( 'darksnow_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in darksnow_setup().
 *
 * @since Dark Snow 1.0
 */
function darksnow_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // darksnow_admin_header_image

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function darksnow_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'darksnow_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function darksnow_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'darksnow' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and darksnow_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function darksnow_auto_excerpt_more( $more ) {
	return ' &hellip;' . darksnow_continue_reading_link();
}
add_filter( 'excerpt_more', 'darksnow_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function darksnow_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= darksnow_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'darksnow_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function darksnow_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'darksnow_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Dark Snow 1.0
 */
function darksnow_widgets_init() {

	
	
	
}
add_action( 'widgets_init', 'darksnow_widgets_init' );

if ( ! function_exists( 'darksnow_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function darksnow_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'darksnow' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'darksnow' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'darksnow' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // darksnow_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Dark Snow 1.0
 * @return string|bool URL or false when no link is present.
 */
function darksnow_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function darksnow_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'darksnow_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own darksnow_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Dark Snow 1.0
 */
function darksnow_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'darksnow' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'darksnow' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'darksnow' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'darksnow' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'darksnow' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'darksnow' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'darksnow' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for darksnow_comment()

if ( ! function_exists( 'darksnow_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own darksnow_posted_on to override in a child theme
 *
 * @since Dark Snow 1.0
 */
function darksnow_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'darksnow' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'darksnow' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Dark Snow 1.0
 */
function darksnow_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'darksnow_body_classes' );


function ds_create_admin_menus(){
	if( current_user_can('add_users') )
	  $the_cap = 'administrator';
	else
	  $the_cap = 'editor';

	add_menu_page( 
		ADMIN_PAGE_TITLE, 
		ADMIN_MENU_TITLE, 
		$the_cap, 
		ADMIN_SLUG,
		'ds_theme_admin_page', 
		ADMIN_ICON_URL, 
		ADMIN_MENU_POSITION 
	);

  return; 
  
	$subpages = array(
		array(
			'parent_page'	=> ADMIN_SLUG,
			'page_title'	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'capability'	=> $the_cap,
			'menu_slug'		=> ADMIN_SLUG . '-settings',
			'callback'		=> 'theme_admin_subpage'
		)
	);

	$args = array(
		'menu_slug' 	=> ADMIN_SLUG,
		'capability'	=> $the_cap
	);

}

function ds_theme_admin_page(){
  if( isset( $_REQUEST['page'] ) ){
		$ui_page = "" . preg_replace( "/\-/", "_", $_REQUEST['page'] ) . ".php";
		// ThemeUtil::mpuke( dirname(__FILE__) . '/' . $ui_page );
		require dirname(__FILE__) . '/' . $ui_page;

	}
}

function ds_theme_admin_subpage(){
  if( isset( $_REQUEST['page'] ) ){

		$ui_page = "" . preg_replace( "/\-/", "_", $_REQUEST['page'] ) . ".php";
		require $ui_page;

	}
}
add_action( 'admin_menu', 'ds_create_admin_menus');

function ds_get_therm_class(){
	$goal = 150000;
	$donations = get_option(THEME_NICE_NAME . "_top_banner_text", '');
	if($donations >= $goal){ return 'thermometer-12'; }
	
	$step = 0.083333;
	$therm = floor(($donations / $goal) / $step);
	
	return 'thermometer-' . $therm;
}

function ds_get_excerpt( $post_id ) {
  $post = get_post( $post_id );
  $excerpt = $post->post_excerpt;
  return ( post_password_required($post) ? false : 
     apply_filters( 'get_the_excerpt', $excerpt ) );
}

function ds_get_content_by_slug( $the_slug ) {
  $post = ds_get_post_by_slug( $the_slug );
  $content = trim($post->post_content);
 
  if(""==$content) return "";

  return ( post_password_required($post) ? false : 
     apply_filters( 'get_the_content', $content ) );
}

function ds_get_excerpt_by_slug( $the_slug ) {
  $post = ds_get_post_by_slug( $the_slug );
  $excerpt = trim($post->post_excerpt);
 
  if(""==$excerpt) return "";

  return ( post_password_required($post) ? false : 
     apply_filters( 'get_the_excerpt', $excerpt ) );
}

function ds_get_title_by_slug( $the_slug ) {
  $post = ds_get_post_by_slug( $the_slug );
  $title = $post->post_title;
  return $title;
}


function ds_get_permalink_by_slug( $the_slug ) {
  $post = ds_get_post_by_slug( $the_slug );
  $permalink = get_permalink($post->ID);
  return $permalink;
}

function ds_get_post_by_slug( $the_slug ){

	$args=array(
	  'name' => $the_slug,
	   // 'post_type' => 'post',
	  'post_type' => 'give-now-post',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$the_posts = get_posts($args);
	if( $the_posts ) {
		return $the_posts[0];
	}
}

function ds_get_post_id_by_slug( $the_slug ){

	$args=array(
	  'name' => $the_slug,
	 // 'post_type' => 'post',
	  'post_type' => 'give-now-post',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$the_posts = get_posts($args);
	if( $the_posts ) {
		return $the_posts[0]->ID;
	}
}

function ds_body_modifier(){
  if(is_front_page()){
    echo ' front-page';
  }
  else{
    if(is_single()){
      echo ' single ';
    }
    if(is_page()){
      echo ' page ';
    }
  }
}

function _register_scripts( $scripts ){
	foreach( $scripts as $script ){
		if( $script['deregister'] )
			wp_deregister_script( $script['name'] );
		wp_register_script( $script['name'], $script['src'], $script['deps'], $script['version'], $script['footer'] );
		wp_enqueue_script( $script['name'] );
	}
}

function ds_register_admin_scripts() {
	
	$scripts[] = array(
      'name'      	=> 'admin-js',
      'src'     	=> get_bloginfo( 'stylesheet_directory' ) . '/js/admin.js',
      'deregister'  => FALSE,
      'deps'      	=> FALSE,
      'version'   	=> '1.0',
      'footer'    	=> TRUE
    );
	
	_register_scripts( $scripts );
}

function _register_styles( $styles ){
	foreach( $styles as $style ){
		if( $style['deregister'] )
			wp_deregister_style( $style['name'] );
		wp_enqueue_style( 
			$style['name'], $style['src'], $style['deps'], $style['version'], $style['media'] 
		);
	}
}

function ds_register_admin_styles(){
	$styles[] =	array(
  		'name'			  => 'admin-css',
  		'src'			    => get_bloginfo( 'stylesheet_directory' ) . '/css/admin.css',
  		'deregister'  => FALSE,
  		'deps'			  => FALSE,
  		'version'		  => THEME_VERSION,
  		'media'			  => 'all'
  	);

    _register_styles( $styles );
}

function ds_register_scripts() {
	
}

function ds_register_styles() {
	
}

function ds_popup_body_class(){
	global $post;
	echo ' body-' . $post->post_name . ' ';
}

function ds_popup_class(){
	global $post;
	echo ' main-' . $post->post_name . ' ';
}

if( is_admin() ){
	add_action( 'admin_init', 	'ds_register_admin_scripts');
	add_action( 'admin_init', 	'ds_register_admin_styles');
}
else{
	// add_action( 'init', 				  'ds_register_scripts');
	// add_action( 'wp_print_styles', 	      'ds_register_styles');
}

  // TO DO: turn off for production
  ini_set( 'display_errors', 1 );

  class ThemeOptions {

  	public static function get_blank_options(){

  		return array (
  			array( 
  				"name" => "General Theme Options",
  				"type" => "page_heading"
  			),

  			array( 
  				"type" => "page_footing",
  				"show_save"	=> FALSE
  			)

  		);
  	}
    
  	public static function get_options(){
      $the_options = array (
    		array( 
    			"name" => "General Theme Options",
    			"type" => "page_heading"
    		),
        array(
         "name" => "Funds Raised",
         "type" => "start_section",
         "show_save" => FALSE,
         "desc"  => "Enter total funds raised here"
        ),
        array( 
  			"name" => "Total Raised",
  				"desc" => "This value represents the total funds raised. (enter numbers only)",
  				"id" => THEME_NICE_NAME . "_top_banner_text",
  				"type" => "text",
  				"style"	=> "",
  				"std" => "" 
  			),
        array( 
         "type" => "end_section",
         "show_save" => TRUE
        ),
  		);
  		return $the_options;
  	}

/* ****************************** */

  	public static function show_option_form( $args ){
  		extract( $args );
  		if( method_exists( 'ThemeOptions', $method ) ){ 
  		  $nonce = wp_create_nonce( NONCE_STRING );
        
        // fetches out the option data for form generation
  			$the_options = call_user_func( array( 'ThemeOptions', $method ) );
  			?>
  			<form action="" method="post">
  			  <input type="hidden" name="wp_meta_box_nonce" value="<?php echo $nonce; ?>" />
  				<input type="hidden" name="theme_save_action" value="<?php echo $action; ?>" />
  			<?php
  				// TO DO, check nonce
  				if( is_array( $the_options ) ){
    				foreach ( $the_options as $option ) {
    				  // determine the render function for the admin form element
    					$f = 'admin_' . $option['type'] . '_render';
    					// call the form render function based on the option type, if the function exists
    					if( method_exists( 'ThemeAdminForm', $f ) ){ 
    						call_user_func( array( 'ThemeAdminForm', $f ), $option );
    					}
    				} 
    			}
    			else{
    			  $option['error_msg'] ='Error generating option form.';
    			  call_user_func( array( 'ThemeAdminForm', 'admin_render_err' ), $option );
    			}
  			?>
  			</form>
  		<?php
  		}
  	}

  	public static function save_options( $args ){
  		extract( $args );

  		if( method_exists( 'ThemeOptions', $method ) ){ 

  			$the_options = call_user_func( array( 'ThemeOptions', $method ) ); 
  			// ThemeUtil::mpuke( $the_options ); return;
  			if( count( $_REQUEST ) > 0 ) {
  				// ThemeUtil::mpuke( $_REQUEST );
  				$saving_roles = FALSE;
  				if ( $_REQUEST['theme_save_action'] == $action ) {
  					$save_roles = array();

  					foreach ( $the_options as $option ) {
  						$posted_val = $_REQUEST[ $option['id'] ];
  						if( !empty( $_REQUEST[ $option['id'] ] ) ) { 
                
                // currently unused, for when role setting is setup/complete in the admin
  						  if( FALSE && $option['is_role'] ){
  						      ThemeUtil::mpuke( $posted_val );
  						      ThemeUtil::mpuke( $option );
                    global $wp_roles;
                    // if( uc_first($option['is_role']) == $wp_roles->role_names[$option['is_role']] ) continue;
                    $roles = array(); 
                    $default_roles = array(
                     'administrator', 'editor', 'author', 'contributor', 'subscriber'
                    );

                    foreach( $wp_roles->role_names as $role=>$name ){
                      if( !in_array( $role, $default_roles ) )
                        $roles[$role] = $name;
                    }
                   // $saving_roles = TRUE;   

                   // $val = $_REQUEST[ $option['id'] ];
     							//if( is_array( $val ) )
     								//foreach( $val as $k=>$v )
     									//if( !"" == $v )
     							 // echo $option['id'] . " = " . print_r( $val, 1 ) . "<br/>";

     							 // ThemeUtil::mpuke( $option );

     							 // ThemeUtil::mpuke( $_REQUEST[ $option['id'] ] );

  						  }
  						  else {
  						    // update the option name with a new value
    							$val = $_REQUEST[ $option['id'] ];
    							if( is_array( $val ) )
    								foreach( $val as $k=>$v )
    									if( "" == $v )
    										unset($val[$k]);
    							update_option( $option['id'], $val  ); 
  							}
  						} 
  						else{
  						  // clear out/delete and emoty option
  							delete_option( $option['id'] ); 
  						}
  					}

            if( $saving_roles ){
              // ThemeUtil::mpuke( $save_roles );
              //              ThemeUtil::mpuke( $roles );
              //              $uroles = array_intersect_key( $roles, $save_roles );
              //              ThemeUtil::mpuke( $uroles );
            }
  				}
  			}

  		}
  	}

  } // END class 

  // ==============================

  /**
   * ThemeAdminForm
   *
   * @package default
   * @author Michael Reed
   **/
  class ThemeAdminForm{

    public static function admin_render_err( $value ){
      ?>
    		<div class="admin-page-heading">
    			<?php if( !empty($value['name']) ): ?>
    				<h3><?php echo $value['name']; ?></h3>
    			<?php endif; ?>
    		</div>
    		<div class="custom-admin">
    		  <p class="alert"><?php echo $value['error_msg']; ?></p>
      		<div class="admin-page-footing">
      			<div class="clearfix"></div>
      		</div>
      		<div class="clearfix"></div>
    		</div> <!-- /.custom-admin -->
      <?php
    }
    
  	public static function admin_hidden_render( $value ){
  		?>

  		 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" 
  				type="<?php echo $value['type']; ?>" value="<?php echo $value['value']; ?>" />

  		<?php
  	}

  	public static function admin_text_render( $value ){
  		?>
  		<div class="admin-input admin-text">
  			<?php if( !empty( $value['name'] ) ): ?>
  			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
  			<?php endif; ?>
  		 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"
  				<?php 
    				if( !empty( $value['style'] ) ):
    					echo ' style="' . $value['style'] . '" ';
    				else:
    			?>
  				style="max-width:90%"
  				<?php endif; ?>
  				type="<?php echo $value['type']; ?>" value="<?php
  				 	if( !empty( $value['value'] ) ){
  						echo $value['value']; 
  					}
  					else{
  						if ( get_option( $value['id'] ) != "") { 
  								echo @stripslashes( get_option( $value['id'] )  ); 
  						} 
  						else { 
  							echo $value['std']; 
  						} 
  					}
  				?>" class="parent_<?php echo $value['parent_id']; ?>"
  			/>
  		 	<div class="admin-desc">
  				<?php echo $value['desc']; ?>
  			</div>
  			<div class="clearfix"></div>
  		 </div>
  		<?php
  	}

  	public static function admin_text_addmore_render( $value ){
    	$fields = get_option( $value['id'] );
    	?>
    	<div class="admin-input admin-text">
    	  
    		<?php if( !empty( $value['name'] ) ): ?>
    		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    		<?php endif; ?>

    		<?php if( is_array( $fields ) && count( $fields ) ): ?>

    			<?php foreach( $fields as $k=>$v ): ?>
    				<input name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>"
    					style="max-width:90%" class="add-more"
    					type="text" value="<?php echo @stripslashes( $v ); ?>"
    				/>
    			<?php endforeach; ?>

    		<?php else: ?>

    			<input name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>"
    				style="max-width:90%" class="add-more"
    				type="text" value="<?php
    					if ( get_option( $value['id'] ) != "") { 
    						echo @stripslashes( get_option( $value['id'] )  ); 
    					} 
    					else { 
    						echo $value['std']; 
    					}
    					// window.location.hash = ui.tab.hash;
    				?>"
    			/>
    		<?php endif; ?>
    		<a href="#" class="remove-one-button ui-state-default ui-corner-all">-</a>
    		<a href="#" class="add-more-button ui-state-default ui-corner-all">+</a>
    	 	<div class="admin-desc">
    			<?php echo $value['desc']; ?>
    		</div>
    		<div class="clearfix"></div>
    	</div>
    	<?php
    }

  	public static function admin_textarea_render( $value ){
  		?>
  		<div class="admin-input admin-textarea">
  			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
  		 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
  			<?php 
  				if( !empty( $value['style'] ) )
  					echo ' style="' . $value['style'] . '" ';
  			?>
  			><?php 
  				if ( get_option( $value['id'] ) != "") {
  					echo @stripslashes(get_option( $value['id']) ); 
  				} 
  				else { 
  					echo $value['std']; 
  				} 
  			?></textarea>
  		 	<div class="admin-desc">
  				<?php echo $value['desc']; ?>
  			</div>
  			<div class="clearfix"></div>
  		 </div>
  		<?php
  	}

  	public static function admin_select_render( $value ){
  		?>
  		<div class="admin-input admin-select">
  			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

  			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
  				<?php foreach ($value['options'] as $option) { ?>
  					<option <?php 
  						if (get_option( $value['id'] ) == $option) { 
  							echo 'selected="selected"'; 
  						} ?>
  					><?php echo $option; ?></option>
  				<?php } ?>
  			</select>
  			<div class="admin-desc">
  				<?php echo $value['desc']; ?>
  			</div>
  			<div class="clearfix"></div>
  		</div>
  		<?php
  	}

  	public static function admin_checkbox_render( $value ){
  		?>
  		<div class="admin-input admin-checkbox">
  			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
  			<div class="admin-inner admin-radio">
  				<?php 
  					foreach( $value['options'] as $val=>$text ){
  						if (get_option( $value['id'] ) == $val) { 
  							$checked = "checked=\"checked\""; 
  						}
  						else {
  							$checked = "";
  						}
  						?>
  							<input type="checkbox" name="<?php echo $value['id']; ?>" 
  								id="<?php echo $value['id']; ?>" value="<?php echo $val; ?>" <?php echo $checked; ?> 
  							/> <?php echo $text; ?><br/>
  						<?php
  					}

  				?>
  			</div>
  			<div class="admin-desc">
  				<?php echo $value['desc']; ?>
  			</div>
  			<div class="clearfix"></div>
  		 </div>
  		<?php
  	}

  	public static function admin_radio_render( $value ){
  		?>

  		<div class="admin-input">
  			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label><br/>
  			<div class="admin-inner admin-radio">
  				<?php 
  					foreach( $value['options'] as $val=>$text ){
  						if (get_option( $value['id'] ) == $val) { 
  							$checked = "checked=\"checked\""; 
  						}
  						else {
  							$checked = "";
  						}
  						?>
  							<input type="radio" name="<?php echo $value['id']; ?>" 
  								id="<?php echo $value['id']; ?>" value="<?php echo $val; ?>" <?php echo $checked; ?> 
  							/> <?php echo $text; ?><br/>
  						<?php
  					}

  				?>
  			</div>
  			<div class="admin-desc">
  				<?php echo $value['desc']; ?>
  			</div>
  			<div class="clearfix"></div>
  			<?php if( !empty( $value['show_hide'] ) ): ?>
  			<script>
  				//(function($) {
  					jQuery("input[name='<?php echo $value['id']; ?>']").click(function(){
  						if( parseInt(jQuery(this).val() ) )
  							jQuery( "#<?php echo $value['show_hide']; ?>" ).fadeIn();
  						else
  							jQuery( "#<?php echo $value['show_hide']; ?>" ).fadeOut();
  					});
  				// })(jQuery);
  			</script>
  			<?php endif; ?>
  		 </div>
  		<?php
  	}

  	
	   public static function admin_file_upload_render( $value ){
	     ?>
       <div class="admin-input">
       
	         <div class="postarea postimages">
         		<h2><?php echo $value['name']; ?>&nbsp;<img style="width:16px;height:16px;display:none;" 
         		  id="img-loading" src="<?php echo THEME_IMG_URL . '/loading.gif'; ?>" /></h2>
         		<div id="file-uploader">       
         		    <noscript>          
         		        <p>Please enable JavaScript to use file uploader.</p>
         		        <!-- or put a simple form for upload here -->
         		    </noscript>         
         			<div class="clearfix"></div>
         		</div>
         		<div class="clearfix"></div>
         		<div id="<?php echo $value['id']; ?>_images">

         			<div class="clearfix"></div>
         		</div>
         	</div>	
         	<div class="admin-desc">
    				<?php echo $value['desc']; ?>
    			</div>
      </div>   	
     	<div class="clearfix"></div>
	     <?php // call_user_func( array( SYS_PREFIX . 'ImageMgr', 'gen_uploader_js' ),  $value ); ?>

	     <?php
	   }
	   

  	public static function admin_page_heading_render( $value ){
  		?>
  		<div class="admin-page-heading">
  			<?php if( !empty($value['name']) ): ?>
  				<h3><?php echo $value['name']; ?></h3>
  			<?php endif; ?>
  		</div>
  		<div class="custom-admin">
  		<?php
  	}

  	public static function admin_page_footing_render( $value ){
  		?>
  			<div class="admin-page-footing">
  				<?php if( empty($value['show_save']) ): ?>
  					<span class="submit">
  						<input name="save" type="submit" value="Save All" class="ui-state-default ui-corner-all" />
  					</span>
  				<?php endif; ?>
  				<div class="clearfix"></div>
  			</div>
  		</div> <!-- /.custom-admin -->
  		<?php
  	}

  	public static function admin_start_section_render( $value ){
  		?>
  		<div class="custom-section">
  			<div class="admin-title">
  				<?php if( !empty($value['name']) ): ?>
  					<strong><?php echo $value['name']; ?></strong>
  				<?php endif; ?>	

  				<?php if( $value['show_save'] ): ?>
  					<span class="submit">
  					<input name="<?php echo $value['id']; ?>_save" id="<?php echo $value['id']; ?>_save" 
  						type="submit" value="Save changes"  class="ui-state-default ui-corner-all" />
  					</span>
  				<?php endif; ?>

  				<div class="clearfix"></div>
  			</div>

  		<?php
  	}

  	public static function admin_start_subsection_render( $value ){
  		?>
  		<div class="admin-subtitle" style="display:<?php echo $value['display']; ?>"
  			id="<?php echo $value['id']; ?>"
  		>
  			<?php if( !empty($value['name']) ): ?>
  				<strong><?php echo $value['name']; ?></strong>
  			<?php endif; ?>	
  			<div class="clearfix"></div>
  		<?php
  	}

  	public static function admin_end_subsection_render( $value ){
  		?>
  		</div>
  		<?php
  	}

  	public static function admin_start_subnote_render( $value ){
  		?>
  		<!-- <div class="custom-section"> -->
  			<div class="admin-subnote">
  				<?php if( !empty($value['desc']) ): ?>
  					<div class="admin-desc">
  						<?php echo $value['desc']; ?>
  					</div>
  					<div class="clearfix"></div>
  				<?php endif; ?>	
  				<div class="clearfix"></div>
  			</div>

  		<?php
  	}

  	public static function admin_end_section_render( $value ){
  		?>
  			<div class="custom-section-end">
  				<?php if( $value['show_save'] ): ?>
  					<span class="submit">
  					<input name="<?php echo $value['id']; ?>_save" id="<?php echo $value['id']; ?>_save" 
  						type="submit" value="Save changes" class="ui-state-default ui-corner-all" />
  					</span>
  				<?php endif; ?>
  				<div class="clearfix"></div>
  			</div><!-- /.custom-section-end -->
  		</div><!--  custom-section -->
  		<?php
  	}

  } // END class
  
/* Analytics tracking */

add_filter("gform_submit_button_1", "add_conversion_tracking_code", 10, 2);
function add_conversion_tracking_code($button, $form) {
    $dom = new DOMDocument();
    $dom->loadHTML($button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $input->setAttribute("onClick","_gaq.push(['_trackEvent', 'Donation', 'Submit Button', 'Clicked',, false]);");
    return $dom->saveHtml();
}

/* New Sidebars */

   register_sidebar(array(
       'name'          => 'Single Post Sidebar',
      'id'            => 'sidebar-single',
      'desc'          => 'Extra sidebar for individual posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
   ));
   
   register_sidebar(array(
       'name'          => 'Secondary Sidebar',
      'id'            => 'sidebar-below',
      'desc'          => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
   ));
   
      register_sidebar(array(
       'name'          => 'Social Media Link Sidebar',
      'id'            => 'sidebar-social',
      'desc'          => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
   ));
   
       register_sidebar(array(
       'name'          => 'Give Now Sidebar',
      'id'            => 'sidebar-give-now',
      'desc'          => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
   ));
   
 


/*  end functions */