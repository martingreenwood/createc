<?php
/**
 * Template part for displaying single posts.
 *
 * @package createc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-content wide">

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<div class="images">
			<div class="large">
				<?php $second_image = get_field('primary_image'); ?>
				<img src="<?php echo $second_image['url']; ?>">
			</div>
			<div class="small">
				<?php $second_image = get_field('second_image'); ?>
				<img src="<?php echo $second_image['url']; ?>">
			</div>
		</div>

		<div class="third-image">
			<?php $third_image = get_field('third_image'); ?>
			<img src="<?php echo $third_image['url']; ?>">
		</div>

		<div class="secondary_text">
			<?php the_field('secondary_text'); ?>
		</div>

	</div>

</article>