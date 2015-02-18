    	</div><!-- id=main -->
		</div><!-- id=main-centered -->
	</div><!-- id=main-wrapper -->


<?php if(is_page('give-now')) { ?> 

	<div id="footer-give-now-page">

<?php } else { ?>
	
	<div id="footer-sub">

<?php }  ?>

    
    <!-- <div id="footer-wrapper" class="centered <?php ds_body_modifier(); ?>">
  		<div id="footer" class="centered-within">
        <div id="footer-social">
        <div class="footer-text">
        Follow Us<br />On Our Journey
        </div>
        <a href="https://twitter.com/darksnowproject" target="_blank">
        <img class="twitter-icon" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/button_twitter.png" />
        </a>
        <a href="https://www.facebook.com/DarkSnowProject" target="_blank">
        <img class="fb-icon" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/button_facebook.png" />
        </a>
        </div>
        <div id="footer-percent">
		<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/footer-plane.png" />
        </div>
  		</div>
  	</div> -->
  	
  	 <div id="give-footer-wrapper" class="centered">
  	 <div id="give-footer">
  	 
  	  <a title="give-form" id="give-now"></a>
  	   <div id="givenow-goal">
	 	 <div class="givenow-top">
	  	Support Dark<br>Snow Project
	  	</div><!--
	  	<div class="givenow-bottom">
	  	<?php $donations = get_option(THEME_NICE_NAME . "_top_banner_text", '');
$formatted_donations = number_format($donations);
 ?>
	  	Donations: $<?php echo $formatted_donations ?>
	  	</div> -->
	  	
  	  </div> 
  	  <div class="give-options">
<?php
$my_postid = 204;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
?>
  	  </div>
  	  
  	  <div class="give-form">
  	  <?php gravity_form(1,false); ?>
  	  </div>
  	  <div class="give-form-extra">
  	  Upon form completion you will be forwarded to PayPal to complete your transaction <b>with no need for a PayPal account.</b>
  	  </div>
  	  <div class="clear"></div>
  	 </div>
     </div>
     <div id="contact-wrapper" class="centered">
     <div id="contact" class="centered-within">
     <div class="contact_left">
     <b>Questions and comments on the Dark Snow Project should be directed to:</b><br />
Jason E. Box, Professor<br>
Geological Survey of Denmark and Greenland (GEUS)<br>
Øster Voldgade 10, 1350 København, Denmark<br>
mobile: +45 60 12 41 57<br>
office: +45 41 14 54 28<br>
Email: jbox.greenland@gmail.com<br>
     </div>
     <div class="contact_right">
     <b>All donations are tax deductible via our charitable foundation:</b><br>501c(3) EIN: 80-0621720<br><a href="http://earthinsight.org/" target="_blank">Earth Insight Foundation Inc.</a><br>
     511 Franklin Street<br>
Wausau, WI  54403<br>
Contact: Krista Salas<br>
Phone: 715-571-5689<br>
Email:  ksalas@earthinsight.org<br>
Website:  www.earthinsight.org<br>
     </div>
     <div class="clear"></div>
     <div class="copyright">
  	  All content &#169;2012 Dark Snow Project
  	  </div>
     
     
  	   <div class="clear"></div>

     </div>
     </div>  
  	 </div>
  	 </div>


  	
<?php // if(is_front_page()): ?>

  <?php // get_template_part( 'footer', 'frontpage' ); ?>

<?php // else: ?>

  <?php // get_template_part( 'footer', 'subpage' ); ?>

<?php // endif; ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-389037-24']);
  _gaq.push(['_setDomainName', 'darksnowproject.org']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	
<?php wp_footer(); ?>

</body>
</html>