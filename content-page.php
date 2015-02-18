<?php if(is_page('give-now')): ?>

  <?php get_template_part( 'content', 'give' ); ?>

<?php else: ?>

  <?php get_template_part( 'content', 'subpage' ); ?>

<?php endif; ?>