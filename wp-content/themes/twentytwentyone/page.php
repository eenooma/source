<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

if (!is_front_page()):
?>
<article class="nav_wrap">
	<!--네비게이션-->
	<nav class="nav">
		<?php get_breadcrumbs(); ?>
	</nav>
	<!--// 네비게이션-->
	
	<?php the_title( '<h3>', '</h3>' ); ?>
	
	<article class="tab_list">
		<?php get_siblings(); ?>
	</article>
	
</article>
<?php
endif;

if (!is_front_page()):
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content-page' );

		// If comments are open or there is at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; // End of the loop.
else:
	the_post();
	get_template_part( 'template-parts/content/content-main' );
endif;
get_footer();
