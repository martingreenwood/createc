<?php
/**
 * Template Name: Default w/ Case Studies
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
			<?php get_template_part( 'template-parts/content', 'childmenu' ); ?>
			</div>

			<div class="contact-info">
				<p><?php the_field('address', 'option'); ?></p>			
				<p><strong>T: <?php the_field('phone', 'option'); ?><br>
				   E: <?php the_field('email', 'option'); ?></strong></p>
			</div>
		</div>

		<div class="posts-articles">

		<?php 

			$term = get_field('select_category');
			if( $term ): $cat_slug = $term->slug; endif;


			if (isset($cat_slug)):
			$args = array( 
				'post_type' => 'case_study', 
				'posts_per_page' => 4,
				'paged' => get_query_var('paged'),
				'tax_query' => array(
					array(
						'taxonomy' => 'case_study_tax',
						'field'    => 'slug',
						'terms'    => $cat_slug,
					),
				),
			);
			else:
			$args = array( 
				'post_type' => 'case_study', 
				'posts_per_page' => 4,
				'paged' => get_query_var('paged'),
			);
			endif;

			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			get_template_part( 'template-parts/content', 'is-case-studies' ); 

		endwhile; // End of the loop. 
		
		wp_pagenavi( array( 'query' => $loop ) );
		
		wp_reset_postdata(); ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
