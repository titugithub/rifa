<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rifa
 */


/**Header Selection from Page or Customize Option**/ 
function rifa_check_header()
{
    $rifa_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $rifa_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');

    if ($rifa_header_style == 'header-style-1' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-1');
    } elseif ($rifa_header_style == 'header-style-2' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-2');
    } elseif ($rifa_header_style == 'header-style-3' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-3');
    } else {

        /** default header style **/
        if ($rifa_default_header_style == 'header-style-2') {
            get_template_part('template-parts/header/header-2');
        } elseif ($rifa_default_header_style == 'header-style-3') {
            get_template_part('template-parts/header/header-3');
        } else {
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('rifa_header_style', 'rifa_check_header', 10);




/**header logo**/ 
function rifa_header_logo()
{
    $rifa_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
    $rifa_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/images/logo/logo.png');
    $rifa_secondary_logo = get_theme_mod('seconday_logo', get_template_directory_uri() . '/assets/images/logo/logo.png');

    if (!empty($rifa_logo_on) && !empty($rifa_site_logo)) {
        // Display secondary logo
        echo '<a class="secondary-logo" href="' . esc_url(home_url('/')) . '">
                <img src="' . esc_url($rifa_secondary_logo) . '" alt="' . esc_attr__('logo', 'rifa') . '" />
              </a>';
        return true;
    } elseif (!empty($rifa_site_logo)) {
        // Display primary logo
        echo '<a class="standard-logo" href="' . esc_url(home_url('/')) . '">
                <img src="' . esc_url($rifa_site_logo) . '" alt="' . esc_attr__('logo', 'rifa') . '" />
              </a>';
        return true;
    }

    return false; // No logo was displayed
}



/**Rigister Nav Menu**/ 
function rifa_header_menu()
{
    ?>
    <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_class'     => 'navbar-nav mr-auto mb-2 mb-lg-0',
            'container'      => '',
            'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
            'walker'         => new Eduker_Navwalker_Class,
        ]);
        ?>
<?php
}




/**Footer Copyright Text**/
function rifa_copyright_text()
{
    $home_url = esc_url(home_url('/')); // Get the home URL
    $copyright_text = get_theme_mod('rifa_copyright', 'Copyright © 2023 <a href="' . $home_url . '">Bankio</a> - All Rights Reserved');
    echo wp_kses($copyright_text, array(
        'a' => array(
            'href' => array(),
        ),
    ));
}







/**WPML Menu Language Select Option**/  
function rifa_header_lang_defualt()
{
    $rifa_header_lang = get_theme_mod('rifa_header_lang', false);
    if ($rifa_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'rifa'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('rifa_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
<?php
}



/**WPML Menu Language Select Option**/ 
function _rifa_language($mar)
{
    return $mar;
}
function rifa_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__('English', 'rifa') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('Bangla', 'rifa') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('French', 'rifa') . '</a></li>';
        $mar .= ' </ul>';
    }
    print _rifa_language($mar);
}
add_action('rifa_language', 'rifa_language_list');

