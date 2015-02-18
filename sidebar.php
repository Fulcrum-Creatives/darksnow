<div id="right_col">

<?php if ( is_active_sidebar( 'sidebar-give-now' ) ) : ?>
					<div id="give-now-sidebar">
						<ul id="sidebar">
							<?php dynamic_sidebar( 'sidebar-give-now' ); ?>
						</ul>
					</div>
					<?php endif; ?>


			
			<?php
if ( is_home() ) {
    // This is a homepage
} else { ?>
			
			<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>
			<div id="right-sidebar">
	<ul id="sidebar">
		<?php dynamic_sidebar( 'sidebar-single' ); ?>
	</ul>
			</div>
<?php endif; ?>
<?php
}
?>
			
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div id="right-sidebar">
						<ul id="sidebar">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</ul>
					</div>
					<?php endif; ?>
		
		
					<?php if ( is_active_sidebar( 'sidebar-social' ) ) : ?>
								<div id="social-media-links">
						<ul id="sidebar">
							<?php dynamic_sidebar( 'sidebar-social' ); ?>
						</ul>
								</div>
					<?php endif; ?>
		
		
					<?php if ( is_active_sidebar( 'sidebar-below' ) ) : ?>
								<div id="right-sidebar">
						<ul id="sidebar">
							<?php dynamic_sidebar( 'sidebar-below' ); ?>
						</ul>
								</div>
					<?php endif; ?>

			
			
						</div> <!-- #right_col -->
