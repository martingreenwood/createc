<?php
/**
 * Template Name: Template one
 *
 * This template is used to dispaly the main services page and alike.
 * 
 * @package createc
 */

get_header(); ?>

	<div id="slogan">

		<?php if (get_field ('slogan')): ?>
		<h1><?php the_field('slogan'); ?></h1>
		<?php else: ?>
		<h1><?php the_field('slogan', 'option'); ?></h1>
		<?php endif; ?>

		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		<?php if(function_exists('bcn_display'))
		{
		    bcn_display();
		}?>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php 
					get_template_part( 'template-parts/content', 'templateone' ); 
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
