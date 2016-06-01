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

		<div id="contact-text">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="page-content">

		<div class="image">

			<div class="map">
				<div class="map-container">
				<?php $location = get_field('map'); if( !empty($location) ): ?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				<?php endif; ?>
				</div>
			</div>
			
			<div id="form">
				<?php 
    				echo do_shortcode('[gravityform id="1" title="false" description="true" ajax="true"]');
				?>
			</div>			
		</div>

		<div class="entry-content">
			<?php the_field('contact_text'); ?>
		</div>

	</div>

</article>
