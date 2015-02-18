<?php
/**
 * @package WordPress
 * @subpackage dark_snow
 *
 */
$format = get_post_format();

get_header(); ?>

		<div id="primary">
		
		
			<div id="content" role="main">
			
			<?php get_template_part( 'content', 'header'); ?>


			

			
<div id="main-overlay-wrapper" class="front">


<div id="main-overlay" class="single">


			<div id="left_col"> 
			
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php // darksnow_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'darksnow' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'darksnow' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
			
			</div>
			
			<?php  get_sidebar(); ?>
			
			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>