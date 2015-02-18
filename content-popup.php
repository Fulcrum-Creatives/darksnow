
<div id="main-popup" class="popup">
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   	<div id="popup-title"><?php the_title(); ?></div>
   	  <div class="popup-content">
   		  <?php the_content(); ?>
   		  <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'darksnow' ) . '</span>', 'after' => '</div>' ) ); ?>
   	</div><!-- .entry-content -->
   	<footer class="entry-meta">
   	  <?php edit_post_link( __( 'Edit', 'darksnow' ), '<span class="edit-link">', '</span>' ); ?>
   	</footer>
   </article><!-- #post-<?php the_ID(); ?> -->
 </div>

