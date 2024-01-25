<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => esc_html__( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for link color control.
		add_theme_support( 'link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Registers widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global bool       $is_IE
 * @global WP_Scripts $wp_scripts
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			array(
				'in_footer' => false, // Because involves header.
				'strategy'  => 'defer',
			)
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueues block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), array( 'in_footer' => true ) );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fixes skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 * @deprecated Twenty Twenty-One 1.9 Removed from wp_print_footer_scripts action.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
		</script>
		<?php
	}
}

/**
 * Enqueues non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueues scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueues scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculates classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Adds "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator() {
		/* translators: Used between list items, there is a space after the comma. */
		return __( ', ', 'twentytwentyone' );
	}
endif;

function get_breadcrumbs() {
	$menu_name = 'primary';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	
	$menu_items = wp_get_nav_menu_items( $menu, array( 'update_post_term_cache' => false ) );
	_wp_menu_item_classes_by_context( $menu_items );
	
	echo '<ul><li class="home"><a href="#">홈</a></li>';
	foreach( $menu_items as $item ):
		if ( $item->current_item_parent || $item->current ):
			echo "<li><a href='".$item->url."'>".$item->title."</a></li>";
		endif;
	endforeach;
	echo '</ul>';
}

function get_siblings() {
	$menu_name = 'primary';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$parent_id = "";
	
	$menu_items = wp_get_nav_menu_items( $menu, array( 'update_post_term_cache' => false ) );
	_wp_menu_item_classes_by_context( $menu_items );

	echo "<ul>";
	foreach( $menu_items as $item ):
		if ( $item->current_item_parent ):
			$parent_id = $item->ID;
		endif;
		if ( $item->menu_item_parent == $parent_id ):
			if ($item->current):
				echo '<li class="active">';
			else:
				echo "<li>";
			endif;
			echo "<a href='".$item->url."'>".$item->title."</a></li>";
		endif;
	endforeach;
	echo "</ul>";
}

