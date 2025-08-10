<?php

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-background">
			<div class="footer-content">
				<?php if(get_field('footer_text_1')): ?>
					<h2 class="footer-question"><?php the_field('footer_text_1'); ?></h2>
				<?php endif; ?>
				
				<?php if(get_field('footer_text_2')): ?>
					<p class="footer-email"><?php the_field('footer_text_2'); ?></p>
				<?php endif; ?>
				
				<?php if(get_field('footer_text_3')): ?>
					<p class="footer-copyright"><?php the_field('footer_text_3'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
