<?php


// Retrieve theme customizer settings
$container_width = get_theme_mod('container_width', '');
$breadcrumb_ptop = get_theme_mod('breadcrumb_ptop', '');
$breadcrumb_pbottom = get_theme_mod('breadcrumb_pbottom', '');
$breadcrumb_alignment = get_theme_mod('align_setting', 'left');
$logo_width = get_theme_mod('logo_width', '');
$logo_width_small = get_theme_mod('logo_width_small', '');
$breadcrumb_icon_color = get_theme_mod('rifa_breadcrumb_icon_color', '');
$primay_color = get_theme_mod('rifa_color_option_1', '');
$secondary_color = get_theme_mod('rifa_color_option_2', '');

// Initialize an empty string for custom CSS
$custom_css = '';

// Container width
if (!empty($container_width)) {
    $custom_css .= ".container { max-width: {$container_width}px !important; } ";
}

// Breadcrumb padding
if (!empty($breadcrumb_ptop) || !empty($breadcrumb_pbottom)) {
    $custom_css .= ".banner-section.inner-banner .banner-content { padding-top: {$breadcrumb_ptop}px !important; padding-bottom: {$breadcrumb_pbottom}px !important; } ";
}

// Breadcrumb icon color
if (!empty($breadcrumb_icon_color)) {
    $custom_css .= ".banner-section.inner-banner .banner-content i { color: {$breadcrumb_icon_color}; } ";
}

// Breadcrumb text alignment
if (!empty($breadcrumb_alignment)) {
    $custom_css .= ".banner-content .main-content { text-align: {$breadcrumb_alignment}; } ";
}

// Logo width for large screens
if (!empty($logo_width)) {
    $custom_css .= "a.standard-logo img { width: {$logo_width}px !important; } ";
}

// Logo width for small screens
if (!empty($logo_width_small)) {
    $custom_css .= "@media only screen and (max-width: 768px) { a.standard-logo img { width: {$logo_width_small}px !important; } } ";
}

// Primary color
if (!empty($primay_color)) {
    $custom_css .= ":root {
     --primary-color: {$primay_color} !important; 
     } 

   
    .example { background-color: var(--primary-color) !important; }
    .example2 {color: var(--primary-color) !important; }
     
     
     ";
}

// Secondary color
if (!empty($secondary_color)) {
    $custom_css .= ":root { --secondary-color: {$secondary_color} !important; } ";
}





// Output the custom CSS
?>
<style type="text/css">
    <?php echo $custom_css; ?>
</style>
