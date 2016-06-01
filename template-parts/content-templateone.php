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
			<?php the_post_thumbnail('homepage'); ?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="additional-content">

		<div class="text">
			<?php the_field('text'); ?>
		</div>

		<div class="image">
			<?php $image_one = get_field('image_one'); ?>
			<img src="<?php echo $image_one['sizes']['hp_small']; ?>">
		</div>

		<div class="image">
			<?php $image_two = get_field('image_two'); ?>
			<img src="<?php echo $image_two['sizes']['hp_small']; ?>">
		</div>

	</div>

</article>
