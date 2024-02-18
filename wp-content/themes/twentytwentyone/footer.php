<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<?php if (!is_front_page()): ?>
		</section><!-- inner -->
	</div><!-- sub_page -->
<?php endif; ?>

	<!-- <?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?> -->

	<footer id="colophon" class="footer">
		<section class="inner">
			
			<div class="left">
				<div class="sns_box">
				
					<ul>
						<li><a href="#"><img src="/wp-content/uploads/2024/01/instagram.png" alt="인스타그램"></a></li>
						<li><a href="#"><img src="/wp-content/uploads/2024/01/blog.png" alt="블로그"></a></li>
						<li><a href="#"><img src="/wp-content/uploads/2024/01/youtube.png" alt="유튜브"></a></li>
					</ul>	
				</div>
		
				<div class="address_box">
					<ul>
						<li>Tel. 010 - 4963 - 8491</li>
						<li>사업자 등록번호 : 267-29-01563</li>
						<li>대표자 : 김우선</li>
						<li>개인정보관리책임자 : 김탁겸</li>
					</ul>

					<ul>
						<li>대전 유성구 문화원로 153 (2층)</li>
					</ul>

					<p class="copyright">Copyright, 바른 명품교육원.All RIGHTS RESERVED.</p>

				</div>					
			</div>
			
			<div class="right">
				<div class="footer_menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container'       => '',
								'walker'          => new Custom_Walker_Nav_Menu2,
								'items_wrap'      => '<ul>%3$s</ul>',
								// 'fallback_cb'     => false,
								'before'          => '',
								'after'           => '',
							)
						);
					?>
				</div>
			</div>	
		</section>

		<!-- <div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '<div class="privacy-policy">', '</div>' );
			}
			?>

			<div class="powered-by">
				<?php
				// printf(
				// 	/* translators: %s: WordPress. */
				// 	esc_html__( 'Proudly powered by %s.', 'twentytwentyone' ),
				// 	'<a href="' . esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ) . '">WordPress</a>'
				// );
				?>
			</div>

		</div>.site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>






</body>
</html>




