<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
	<meta name="viewport" content="target-densitydpi=device-dpi, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width" /> 
	<?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">  
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrap" class="site">
	<!--헤더-->
	<header id="header">
		<div class="container">
			<h1 class="logo">
				<a href="/">
					<img src="/wp-content/themes/twentytwentyone/images/logo.png" alt="로고">
				</a>
			</h1>

            <a href="#" class="menu_btn">
                <div></div>
                <div></div>
                <div></div>
            </a>
			
			<nav class="nav">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => '',
						'walker'          => new Custom_Walker_Nav_Menu,
						'items_wrap'      => '<ul class="gnb">%3$s</ul>',
						// 'fallback_cb'     => false,
						'before'          => '',
						'after'           => '',
					)
				);
				?>
			</nav>
            
            <div class="header_btn">
            	<ul>
            		<li><a href="#">감정신청</a></li>
            		<li><a href="/수강-신청하기">교육신청</a></li>
            	</ul>
            </div>
		</div>
        <div class="hd_bg"></div>
	</header>

	<div class="m_menu_wrap">
		<div class="m_menu"> 
			<h3 class="logo"><a href="/"><img src="/wp-content/uploads/2024/01/m_logo.png" alt="모바일 로고"></a></h3>  

			<div class="hamburger-menu">
				<div class="bar">
				</div>	
			</div>
		</div>    

		<nav class="mobile-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => '',
					'walker'          => new Custom_Walker_Nav_Menu3,
					'items_wrap'      => '<ul>%3$s</ul>',
					// 'fallback_cb'     => false,
					'before'          => '',
					'after'           => '',
				)
			);
			?>
		</nav>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(document).ready(function () {
				$('.hamburger-menu').on('click', function() {
					$('.bar').toggleClass('animate');
					$('.mobile-menu').toggleClass('active');
					return false;
				});
				
				$('.has-children').on ('click', function() {
					$(this).children('ul').slideToggle('slow', 'swing');
					$('.icon-arrow1').toggleClass('open');
				});
			});  
		});

	</script>
<?php if (!is_front_page()): ?>
	<div class="sub_page">
		<section class="inner"> 
<?php endif; ?>