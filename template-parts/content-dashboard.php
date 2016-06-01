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
				<!--<li><a href="<?php echo home_url( '/uploads/' ); ?>">Send us a file</a></li>-->
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

			<h2>Downloads</h2>
			
			<div class="w3eden">

			<table id="wpdmmydls" cellpadding="10" style="width: 100%;" class="dtable table table-bordered">

				<thead>
					<tr>
						<th>Title</th>
						<th class="file-size">Uploaded</th>
						<th class="file-download">Download</th>
					</tr>
				</thead>

				<tbody>
				
				<?php
				$current_user_ID = get_current_user_id();
				$count = 0;
				$users = array();
				$args = array( 
					'post_type' => 'client_files', 
					'posts_per_page' => -1,
				);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
				$file = get_field('client_file');
				$user = get_field('assignee');
				$users[] = $user['ID'];
				$availtoyou = false;

				if($current_user_ID == $user['ID']): 
					$availtoyou = true; 
					if ($availtoyou): ?>
				<tr>
					<td><?php the_title(); ?></td>
					<td><?php echo date("jS M Y g:ia", strtotime($file['modified'])); ?></td>
					<td align="center">
						<a class="button download" href="<?php echo $file['url']; ?>" target="_blank">
							<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Download
						</a>
 					</td>
				</tr>

				<?php endif;
				endif;

				endwhile; ?>

				<?php
				if (!in_array($current_user_ID, $users)):  ?>
				
				<tr>
					<td colspan="3" align="center">Nothing available to download</td>
				</tr>

				<?php endif; ?>

				</tbody>
				</table>
			</div>

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
