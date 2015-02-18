

<div id="logo-outer">
	<div id="logo-wrapper">
		<div id="logo">
			<a href="/" id="nav-logo"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/<?php if(is_page('give-now')) { ?>dark_snow_wordmark.png<?php } else { ?>dark_snow_wordmark_black.png<?php }  ?>" alt="logo" /></a>
			
			
		</div>
		<div id="menu">
		
		 <?php if(is_page('give-now')) { ?> 
		 	<a class="no-click" href="/" id="nav-about">Blog</a>
			<a class="no-click" href="/expedition" id="nav-expedition">Expedition</a>
			<a class="no-click" href="/in-the-news/" id="nav-in-the-news">In The News</a>
			<a class="no-click" href="/give-now/" id="nav-givenow">Give Now</a>
			
			<?php } else { ?>
			
			<!-- <a class="no-click" href="/give-now/" id="nav-about">Expedition 2013</a> -->
			<a class="no-click" href="#give-now" id="nav-givenow">Give Now</a>
			<a class="no-click" href="/category/project-updates/" id="nav-expedition">Project Updates</a>
			<a class="no-click" href="/in-the-news/" id="nav-in-the-news">In The News</a>
<?php }  ?>

		</div>	
	</div>
	<div class="clear"></div>
</div>

