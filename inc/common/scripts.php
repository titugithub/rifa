<?php

/**
 * rifa_scripts description
 * @return [type] [description]
 */
function rifa_scripts() {
    // Enqueue styles
    wp_enqueue_style('theme-fonts', 'https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap');
    wp_enqueue_style('animate', RIFA_THEME_CSS_DIR . 'plugins/animate.min.css');
    wp_enqueue_style('all', RIFA_THEME_CSS_DIR . 'all.min.css');
    wp_enqueue_style('aos', RIFA_THEME_CSS_DIR . 'plugins/aos.css');
    wp_enqueue_style('bootstrap.min', RIFA_THEME_CSS_DIR . 'plugins/bootstrap.min.css');
    wp_enqueue_style('dark-version', RIFA_THEME_CSS_DIR . 'plugin/dark-version.css');
    wp_enqueue_style('datepicker.min', RIFA_THEME_CSS_DIR . 'plugin/datepicker.min.css');
    wp_enqueue_style('lightcase', RIFA_THEME_CSS_DIR . 'plugins/lightcase.css');
    wp_enqueue_style('line-awesome.min', RIFA_THEME_CSS_DIR . 'line-awesome.min.css');
    wp_enqueue_style('nice-select', RIFA_THEME_CSS_DIR . 'plugins/nice-select.css');
    wp_enqueue_style('odometer', RIFA_THEME_CSS_DIR . 'plugins/odometer.css');
    wp_enqueue_style('owl.carousel.min', RIFA_THEME_CSS_DIR . 'plugins/owl.carousel.min.css');
    wp_enqueue_style('slick', RIFA_THEME_CSS_DIR . 'plugins/slick.css');



    wp_enqueue_style('space', RIFA_THEME_CSS_DIR . 'spacing.css');
    wp_enqueue_style('custom-header', RIFA_THEME_CSS_DIR . 'header.css');
    wp_enqueue_style('blog-css', RIFA_THEME_CSS_DIR . 'blog.css', [], time());
    wp_enqueue_style('unit', RIFA_THEME_CSS_DIR . 'unit.css', [], time());
    wp_enqueue_style('style-css', RIFA_THEME_CSS_DIR . 'style.css', [], time());
    wp_enqueue_style('custom', RIFA_THEME_CSS_DIR . 'custom.css', [], time());
    wp_enqueue_style('responsive', RIFA_THEME_CSS_DIR . 'responsive.css', [], time());
    wp_enqueue_style('dynamic-styles', get_template_directory_uri() . '/inc/dynamic-style.php', [], filemtime(get_template_directory() . '/inc/dynamic-style.php'));
    
    // Enqueue main stylesheet
    wp_enqueue_style('theme-style-handle', get_stylesheet_uri());

    // Enqueue scripts

    wp_enqueue_script('bootstrap-js', RIFA_THEME_JS_DIR . 'plugins/bootstrap.bundle.min.js', ['jquery'], '', true);
    wp_enqueue_script('datepicker.en', RIFA_THEME_JS_DIR . 'plugins/datepicker.en.js', ['jquery'], '', true);
    wp_enqueue_script('datepicker.min', RIFA_THEME_JS_DIR . 'plugins/datepicker.min.js', ['jquery'], '', true);
    wp_enqueue_script('jquery.countdown', RIFA_THEME_JS_DIR . 'plugins/jquery.countdown.js', ['jquery'], '', true);
    wp_enqueue_script('jquery.nice-select.min', RIFA_THEME_JS_DIR . 'plugins/jquery.nice-select.min.js', ['jquery'], '', true);
    wp_enqueue_script('lightcase', RIFA_THEME_JS_DIR . 'plugins/lightcase.js', ['jquery'], '', true);
    wp_enqueue_script('MorphSVGPlugin.min-js', RIFA_THEME_JS_DIR . 'plugins/MorphSVGPlugin.min.js', ['jquery'], false, true);
    wp_enqueue_script('preloader', RIFA_THEME_JS_DIR . 'plugins/preloader.js', ['jquery'], false, true);
    wp_enqueue_script('slick.min', RIFA_THEME_JS_DIR . 'plugins/slick.min.js', ['jquery'], '', true);
    wp_enqueue_script('TweenMax.min', RIFA_THEME_JS_DIR . 'plugins/TweenMax.min.js', ['jquery'], '', true);
    wp_enqueue_script('wow.min', RIFA_THEME_JS_DIR . 'plugins/wow.min.js', ['jquery'], '', true);


    wp_enqueue_script('custom-js', RIFA_THEME_JS_DIR . 'custom.js', ['jquery'], '', true);
    wp_enqueue_script('main-js', RIFA_THEME_JS_DIR . 'main.js', ['jquery'], '', true);


    // Enqueue comment reply script conditionally
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rifa_scripts');