// Add Slideshow Shortcode for WordPress
function slideshow_custom_shortcode($atts, $content = null ) {
    extract( shortcode_atts( array(
	    'plain_text_url' => 'no' // in case the urls are plain text urls, write yes in the parameter eg. [slideshow plain_text_url="yes"]plain text urls here[/slideshow]
		,'id' => '0'
    ), $atts ) );

    // If we only have a bunch of plain text urls (no a or img tags *sigh*)
    if($plain_text_url != 'no') {
        global $post;
        $doc = new DOMDocument;
        $doc->loadHTML('<!DOCTYPE html><meta charset="UTF-8">'.get_the_content($post->ID));
        $post_content = $doc->textContent;
		
        // Get only the urls in the slideshow shortcode
        $start_test = '/\[slideshow id=\"'.$id.'\" plain_text_url=\"yes\"\]/';
        $end = '[/slideshow]';
        $post_content = ' ' . $post_content;
        preg_match($start_test, $post_content, $arr, PREG_OFFSET_CAPTURE);
		$ini = $arr[0][1];
		$start = $arr[0][0];
		
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($post_content, $end, $ini) - $ini;
        $substring_full = substr($post_content, $ini, $len);

        // Get an array of urls
        $string_array = explode(PHP_EOL, $substring_full);
		
        $new_array = array();
        foreach ($string_array as $url) {
            if(strlen($url) > 1)
                /* This actually only works in some cases; other times, the Swiper gallery removes the bg image for some reason
                $new_array[] = '<div class="swiper-slide" style="background-image:url('.$url.')"></div>'; */
                $new_array[] = '<div class="swiper-slide"><img src="'.$url.'" /></div>';
        }

        // Take over the content
        $content = implode(PHP_EOL,$new_array);
    }

	// if(shortcode_exists('slideshow')) {
		wp_enqueue_style( 'swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );
		wp_enqueue_script( 'swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.5', true );
	// }

    // Output the code for the gallery
    return '<div class="swiper gallery-top'.$id.'">
                <div class="swiper-wrapper">
                    '.$content.'
                </div>
                <div class="swiper-button-next swiper-button-next'.$id.' swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-prev'.$id.' swiper-button-white"></div>
            </div>
            <div thumbsSlider="" class="swiper gallery-thumbs'.$id.'">
                <div class="swiper-wrapper">
                    '.$content.'
                </div>
            </div>
			<script>
				jQuery(document).ready(function($){
					var swiper'.$id.' = new Swiper(".gallery-thumbs'.$id.'", {
						spaceBetween: 10,
						slidesPerView: 4,
						freeMode: true,
						watchSlidesProgress: true,
					});
					var swiper2_'.$id.' = new Swiper(".gallery-top'.$id.'", {
						spaceBetween: 10,
						navigation: {
							nextEl: ".swiper-button-next'.$id.'",
							prevEl: ".swiper-button-prev'.$id.'",
						},
						thumbs: {
							swiper: swiper'.$id.',
						},
					});
			  });
			</script>';
}
add_shortcode( 'slideshow', 'slideshow_custom_shortcode' );


// Add Slideshow Shortcode for WordPress
function slideshow_custom_shortcode2($atts, $content = null ) {
    extract( shortcode_atts( array(
	    'plain_text_url' => 'no' // in case the urls are plain text urls, write yes in the parameter eg. [slideshow plain_text_url="yes"]plain text urls here[/slideshow]
		,'id' => '0'
    ), $atts ) );

    // If we only have a bunch of plain text urls (no a or img tags *sigh*)
    if($plain_text_url != 'no') {
        global $post;
        $doc = new DOMDocument;
        $doc->loadHTML('<!DOCTYPE html><meta charset="UTF-8">'.get_the_content($post->ID));
        $post_content = $doc->textContent;
		
        // Get only the urls in the slideshow shortcode
        $start_test = '/\[slideshow2 id=\"'.$id.'\" plain_text_url=\"yes\"\]/';
        $end = '[/slideshow2]';
        $post_content = ' ' . $post_content;
        preg_match($start_test, $post_content, $arr, PREG_OFFSET_CAPTURE);
		$ini = $arr[0][1];
		$start = $arr[0][0];
		
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($post_content, $end, $ini) - $ini;
        $substring_full = substr($post_content, $ini, $len);

        // Get an array of urls
        $string_array = explode(PHP_EOL, $substring_full);
		
        $new_array = array();
        foreach ($string_array as $slide) {
			if(strlen($slide) > 1) {
				$shortcode_pattern = get_shortcode_regex( ['slide'] );
				if ( preg_match_all( '/' . $shortcode_pattern . '/s', $slide, $m ) ) {

					// $m[3] – The shortcode argument list 
					foreach( $m[3] as $atts_string ) {
						$atts = shortcode_parse_atts( $atts_string );
						$new_array[] = '<li class="swiper-slide"><div class="swiper_wrap"><a href="#"><div class="img_box"><img src="'.$atts->url.'" alt=""></div><div class="text_box">'.$atts->text.'</div></a></div></li>';
					}
				}
			}
        }

        // Take over the content
        $content = implode(PHP_EOL,$new_array);
    }

	// if(shortcode_exists('slideshow')) {
wp_enqueue_style( 'swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );
wp_enqueue_script( 'swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.5', true );
	// }

    // Output the code for the gallery
    return '<article class="swiper_wrap_all">
				<div class="product_swiper swiper-container-initialized swiper-container-horizontal"> 
					<ul class="swiper-wrapper">'.$content.'</ul> 
					<!-- Add Arrows -->
					<div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"><i>다음</i></div>
					<div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i>이전</i></div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
					<!-- // Add Arrows -->
				</div>  
			</article>
			<script>
				jQuery(document).ready(function($){
					var swiper = new Swiper(".swiper-container", {
						autoplay: {
							delay: 5000,
							disableOnInteraction: false
						},
						speed: 500,
						loop: false,
						pagination: {
							el: ".swiper-pagination",
							type: "fraction"
						},
						navigation: {
							nextEl: ".swiper-button-next",
							prevEl: ".swiper-button-prev"
						},
						on: {
							init: function () {
								$(".swiper-progress-bar").removeClass("animate");
								$(".swiper-progress-bar").removeClass("active");
								$(".swiper-progress-bar").eq(0).addClass("animate");
								$(".swiper-progress-bar").eq(0).addClass("active");
							},
							slideChangeTransitionStart: function () {
								$(".swiper-progress-bar").removeClass("animate");
								$(".swiper-progress-bar").removeClass("active");
								$(".swiper-progress-bar").eq(0).addClass("active");
							},
							slideChangeTransitionEnd: function () {
								$(".swiper-progress-bar").eq(0).addClass("animate");
							}
						}
					});
					$(".swiper-container").hover(function () {
						swiper.autoplay.stop();
						$(".swiper-progress-bar").removeClass("animate");
					}, function () {
						swiper.autoplay.start();
						$(".swiper-progress-bar").addClass("animate");
					});
			  });
			</script>';
}
add_shortcode( 'slideshow2', 'slideshow_custom_shortcode2' );


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	public $lv = 1;

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$llv = sprintf('%02d', $this->lv++);
		$output .= "\n$indent<ul class=\"sub sub_$llv\">\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
}

class Custom_Walker_Nav_Menu2 extends Walker_Nav_Menu {
	public $idx = 1;

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}

	function start_el( &$output, $data_object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		if ($depth == 0) {
			if ($this->idx++ > 1) $output .= "</ul><ul>";
			$output .= "<li><h3>$data_object->title</h3></li>";
		} else {
			$output .= "<li><a href='$data_object->url'>$data_object->title</a></li>";
		}
	}
}

