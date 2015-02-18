<?php $donations = get_option(THEME_NICE_NAME . "_top_banner_text", '');
$formatted_donations = number_format($donations);
 ?>
	<?php if("yes"==$_REQUEST['testing']):?>

	<?php endif; ?>

<div id="main-centered" class="main-centered give-now">
	<?php get_template_part( 'content', 'header'); ?>
	<!-- <div id="thermometer-wrapper">
	  <div id="thermometer" class="<?php echo ds_get_therm_class(); ?>"></div>
	  <div id="thermometer-footer">
	  <div id="thermometer-level">
	  $<?php echo $formatted_donations ?>
	  </div>
	    <div id="thermometer-give-button">
			  <a class="no-click" href="/give-now/" id="nav-givenow">
			    <div class="give-small">
	    	We Need Your Help!
	    	</div>
	    	<div class="give-big">
	    	Give Now
	    	</div>
			  </a>
			</div>
	  </div>
	</div> -->
	
	<?php  get_template_part( 'content', 'cockpit'); ?>
	<?php  get_template_part( 'content', 'gauges'); ?>

</div>	

<?php get_template_part( 'content', 'bigquote'); ?>


<div class="main-centered">
<div id="left_bg" class="scrollblock">
	<div id="gcont" >
		<div id="todays-action-wrapper">
			<div id="todays-action">
				The first-ever Greenland expedition relying on crowd<br>
source funding aims to answer the 'burning question':<br>
How much does wildfire and industrial soot darken<br>the ice, increasing melt?</div>
		</div>
		<div id="gcont-markers">
			<?php
			    $slug = 'our-journey-begins';
			    ds_title_link($slug);
			  ?>  
		
			 <?php
				 $slug = 'our-research-is-critical';
				 ds_title_link($slug);
			?>
		
			<?php
				 $slug = 'the-problem';
				 ds_title_link($slug);
			?>
			
			<?php
				$slug = 'call-for-funding';
				ds_title_link($slug);
			?>
			
			
			
					<?php
				$slug = 'supporters';
				ds_title_link($slug);
			?>

			<?php
				 $slug = 'melting-of-greenland';
				 ds_title_link($slug);
			?>
		</div>
		<div class="clear"></div>
	</div>
		
			<div id="cloud1" class="cloud"></div>
			<div id="cloud2" class="cloud"></div>
		
	</div>
	<div class="clear"></div>
	<div id="wcont"  class="scrollblock">
	
			<?php
				$slug = 'sampling-greenland-the-dark-snow-project';
				ds_title_link($slug);
			?>
	
		<?php
			$slug = 'dark-snow-expedition-team';
			ds_title_link($slug);
		?>
        
        	<?php
			$slug = 'in-the-news';
			ds_title_link($slug);
		?>
		
		<?php
			$slug = 'expedition-plan-2013';
			ds_title_link($slug);
		?>
	
		<?php
			$slug = 'intense-melting';
			ds_title_link($slug);
		?>
        
<div id="intense-melting-2" class="title-overlay" >
<div class="marker-text">
<a href="http://darksnowproject.org/wp-content/uploads/2013/01/intense-melt.jpg" rel="lightbox" title="At this part of the ice sheet, where the loss of winter snow during each melt season exposes impurity-rich bare ice, the surface reflectivity drops from 85% to 30%.">
<img src="http://darksnowproject.org/wp-content/uploads/2013/01/intense-melt-150x150.jpg" />
</a>
</div>
</div>
        
<div id="central-southern-1" class="title-overlay" >
<div class="marker-text">
<a href="http://darksnowproject.org/wp-content/uploads/2013/01/central_1.jpg" rel="lightbox[central]" title="Intense Melting">
<img src="http://darksnowproject.org/wp-content/uploads/2013/01/central_1-150x150.jpg" />
</a>
</div>
</div>

<div id="central-southern-2" class="title-overlay" >
<div class="marker-text">
<a href="http://darksnowproject.org/wp-content/uploads/2013/01/central_2.jpg" rel="lightbox[central]" title="Intense Melting">
<img src="http://darksnowproject.org/wp-content/uploads/2013/01/central_2-150x150.jpg" />
</a>
</div>
</div>

		<?php
			$slug = 'central-southern';
			ds_title_link($slug);
		?>
		
		
			<div id="cloud3" class="cloud"></div>
		
		
<div id="airport-2" class="title-overlay">
<div class="marker-image">
<img class="marker airport" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/plane-sm.png"></div>
<div class="marker-text">
Kangerlussuaq
</div>
<!--div id="airport-2-excerpt" class="marker-excerpt" style="display: none;">
Kangerlussuaq is the main airport hum for Greenland, located in the west, extremely arid location.
</div-->
<div class="clear"></div>
</div>

<!--div id="sample-site-1" class="title-overlay">
<div class="marker-image">
<img class="marker basic" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/marker-basic.png">
</div>
<div class="marker-text">
Sample Site 1
</div>
<div class="clear"></div>
</div>

<div id="sample-site-2" class="title-overlay">
<div class="marker-image">
<img class="marker basic" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/marker-basic.png">
</div>
<div class="marker-text">
Sample Site 2
</div>
<div class="clear"></div>
</div-->

<!--div id="map-flag">
<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/map-flag.png">
</div-->


<div id="map-compass">
<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/map-compass.png">
</div>
		
		
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
	
<?php
function ds_title_link($slug, $parallax=false){ 
	$title = ds_get_title_by_slug($slug);
	$post_excerpt = trim(ds_get_excerpt_by_slug( $slug ));
	$is_hidden = (""==$post_excerpt);
  ?>
  <!--div id="<?php echo $slug; ?>-wrapper"-->
  	<div id="<?php echo $slug; ?>" class="title-overlay <?php 
		if($is_hidden){ echo ' hidden '; } 
		if($parallax) { echo ' parallax '; }
		?>">
	    <!--div class="marker-image">
	      <a href="<?php echo ds_get_permalink_by_slug($slug); ?>?cb=true" rel="<?php echo $width; ?>x<?php echo $height; ?>" class="marker-link"><img 
	        src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/marker-basic.png" class="marker basic" /></a>
	    </div--><!-- marker-image -->
	    
	        <div class="marker-image">
	      <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/marker-basic.png" class="marker basic" />
	    </div><!-- marker-image -->
	    
	    
	    <div class="marker-text"><a class="marker-text-link" title="<?php echo $title; ?>" href="<?php echo ds_get_permalink_by_slug($slug); ?>" ><?php
		      $post_title = ds_get_title_by_slug( $slug );
		      echo $post_title;
	      ?></a>
	    </div><!-- marker-text -->
		<div id="<?php echo $slug; ?>-marker-excerpt" class="marker-excerpt">
			<?php
			$post_content = ds_get_content_by_slug( $slug );
			$post_excerpt = ds_get_excerpt_by_slug( $slug );
		    echo $post_excerpt;
			if(""!=$post_content):
			?>
			<div class="marker-readmore"><a class="readmore-link" href="<?php echo ds_get_permalink_by_slug($slug); ?>?cb=true">Read More</a></div>
			<?php endif; ?>
		</div>
	    <div class="clear"></div>
    </div>
  <!--/div-->
  <?php
  }
  
  
 ?>
	<div id="plane-wrapper">
  		<!-- <div id="red-plane"></div> -->
		<!-- <div id="anim-plane"></div> -->
		<canvas id="anim-plane" width="1600" height="300"></canvas>
	</div>
	
 
}
?>