<?php get_template_part( 'content', 'header'); ?>

<div id="main-overlay-wrapper" class="subpage">
	<div id="main-overlay" class="single">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    		<div id="big-quote"><?php the_title(); ?></div>
    	  <div class="entry-content">
    		  <?php the_content(); ?>
    		  <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'darksnow' ) . '</span>', 'after' => '</div>' ) ); ?>
    	</div><!-- .entry-content -->
    	<footer class="entry-meta">
    	  <?php edit_post_link( __( 'Edit', 'darksnow' ), '<span class="edit-link">', '</span>' ); ?>
    	</footer>
    </article><!-- #post-<?php the_ID(); ?> -->
  </div>
</div>

