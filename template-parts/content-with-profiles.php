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

	<div class="page-content default">

		<div class="image">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="people-profiles">
		<?php 
			$args = array( 
				'post_type' => 'profiles', 
				'posts_per_page' => 10, 
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			get_template_part( 'template-parts/content', 'profile-intro' ); 
		endwhile; // End of the loop. ?>
	</div>


</article>
