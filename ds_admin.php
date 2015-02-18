<div class="custom-admin">
	<?php
	$args = array( 
		'method'		=> 'get_options', 
		'action'		=> 'save_settings'
	);
	call_user_func( array( 'ThemeOptions', 'save_options'), $args );
	call_user_func( array( 'ThemeOptions', 'show_option_form'), $args );
	?>
</div>