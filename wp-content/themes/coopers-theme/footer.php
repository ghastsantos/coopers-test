<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coopers-theme
 */

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
				
				<div class="footer-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-green-element.png" alt="Footer Green Element">
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
