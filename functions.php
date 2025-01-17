<?php

/**
 * rifa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rifa
 */

if ( !function_exists( 'rifa_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function rifa_setup() {
        load_theme_textdomain('rifa', get_template_directory() . '/languages');
        load_theme_textdomain('ftcore', get_template_directory() . '/languages');

        if (!get_option('rifa_languages')) {
            update_option('rifa_languages', [
                'en_US' => 'English',
                'ar' => 'العربية'
            ]);
        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on rifa, use a find and replace
         * to change 'rifa' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'rifa', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( [
            'main-menu' => esc_html__( 'Main Menu', 'rifa' ),
            'category-menu' => esc_html__( 'Category Menu', 'rifa' ),
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'rifa_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable custom header
        add_theme_support( 'custom-header' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ] );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        remove_theme_support( 'widgets-block-editor' );

        add_image_size( 'rifa-blog', 416, 235, [ 'center', 'center' ] );
    }
endif;
add_action( 'after_setup_theme', 'rifa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rifa_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'rifa_content_width', 640 );
}
add_action( 'after_setup_theme', 'rifa_content_width', 0 );




/**
 * Enqueue scripts and styles.
 */

define( 'RIFA_THEME_DIR', get_template_directory() );
define( 'RIFA_THEME_URI', get_template_directory_uri() );
define( 'RIFA_THEME_CSS_DIR', RIFA_THEME_URI . '/assets/css/' );
define( 'RIFA_THEME_JS_DIR', RIFA_THEME_URI . '/assets/js/' );
define( 'RIFA_THEME_INC', RIFA_THEME_DIR . '/inc/' );



// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
require RIFA_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require RIFA_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require RIFA_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once RIFA_THEME_INC . 'kirki-customizer.php';
include_once RIFA_THEME_INC . 'class-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require RIFA_THEME_INC . 'jetpack.php';
}


/**
 * include rifa functions file
 */
require_once RIFA_THEME_INC . 'class-navwalker.php';
require_once RIFA_THEME_INC . 'class-tgm-plugin-activation.php';
require_once RIFA_THEME_INC . 'add_plugin.php';
require_once RIFA_THEME_INC . '/common/breadcrumb.php';
require_once RIFA_THEME_INC . '/common/scripts.php';
require_once RIFA_THEME_INC . '/common/widgets.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rifa_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'rifa_pingback_header' );

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function rifa_move_comment_textarea_to_bottom( $fields ) {
    $comment_field       = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'rifa_move_comment_textarea_to_bottom' );


// rifa_comment 
if ( !function_exists( 'rifa_comment' ) ) {
    function rifa_comment( $comment, $args, $depth ) {
        $GLOBAL['comment'] = $comment;
        extract( $args, EXTR_SKIP );
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr( $depth );
        ?>
            <li id="comment-<?php comment_ID();?>">
                <div class="comments-box grey-bg-2">
                    <div class="comments-avatar">
                        <?php print get_avatar( $comment, 102, null, null, [ 'class' => [] ] );?>
                    </div>
                    <div class="comments-text">
                        <div class="avatar-name">
                            <h5><?php print get_comment_author_link();?></h5>
                            <span><?php comment_time( get_option( 'date_format' ) );?></span>
                        </div>
                        <?php comment_text();?>

                        <div class="comments-replay">
                            <?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) );?>
                        </div>

                    </div>
                </div>
        <?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'rifa_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function rifa_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// rifa_search_filter_form
if ( !function_exists( 'rifa_search_filter_form' ) ) {
    function rifa_search_filter_form( $form ) {

        $form = sprintf(
            '<div class="sidebar__widget-px"><div class="search-px"><form class="sidebar__search p-relative" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="far fa-search"></i>  </button>
		</form></div></div>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_search_query() ),
            esc_html__( 'Search', 'rifa' )
        );

        return $form;
    }
    add_filter( 'get_search_form', 'rifa_search_filter_form' );
}

add_action( 'admin_enqueue_scripts', 'rifa_admin_custom_scripts' );

function rifa_admin_custom_scripts() {
    wp_enqueue_media();
    wp_enqueue_style( 'customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css',array());
    wp_register_script( 'rifa-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'rifa-admin-custom' );
}





function rifa_enqueue_dynamic_styles() {
    require get_template_directory() . '/inc/dynamic-style.php';
}

add_action( 'wp_head', 'rifa_enqueue_dynamic_styles' );




// ====================Add language switcher function======================//

/**
 * Register required plugins
 */
function rifa_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'WPML Multilingual CMS',
            'slug'      => 'sitepress-multilingual-cms',
            'required'  => false,
            'source'    => 'https://wpml.org/', // Users will need to purchase from wpml.org
        ),
    );

    tgmpa($plugins);
}
add_action('tgmpa_register', 'rifa_register_required_plugins');

/**
 * Load language based on query parameter
 */
function rifa_load_language() {
    if(isset($_GET['lang'])) {
        $lang = sanitize_text_field($_GET['lang']);
        
        // Set the locale based on language
        switch($lang) {
            case 'ar':
                $locale = 'ar';
                break;
            default:
                $locale = 'en_US';
        }
        
        // Set WordPress locale
        if(!empty($locale)) {
            global $locale;
            $locale = $locale;
            
            // Load both theme and plugin translations
            $languages_path = get_template_directory() . '/languages';
            $plugin_languages_path = WP_PLUGIN_DIR . '/rifa-core/languages';
            
            // Theme translations
            load_textdomain('rifa', $languages_path . '/rifa-' . $locale . '.mo');
            
            // Plugin translations
            load_textdomain('rifa-core', $plugin_languages_path . '/rifa-core-' . $locale . '.mo');
            
            // Add RTL support for Arabic
            if($lang === 'ar') {
                add_filter('language_attributes', function($output) {
                    return $output . ' dir="rtl"';
                });
            }
        }
    }
}
add_action('init', 'rifa_load_language', 0);

/**
 * Set the locale filter
 */
function rifa_set_locale($locale) {
    if(isset($_GET['lang'])) {
        $lang = sanitize_text_field($_GET['lang']);
        switch($lang) {
            case 'ar':
                return 'ar';
            default:
                return 'en_US';
        }
    }
    return $locale;
}
add_filter('locale', 'rifa_set_locale', 10);
