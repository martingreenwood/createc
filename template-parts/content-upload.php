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
			<ul class="leftmenu">
				<li><a href="<?php echo home_url( '/dashboard/' ); ?>">Dashboard</a></li>
				<li><a href="<?php echo home_url( '/uploads/' ); ?>">Upload</a></li>
			</ul>
		</div>

		<div class="contact-info">
			<p><?php the_field('address', 'option'); ?></p>			
			<p><strong>T: <?php the_field('phone', 'option'); ?><br>
			   E: <?php the_field('email', 'option'); ?></strong></p>
		</div>
	</div>

	<div class="page-content wide">

		<div class="entry-content">

			<?php if ( is_user_logged_in() ): ?>

			<?php the_content(); ?>

			<?php else:
				$args = array(
					'echo'           => true,
					'remember'       => true,
					'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
					'form_id'        => 'loginform',
					'id_username'    => 'user_login',
					'id_password'    => 'user_pass',
					'id_remember'    => 'rememberme',
					'id_submit'      => 'wp-submit',
					'label_username' => __( 'Username' ),
					'label_password' => __( 'Password' ),
					'label_remember' => __( 'Remember Me' ),
					'label_log_in'   => __( 'Log In' ),
					'value_username' => '',
					'value_remember' => false
				);
				 wp_login_form( $args );
			endif; ?>
			</div>
		</div>

	</div>

</article>
