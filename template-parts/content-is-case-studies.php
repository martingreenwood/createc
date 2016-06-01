<?php
/**
 * Template part for displaying posts.
 *
 * @package createc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-content default">

		<div class="image">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="entry-content">
			
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php createc_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div>
				<?php
					the_excerpt();
				?>
			</div><!-- .entry-content -->

		</div>

	</div>

</article>

