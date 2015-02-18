
<?php
/**
 * @package WordPress
 * @subpackage dark_snow
 *
 */
$format = get_post_format();

get_header(); ?>

<?php get_template_part( 'content', 'header'); ?>


<div id="main-overlay-wrapper" class="single">
	<div id="main-overlay" class="single">
	

		<div id="left_col"> 

		<div id="primary">
			<div id="post-content">
			

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', $part ); ?>
					
						  <div class="social-share">
    		 <div class="button"> 
    		 <div class="fb-like" data-href=" <?php the_permalink(); ?> " data-width="100" data-layout="button_count" data-show-faces="false" data-send="true"></div>
    		 </div>
    		  <div class="button"> 
    	<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-annotation="bubble"></div>

<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
    		  </div>
<div class="button"> 
<a href="https://twitter.com/share" class="twitter-share-button" data-via="darksnowproject" data-related="darksnowproject">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
    		  
    		  
    		  </div>

					<?php  comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		</div> <!-- #left_col -->
			<?php  get_sidebar(); ?>			
	</div>
</div>


<?php get_footer(); ?>

