
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    		<div id="big-quote" class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    		<div class="post-meta">
    		<div class="date"><?php the_date(); ?></div> <div class="time"><?php the_time('g:i a'); ?></div>
    		<div class="author"><?php the_author_posts_link(); ?> </div>
    		<div class="cats">Categorized: <?php the_category(', '); ?></div>
    		</div>
    		
    		
    	  <div class="entry-content">
    		  <?php the_content(); ?>
    		  <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'darksnow' ) . '</span>', 'after' => '</div>' ) ); ?>
    	</div><!-- .entry-content -->
    	
    	
    	<footer class="entry-meta">
    	  <?php edit_post_link( __( 'Edit', 'darksnow' ), '<span class="edit-link">', '</span>' ); ?>
    	</footer>
    	
    	
    </article><!-- #post-<?php the_ID(); ?> -->
