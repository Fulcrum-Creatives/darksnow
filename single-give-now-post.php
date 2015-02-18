<?php
$is_cb = $_REQUEST['cb'] == "true";

$cb = "";
$part = 'single';

if($is_cb==1){
	$cb="popup";
	$part = "popup";
}

get_header($cb); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', $part ); ?>

					<?php // comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer($cb); ?>