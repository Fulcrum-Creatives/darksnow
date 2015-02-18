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
			


<div id="main-overlay-wrapper" class="category single">


<div id="main-overlay" class="single">


			<div id="left_col"> 
			
			<?php if ( have_posts() ) : ?>
			
			<?php if (is_author()) :  ?>
			
			<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
			
			<header class="page-header">
					<h1 class="page-title author">Posts by: <?php echo $curauth->display_name; ?></h1>
					<div class="author-bio"><p><?php echo $curauth->description; ?></p></div>
				</header>
				
			<?php elseif( is_category() ) :	?>
			
			
			<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>
				
				<?php else :	?>
				
				
				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
						<?php endif; ?>
					</h1>
				</header>
				
				<? endif ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>


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
			
			<?php twentyeleven_content_nav( 'nav-below' ); ?>
			
			</div>
			
			<?php  get_sidebar(); ?>
			
			</div><!-- #content -->
		</div><!-- #primary -->
	   <div class="clear"></div>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>