class Custom_Walker_Nav_Menu3 extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"children\">\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $data_object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		if ($depth == 0) {
			// if ($this->idx++ > 1) $output .= "</ul><ul>";
			$output .= "<li class=\"has-children\">$data_object->title<span class=\"icon-arrow\"></span>";
		} else {
			$output .= "<li><a href='$data_object->url'>$data_object->title</a></li>";
		}
	}
}


add_shortcode("mb_latest_slide", 'mbw_create_latest_mb_slide');
if(!function_exists('mbw_create_latest_mb_slide')){
	function mbw_create_latest_mb_slide($args){
		if(!empty($args['echo'])){
			echo mbw_get_latest_mb_slide("shortcode",$args);
		}else{
			return mbw_get_latest_mb_slide("shortcode",$args);
		}
	}
}

if(!function_exists('mbw_get_latest_mb_slide')){
	function mbw_get_latest_mb_slide($mode,$data){
		global $mdb,$mstore,$mb_admin_tables,$mb_fields;
		$device_type				= mbw_get_vars("device_type");
		$widget_name			= basename(dirname(__FILE__));
		$title_max_length		= 20;
		if(!empty($data['maxlength'])) $title_max_length		= $data['maxlength'];
		else if($mode=="shortcode") $title_max_length		= 40;
		
		if(empty($data['name'])) return;
		else $name			= mbw_value_filter(str_replace('"',"",$data['name']),"name");
		$post_id		= "";
		if(strlen($name)>3){
			if(empty($data['post_id'])){
				$post_id	= $mdb->get_var($mdb->prepare("SELECT ".$mb_fields["board_options"]["fn_post_id"]." FROM ".$mb_admin_tables["board_options"]." where ".$mb_fields["board_options"]["fn_board_name2"]."=%s limit 1",$name));
			}else $post_id			= mbw_value_filter($data['post_id'],"int");
		}
		if(empty($data['list_size'])) $list_size			= "5";
        else $list_size			= mbw_value_filter($data['list_size'],"int");
		if(!empty($data['list_page'])) $list_page	= intval($data['list_page'])-1;
		else $list_page		= 0;
		if($list_page<0) $list_page	= 0;
		if(empty($data['title'])) $title			= "";
        else $title			= $data['title'];
		if(empty($data['link_type'])) $link_type			= "view";
        else $link_type			= $data['link_type'];
		if(!empty($data['link_target'])) $link_target	= ' target="'.mbw_value_filter($data['link_target'],"name").'"';
        else $link_target		= "";
		if(empty($data['use_category'])) $use_category		= "false";
        else $use_category			= $data['use_category'];

		if(empty($data['search_field'])) $search_field			= "";
        else $search_field			= mbw_value_filter($data['search_field'],"name");
		if(!isset($data['search_text'])) $search_text			= "";
        else $search_text			= $data['search_text'];
		if(empty($data['category1'])) $category1			= "";
        else $category1			= $data['category1'];
		if(empty($data['category2'])) $category2			= "";
        else $category2			= $data['category2'];
		if(empty($data['category3'])) $category3			= "";
        else $category3			= $data['category3'];
		if(!empty($data['date_after'])){
			$date_after		= mbw_value_filter(trim($data['date_after']),"date1");
			if($data['date_after']!=$date_after){		// -7 days 형태로 입력이 되었을 경우
				$date_after		= date('Y-m-d',strtotime($data['date_after']));
			}
		}else $date_after = "";
		if(!empty($data['date_before'])){
			$date_before		= mbw_value_filter(trim($data['date_before']),"date1");
			if($data['date_before']!=$date_before){	// -7 days 형태로 입력이 되었을 경우
				$date_before		= date('Y-m-d',strtotime($data['date_before']));
			}
		}else $date_before = "";
		if(empty($data['order_by'])) $order_by			= "pid";
        else $order_by			= mbw_value_filter($data['order_by'],"name");
		if(empty($data['order_type'])) $order_type			= "desc";
        else $order_type			= mbw_value_filter($data['order_type'],"name");

		if(empty($data['class'])) $div_class			= "";
        else $div_class			= " ".esc_attr($data['class']);
		if(empty($data['style'])) $div_style			= "";
        else $div_style			= " style='".str_replace("'",'"',esc_attr($data['style']))."'";

		$head_title_style1		= "";
		if(!empty($data['head_title_font_size'])){
			if(strpos($data['head_title_font_size'],'px')===false) $data['head_title_font_size']	.= "px";
			$head_title_style1	.= 'font-size:'.mbw_value_filter($data['head_title_font_size']).' !important;';
		}
		if(!empty($data['head_title_font_color'])){
			$data['head_title_font_color']		= mbw_value_filter($data['head_title_font_color'],"color");
			if(strpos($data['head_title_font_color'],'#')!==0 && strpos($data['head_title_font_color'],'rgba(')!==0) $data['head_title_font_color']	= "#".$data['head_title_font_color'];
			$head_title_style1	.= 'color:'.$data['head_title_font_color'].' !important;';
		}
		if(!empty($data['head_title_line_height'])){
			$head_title_style1	.= 'line-height:'.mbw_value_filter($data['head_title_line_height'],"number").' !important;';
		}
		if(!empty($data['head_title_font_weight'])){
			$head_title_style1	.= 'font-weight:'.mbw_value_filter($data['head_title_font_weight']).' !important;';
		}
		if(!empty($head_title_style1)){
			$head_title_style1	= " style='".str_replace("'",'"',esc_attr($head_title_style1))."'";
		}

		$add_text_style1		= "";
		if(!empty($data['title_font_size'])){
			if(strpos($data['title_font_size'],'px')===false) $data['title_font_size']	.= "px";
			$add_text_style1	.= 'font-size:'.mbw_value_filter($data['title_font_size']).' !important;';
		}
		if(!empty($data['title_font_color'])){
			$data['title_font_color']		= mbw_value_filter($data['title_font_color'],"color");
			if(strpos($data['title_font_color'],'#')!==0 && strpos($data['title_font_color'],'rgba(')!==0) $data['title_font_color']	= "#".$data['title_font_color'];
			$add_text_style1	.= 'color:'.$data['title_font_color'].' !important;';
		}
		if(!empty($data['title_line_height'])){
			$add_text_style1	.= 'line-height:'.mbw_value_filter($data['title_line_height'],"number").' !important;';
		}
		if(!empty($data['title_font_weight'])){
			$add_text_style1	.= 'font-weight:'.mbw_value_filter($data['title_font_weight']).' !important;';
		}
		if(!empty($add_text_style1)){
			$add_text_style1	= " style='".str_replace("'",'"',esc_attr($add_text_style1))."'";
		}

		$add_text_style2		= "";
		if(!empty($data['category_font_size'])){
			if(strpos($data['category_font_size'],'px')===false) $data['category_font_size']	.= "px";
			$add_text_style2	.= 'font-size:'.mbw_value_filter($data['category_font_size']).' !important;';
		}
		if(!empty($data['category_font_color'])){
			$data['category_font_color']		= mbw_value_filter($data['category_font_color'],"color");
			if(strpos($data['category_font_color'],'#')!==0 && strpos($data['category_font_color'],'rgba(')!==0) $data['category_font_color']	= "#".$data['category_font_color'];
			$add_text_style2	.= 'color:'.$data['category_font_color'].' !important;';
		}
		if(!empty($data['category_line_height'])){
			$add_text_style2	.= 'line-height:'.mbw_value_filter($data['category_line_height'],"number").' !important;';
		}
		if(!empty($data['category_font_weight'])){
			$add_text_style2	.= 'font-weight:'.mbw_value_filter($data['category_font_weight']).' !important;';
		}
		if(!empty($add_text_style2)){
			$add_text_style2	= " style='".str_replace("'",'"',esc_attr($add_text_style2))."'";
		}

		$add_comment_style1		= "";
		if(!empty($data['comment_font_size'])){
			if(strpos($data['comment_font_size'],'px')===false) $data['comment_font_size']	.= "px";
			$add_comment_style1	.= 'font-size:'.mbw_value_filter($data['comment_font_size']).' !important;';
		}
		if(!empty($data['comment_font_color'])){
			$data['comment_font_color']		= mbw_value_filter($data['comment_font_color'],"color");
			if(strpos($data['comment_font_color'],'#')!==0 && strpos($data['comment_font_color'],'rgba(')!==0) $data['comment_font_color']	= "#".$data['comment_font_color'];
			$add_comment_style1	.= 'color:'.$data['comment_font_color'].' !important;';
		}
		if(!empty($data['comment_line_height'])){
			$add_comment_style1	.= 'line-height:'.mbw_value_filter($data['comment_line_height'],"number").' !important;';
		}
		if(!empty($data['comment_font_weight'])){
			$add_comment_style1	.= 'font-weight:'.mbw_value_filter($data['comment_font_weight']).' !important;';
		}
		if(!empty($add_comment_style1)){
			$add_comment_style1	= " style='".str_replace("'",'"',esc_attr($add_comment_style1))."'";
		}

		//필요한 게시판 필드 이름 가져오기
		$select_field			= array("fn_pid","fn_title","fn_content","fn_image_path","fn_category1","fn_category2","fn_category3","fn_image_path","fn_reg_date","fn_comment_count","fn_homepage");
		if(!empty($search_field) && $search_text!="") $select_field[]			= $search_field;
		$board_field			= $mstore->get_board_select_fields($select_field,$name);

		$latest_permalink		= get_permalink($post_id);
		if(strpos($latest_permalink, '?') === false)	$latest_permalink		.= "?";
		else 	$latest_permalink		.= "&";
		if(!empty($category1)) $latest_permalink		.= "category1=".$category1."&";			
		if(!empty($category2)) $latest_permalink		.= "category2=".$category2."&";			
		if(!empty($category3)) $latest_permalink		.= "category3=".$category3."&";			
		if($link_type=="item"){
			$latest_permalink		.= "item=";
		}else{
			$latest_permalink		.= "vid=";
		}
		
		$table_name				= mbw_get_table_name($name);

		$where_query				= "";
		$where_data				= array();
		if(!empty($date_after)){
			$where_data[]		= $mdb->prepare($board_field["fn_reg_date"].">%s",$date_after);
		}
		if(!empty($date_before)){
			$where_data[]		= $mdb->prepare($board_field["fn_reg_date"]."<%s",$date_before);
		}
		if(!empty($category1)){
			if(strpos($category1, ',') !== false){
				$category1_array		= explode(',',$category1);
				$filter_array1			= array();
				foreach($category1_array as $item){
					$filter_array1[]		= $mdb->prepare($board_field["fn_category1"]."=%s", $item );
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array1).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category1"]."=%s",$category1);
			}
		}
		if(!empty($category2)){
			if(strpos($category2, ',') !== false){
				$category2_array		= explode(',',$category2);
				$filter_array2			= array();
				foreach($category2_array as $item){
					$filter_array2[]		= $mdb->prepare($board_field["fn_category2"]."=%s", $item);
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array2).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category2"]."=%s",$category2);
			}
		}
		if(!empty($category3)){
			if(strpos($category3, ',') !== false){
				$category3_array		= explode(',',$category3);
				$filter_array3			= array();
				foreach($category3_array as $item){
					$filter_array3[]		= $mdb->prepare($board_field["fn_category3"]."=%s", $item);
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array3).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category3"]."=%s",$category3);
			}
		}
		$latest_list		= array();
		if(!empty($search_field) && $search_text!="") $where_data[] = $mdb->prepare($search_field." like %s","%".$search_text."%");
		if(!empty($where_data)) $where_query				= " WHERE ".implode(" and ",$where_data);
		if(strlen($name)>3){			
			$latest_list		= $mdb->get_results("SELECT * FROM ".$table_name.$where_query." order by ".mbw_value_filter($order_by,"name")." ".mbw_value_filter($order_type,"name")." limit ".mbw_value_filter($list_page,"int").",".mbw_value_filter($list_size,"int"), ARRAY_A);
		}
		if(has_filter('mf_widget_latest_items')) $latest_list			= apply_filters("mf_widget_latest_items", $latest_list, $data, $where_query, $latest_permalink, $widget_name);

		$latest_html	= '<article class="swiper_wrap_all">';
		$latest_html	.= '<div class="product_swiper swiper-container-initialized swiper-container-horizontal">';
		$latest_html	.= '<ul class="swiper-wrapper">';
		
		if(!empty($latest_list)){
			foreach($latest_list as $latest_item){
				if(!empty($latest_item['board_url'])) $latest_permalink		= $latest_item['board_url'];
				$post_content		= mbw_htmlspecialchars_decode($latest_item[$board_field["fn_content"]]);
				if(mb_strlen($post_content)>$title_max_length){
					$post_content		= mb_substr($post_content, 0, $title_max_length)."...";
				}
				$latest_html	.= '<li class="swiper-slide">';
				$latest_html	.= '<div class="swiper_wrap">';
				$latest_html	.= '<a href="javascript:;">';

				if(isset($data['type']) && $data['type'] == 'qna'){
					$latest_html	.= '<div class="qna_box">';
					$latest_html	.= '<h1>Q</h1>';
					$latest_html	.= '<ul class="q_box">';
					$latest_html	.= '<li>'.esc_attr($latest_item[$board_field["fn_title"]]).'</li>';
					$latest_html	.= '</ul>';
					$latest_html	.= '<ul class="a_box">';
					$latest_html	.= '<li>'.$post_content.'</li>';
					$latest_html	.= '</ul>';
					$latest_html	.= '<p class="more"><a href="'.$latest_permalink.$latest_item[$board_field["fn_pid"]].'">더보기</a></p>';
					$latest_html	.= '</div>';
				} else {
					$latest_html	.= '<div class="img_box">';
					$latest_html	.= '<img src="'.mbw_get_image_url("url_small",$latest_item['image_path']).'" alt="시계감정" />';
					$latest_html	.= '</div>';
					$latest_html	.= '<div class="text_box"><ul>';
					$latest_html	.= '<li><h3>'.esc_attr($latest_item[$board_field["fn_title"]]).'</h3></li>';
					$latest_html	.= '<li><p>'.$post_content.'</p></li>';
					$latest_html	.= '</ul></div>';
				}
				$latest_html	.= '</a>';
				$latest_html	.= '</div>';
				$latest_html	.= '</li>';
			}
		}else{
			
		}
		$latest_html	.= "</ul>";
		$latest_html	.= "<div class='swiper-button-prev swiper-button-disabled' tabindex='-1' role='button' aria-label='Previous slide' aria-disabled='true'><i>다음</i></div>";
		$latest_html	.= "<div class='swiper-button-next' tabindex='0' role='button' aria-label='Next slide' aria-disabled='false'><i>이전</i></div>";
		$latest_html	.= "<span class='swiper-notification' aria-live='assertive' aria-atomic='true'></span>";
		$latest_html	.= "</div>";
		$latest_html	.= "</article>";
		if(has_filter('mf_widget_html')) $latest_html			= apply_filters("mf_widget_html", $latest_html, $data, $widget_name);
		return $latest_html;
	}
}

