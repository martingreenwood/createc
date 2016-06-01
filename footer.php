<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package createc
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<?php if(get_field('enable_logo_scroller')): ?>
<setion id="logo-slider">

	<div class="inner">
		<h3>Our Network</h3>
		<div class="clear"></div>
		<div class="logos">
		<?php $logo_scroller = get_field('logo_scroller', 'option'); ?>
		<?php foreach( $logo_scroller as $logo ): ?>
			<div class="logo">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>
		<?php endforeach; ?>
		</div>

	</div>

</setion>
<?php endif; ?>

<div id="twitter">

	<div class="wrapper">
		<i class="fa fa-twitter"></i>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Sidebar')) : ?>
		<div class="no-tweet">
			<i class="fa fa-twitter"></i>
			<h2>Follow us on Twitter. <a href="https://twitter.com/CreatecCumbria" target="_blank">@CreatecCumbria</h2>
		</div>
		<?php endif; ?>
	</div>
	
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">

		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</nav>

		<p>Copyright <?php echo date("Y"); ?> - <?php echo bloginfo('name'); ?></p>
		<p><?php the_field('footer_text', 'option'); ?></p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
