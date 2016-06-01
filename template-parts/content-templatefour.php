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
			<?php $show_reel = get_field('show_reel'); ?>
			<?php 
			if($show_reel):
				echo $show_reel;
			else: 
				the_post_thumbnail('homepage');
			endif;
			?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="additional-content">

		<div class="image">
			<?php $image_one = get_field('image_one'); ?>
			<img src="<?php echo $image_one['sizes']['hp_small']; ?>">
		</div>

		<div class="text border">
			<?php the_field('text'); ?>
		</div>

	</div>

</article>