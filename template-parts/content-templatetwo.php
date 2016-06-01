<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package createc
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-menu">

		<div class="child-pages">
		<?php get_template_part( 'template-parts/content', 'childmenu' ); ?>
		</div>

		<div class="contact-info">
			<p><?php the_field('address', 'option'); ?></p>			
			<p><strong>T: <?php the_field('phone', 'option'); ?><br>
			   E: <?php the_field('email', 'option'); ?></strong></p>
		</div>
	</div>

	<div class="page-content">

		<div class="image">
			<?php the_post_thumbnail(); ?>
			<?php $second_image = get_field('second_image'); ?>
			<img style="margin-top: 30px;" src="<?php echo $second_image['url']; ?>">
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

</article>
