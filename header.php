<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rifa
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>

    <?php 
    if(function_exists('icl_get_languages')) {
        echo rifa_get_language_switcher();
    } 
    ?>

    <!-- header start -->
    <?php do_action( 'rifa_header_style' );?>
    <!-- header end -->
    
    <?php if(current_user_can('administrator')) : ?>
        <div style="position: fixed; bottom: 0; left: 0; background: #fff; padding: 10px; z-index: 9999;">
            Current Locale: <?php echo get_locale(); ?><br>
            Plugin Text Domain Loaded: <?php echo (isset($GLOBALS['l10n']['rifa-core']) ? 'Yes' : 'No'); ?><br>
            Theme Text Domain Loaded: <?php echo (isset($GLOBALS['l10n']['rifa']) ? 'Yes' : 'No'); ?><br>
            Current Language: <?php echo isset($_GET['lang']) ? $_GET['lang'] : 'none'; ?><br>
            Available Translations: <?php print_r(get_available_languages()); ?>
        </div>
    <?php endif; ?>
  