<?php
/**
 * The template for displaying all single posts.
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
				<ul>
					<li><a href="<?php echo home_url( '/creative-people/people-profiles/' ); ?>">Back to Profiles</a></li>
				</ul>
			</div>

			<div class="contact-info">
				<p><?php the_field('address', 'option'); ?></p>			
				<p><strong>T: <?php the_field('phone', 'option'); ?><br>
				   E: <?php the_field('email', 'option'); ?></strong></p>
			</div>
		</div>

		<div class="posts-articles">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'profile' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
