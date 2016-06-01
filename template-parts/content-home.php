<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package createc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="half">
		<div class="video">
			<?php $show_reel = get_field('show_reel'); ?>
			<?php echo $show_reel; ?>
		</div>

		<div class="cta">
			<h3><?php the_field('cta'); ?></h3>

			<div class="contact-info">
				<p><?php the_field('address', 'option'); ?></p>			
				<p><strong>T: <?php the_field('phone', 'option'); ?><br>
				   E: <?php the_field('email', 'option'); ?></strong></p>
			</div>

		</div>

		<div class="additional-image">
			<?php $additional_image = get_field('additional_image'); ?>
			<?php $additional_image_link = get_field('additional_image_link'); ?>
			<?php if($additional_image_link): ?><a href="<?php echo $additional_image_link; ?>"><?php endif; ?>
				<img src="<?php echo $additional_image['sizes']['hp_small']; ?>">
			<?php if($additional_image_link): ?></a><?php endif; ?>
		</div>

	</div>

	<div class="half">
		<div class="maintent">
			<div class="image">
				<?php $feature_image_link = get_field('feature_image_link'); ?>
				<?php if($feature_image_link): ?><a href="<?php echo $feature_image_link; ?>"><?php endif; ?>
				<?php the_post_thumbnail('homepage'); ?>
				<?php if($feature_image_link): ?></a><?php endif; ?>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="quote">
			<h4><?php the_field('quote'); ?></h4>
		</div>
	</div>

</article>
