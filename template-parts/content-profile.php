<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package createc
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-content profile">

		<div class="image">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<div class="contact-info">
			<?php if(get_field('heading')): ?><h2><?php the_field('heading'); ?></h2><?php endif; ?>
			<?php if(get_field('phone')): ?><p>T: <?php the_field('phone'); ?></p><?php endif; ?>
			<?php if(get_field('email')): ?><p>E: <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p><?php endif; ?>
			<?php if(get_field('linkein')): ?><p><a href="<?php the_field('linkein'); ?>">LinkedIn</a></p><?php endif; ?>
			<?php if(get_field('twitter')): ?><p><a href="<?php the_field('twitter'); ?>">Twitter</a></p><?php endif; ?>
		</div>
	</div>

</article>