add_shortcode("mb_latest_video", 'mbw_create_latest_mb_video');
if(!function_exists('mbw_create_latest_mb_video')){
	function mbw_create_latest_mb_video($args){
		if(!empty($args['echo'])){
			echo mbw_get_latest_mb_video("shortcode",$args);
		}else{
			return mbw_get_latest_mb_video("shortcode",$args);
		}
	}
}

if(!function_exists('mbw_get_latest_mb_video')){
	function mbw_get_latest_mb_video($mode,$data){
		global $mdb,$mstore,$mb_admin_tables,$mb_fields;
		$device_type				= mbw_get_vars("device_type");
		$widget_name			= basename(dirname(__FILE__));
		$title_max_length		= 20;
		if(!empty($data['maxlength'])) $title_max_length		= $data['maxlength'];
		else if($mode=="shortcode") $title_max_length		= 40;
		
		if(empty($data['name'])) return;
		else $name			= mbw_value_filter(str_replace('"',"",$data['name']),"name");
		$post_id		= "";
		if(strlen($name)>3){
			if(empty($data['post_id'])){
				$post_id	= $mdb->get_var($mdb->prepare("SELECT ".$mb_fields["board_options"]["fn_post_id"]." FROM ".$mb_admin_tables["board_options"]." where ".$mb_fields["board_options"]["fn_board_name2"]."=%s limit 1",$name));
			}else $post_id			= mbw_value_filter($data['post_id'],"int");
		}
		if(empty($data['list_size'])) $list_size			= "5";
        else $list_size			= mbw_value_filter($data['list_size'],"int");
		if(!empty($data['list_page'])) $list_page	= intval($data['list_page'])-1;
		else $list_page		= 0;
		if($list_page<0) $list_page	= 0;
		if(empty($data['title'])) $title			= "";
        else $title			= $data['title'];
		if(empty($data['link_type'])) $link_type			= "view";
        else $link_type			= $data['link_type'];
		if(!empty($data['link_target'])) $link_target	= ' target="'.mbw_value_filter($data['link_target'],"name").'"';
        else $link_target		= "";
		if(empty($data['use_category'])) $use_category		= "false";
        else $use_category			= $data['use_category'];

		if(empty($data['search_field'])) $search_field			= "";
        else $search_field			= mbw_value_filter($data['search_field'],"name");
		if(!isset($data['search_text'])) $search_text			= "";
        else $search_text			= $data['search_text'];
		if(empty($data['category1'])) $category1			= "";
        else $category1			= $data['category1'];
		if(empty($data['category2'])) $category2			= "";
        else $category2			= $data['category2'];
		if(empty($data['category3'])) $category3			= "";
        else $category3			= $data['category3'];
		if(!empty($data['date_after'])){
			$date_after		= mbw_value_filter(trim($data['date_after']),"date1");
			if($data['date_after']!=$date_after){		// -7 days 형태로 입력이 되었을 경우
				$date_after		= date('Y-m-d',strtotime($data['date_after']));
			}
		}else $date_after = "";
		if(!empty($data['date_before'])){
			$date_before		= mbw_value_filter(trim($data['date_before']),"date1");
			if($data['date_before']!=$date_before){	// -7 days 형태로 입력이 되었을 경우
				$date_before		= date('Y-m-d',strtotime($data['date_before']));
			}
		}else $date_before = "";
		if(empty($data['order_by'])) $order_by			= "pid";
        else $order_by			= mbw_value_filter($data['order_by'],"name");
		if(empty($data['order_type'])) $order_type			= "desc";
        else $order_type			= mbw_value_filter($data['order_type'],"name");

		if(empty($data['class'])) $div_class			= "";
        else $div_class			= " ".esc_attr($data['class']);
		if(empty($data['style'])) $div_style			= "";
        else $div_style			= " style='".str_replace("'",'"',esc_attr($data['style']))."'";

		$head_title_style1		= "";
		if(!empty($data['head_title_font_size'])){
			if(strpos($data['head_title_font_size'],'px')===false) $data['head_title_font_size']	.= "px";
			$head_title_style1	.= 'font-size:'.mbw_value_filter($data['head_title_font_size']).' !important;';
		}
		if(!empty($data['head_title_font_color'])){
			$data['head_title_font_color']		= mbw_value_filter($data['head_title_font_color'],"color");
			if(strpos($data['head_title_font_color'],'#')!==0 && strpos($data['head_title_font_color'],'rgba(')!==0) $data['head_title_font_color']	= "#".$data['head_title_font_color'];
			$head_title_style1	.= 'color:'.$data['head_title_font_color'].' !important;';
		}
		if(!empty($data['head_title_line_height'])){
			$head_title_style1	.= 'line-height:'.mbw_value_filter($data['head_title_line_height'],"number").' !important;';
		}
		if(!empty($data['head_title_font_weight'])){
			$head_title_style1	.= 'font-weight:'.mbw_value_filter($data['head_title_font_weight']).' !important;';
		}
		if(!empty($head_title_style1)){
			$head_title_style1	= " style='".str_replace("'",'"',esc_attr($head_title_style1))."'";
		}

		$add_text_style1		= "";
		if(!empty($data['title_font_size'])){
			if(strpos($data['title_font_size'],'px')===false) $data['title_font_size']	.= "px";
			$add_text_style1	.= 'font-size:'.mbw_value_filter($data['title_font_size']).' !important;';
		}
		if(!empty($data['title_font_color'])){
			$data['title_font_color']		= mbw_value_filter($data['title_font_color'],"color");
			if(strpos($data['title_font_color'],'#')!==0 && strpos($data['title_font_color'],'rgba(')!==0) $data['title_font_color']	= "#".$data['title_font_color'];
			$add_text_style1	.= 'color:'.$data['title_font_color'].' !important;';
		}
		if(!empty($data['title_line_height'])){
			$add_text_style1	.= 'line-height:'.mbw_value_filter($data['title_line_height'],"number").' !important;';
		}
		if(!empty($data['title_font_weight'])){
			$add_text_style1	.= 'font-weight:'.mbw_value_filter($data['title_font_weight']).' !important;';
		}
		if(!empty($add_text_style1)){
			$add_text_style1	= " style='".str_replace("'",'"',esc_attr($add_text_style1))."'";
		}

		$add_text_style2		= "";
		if(!empty($data['category_font_size'])){
			if(strpos($data['category_font_size'],'px')===false) $data['category_font_size']	.= "px";
			$add_text_style2	.= 'font-size:'.mbw_value_filter($data['category_font_size']).' !important;';
		}
		if(!empty($data['category_font_color'])){
			$data['category_font_color']		= mbw_value_filter($data['category_font_color'],"color");
			if(strpos($data['category_font_color'],'#')!==0 && strpos($data['category_font_color'],'rgba(')!==0) $data['category_font_color']	= "#".$data['category_font_color'];
			$add_text_style2	.= 'color:'.$data['category_font_color'].' !important;';
		}
		if(!empty($data['category_line_height'])){
			$add_text_style2	.= 'line-height:'.mbw_value_filter($data['category_line_height'],"number").' !important;';
		}
		if(!empty($data['category_font_weight'])){
			$add_text_style2	.= 'font-weight:'.mbw_value_filter($data['category_font_weight']).' !important;';
		}
		if(!empty($add_text_style2)){
			$add_text_style2	= " style='".str_replace("'",'"',esc_attr($add_text_style2))."'";
		}

		$add_comment_style1		= "";
		if(!empty($data['comment_font_size'])){
			if(strpos($data['comment_font_size'],'px')===false) $data['comment_font_size']	.= "px";
			$add_comment_style1	.= 'font-size:'.mbw_value_filter($data['comment_font_size']).' !important;';
		}
		if(!empty($data['comment_font_color'])){
			$data['comment_font_color']		= mbw_value_filter($data['comment_font_color'],"color");
			if(strpos($data['comment_font_color'],'#')!==0 && strpos($data['comment_font_color'],'rgba(')!==0) $data['comment_font_color']	= "#".$data['comment_font_color'];
			$add_comment_style1	.= 'color:'.$data['comment_font_color'].' !important;';
		}
		if(!empty($data['comment_line_height'])){
			$add_comment_style1	.= 'line-height:'.mbw_value_filter($data['comment_line_height'],"number").' !important;';
		}
		if(!empty($data['comment_font_weight'])){
			$add_comment_style1	.= 'font-weight:'.mbw_value_filter($data['comment_font_weight']).' !important;';
		}
		if(!empty($add_comment_style1)){
			$add_comment_style1	= " style='".str_replace("'",'"',esc_attr($add_comment_style1))."'";
		}

		//필요한 게시판 필드 이름 가져오기
		$select_field			= array("fn_pid","fn_title","fn_content","fn_image_path","fn_category1","fn_category2","fn_category3","fn_image_path","fn_reg_date","fn_comment_count","fn_homepage");
		if(!empty($search_field) && $search_text!="") $select_field[]			= $search_field;
		$board_field			= $mstore->get_board_select_fields($select_field,$name);

		$latest_permalink		= get_permalink($post_id);
		if(strpos($latest_permalink, '?') === false)	$latest_permalink		.= "?";
		else 	$latest_permalink		.= "&";
		if(!empty($category1)) $latest_permalink		.= "category1=".$category1."&";			
		if(!empty($category2)) $latest_permalink		.= "category2=".$category2."&";			
		if(!empty($category3)) $latest_permalink		.= "category3=".$category3."&";			
		if($link_type=="item"){
			$latest_permalink		.= "item=";
		}else{
			$latest_permalink		.= "vid=";
		}
		
		$table_name				= mbw_get_table_name($name);

		$where_query				= "";
		$where_data				= array();
		if(!empty($date_after)){
			$where_data[]		= $mdb->prepare($board_field["fn_reg_date"].">%s",$date_after);
		}
		if(!empty($date_before)){
			$where_data[]		= $mdb->prepare($board_field["fn_reg_date"]."<%s",$date_before);
		}
		if(!empty($category1)){
			if(strpos($category1, ',') !== false){
				$category1_array		= explode(',',$category1);
				$filter_array1			= array();
				foreach($category1_array as $item){
					$filter_array1[]		= $mdb->prepare($board_field["fn_category1"]."=%s", $item );
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array1).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category1"]."=%s",$category1);
			}
		}
		if(!empty($category2)){
			if(strpos($category2, ',') !== false){
				$category2_array		= explode(',',$category2);
				$filter_array2			= array();
				foreach($category2_array as $item){
					$filter_array2[]		= $mdb->prepare($board_field["fn_category2"]."=%s", $item);
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array2).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category2"]."=%s",$category2);
			}
		}
		if(!empty($category3)){
			if(strpos($category3, ',') !== false){
				$category3_array		= explode(',',$category3);
				$filter_array3			= array();
				foreach($category3_array as $item){
					$filter_array3[]		= $mdb->prepare($board_field["fn_category3"]."=%s", $item);
				}
				$where_data[]		= " (".implode( ' OR ', $filter_array3).")";
			}else{
				$where_data[]		= $mdb->prepare($board_field["fn_category3"]."=%s",$category3);
			}
		}
		$latest_list		= array();
		if(!empty($search_field) && $search_text!="") $where_data[] = $mdb->prepare($search_field." like %s","%".$search_text."%");
		if(!empty($where_data)) $where_query				= " WHERE ".implode(" and ",$where_data);
		if(strlen($name)>3){			
			$latest_list		= $mdb->get_results("SELECT * FROM ".$table_name.$where_query." order by ".mbw_value_filter($order_by,"name")." ".mbw_value_filter($order_type,"name")." limit ".mbw_value_filter($list_page,"int").",".mbw_value_filter($list_size,"int"), ARRAY_A);
		}
		if(has_filter('mf_widget_latest_items')) $latest_list			= apply_filters("mf_widget_latest_items", $latest_list, $data, $where_query, $latest_permalink, $widget_name);

		$latest_html	= '<article class="video_wrap">';
		$latest_html	.= '<ul class="flex_wrap">';

		if(!empty($latest_list)){
			foreach($latest_list as $latest_item){
				if(!empty($latest_item['board_url'])) $latest_permalink		= $latest_item['board_url'];
				$post_content		= mbw_htmlspecialchars_decode($latest_item[$board_field["fn_content"]]);
				if(mb_strlen($post_content)>$title_max_length){
					$post_content		= mb_substr($post_content, 0, $title_max_length)."...";
				}

				$latest_html	.= '<li>';
				$latest_html	.= '<a href="'.$latest_permalink.$latest_item[$board_field["fn_pid"]].'">';
				$latest_html	.= '<img src="'.mbw_get_image_url("url_small",$latest_item['image_path']).'" alt="'.esc_attr($latest_item[$board_field["fn_title"]]).'">';
				$latest_html	.= '<p class="icon">아이콘</p>';
				$latest_html	.= '</a>';
				$latest_html	.= '</li>';
			}
		}else{
			
		}
		$latest_html	.= '</ul>';
		$latest_html	.= '</article>';
		if(has_filter('mf_widget_html')) $latest_html			= apply_filters("mf_widget_html", $latest_html, $data, $widget_name);
		return $latest_html;
	}
}