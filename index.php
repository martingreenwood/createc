<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

		<div class="page-menu">

			<div class="child-pages">
			<?php get_sidebar(); ?>
			</div>

			<div class="contact-info">
				<p><?php the_field('address', 'option'); ?></p>			
				<p><strong>T: <?php the_field('phone', 'option'); ?><br>
				   E: <?php the_field('email', 'option'); ?></strong></p>
			</div>
		</div>

		<div class="posts-articles">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content', 'news' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
