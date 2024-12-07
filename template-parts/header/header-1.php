<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rifa
 */

// info
$rifa_btn_switch = get_theme_mod('rifa_btn_switch', false);

// contact button
$rifa_button_text = get_theme_mod('rifa_btn_text', __('Open Account', 'rifa'));
$rifa_button_link = get_theme_mod('rifa_btn_link', __('#', 'rifa'));

// header right
$rifa_header_right = get_theme_mod('rifa_header_right', false);
$rifa_menu_col = $rifa_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>

<!-- header area start -->

<?php
$rifa_preloader = get_theme_mod('rifa_preloader', false);
$rifa_backtotop = get_theme_mod('rifa_backtotop', false);


?>

<?php if (!empty($rifa_preloader)) : ?>
   <!-- pre loader area start -->
   <div class="preloader" id="preloader"></div>
   <!-- pre loader area end -->
<?php endif; ?>

<?php if (!empty($rifa_backtotop)) : ?>
   <!-- back to top start -->
   <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
   <!-- back to top end -->
<?php endif; ?>


<header class="header-section header-menu">
   <div class="overlay">
      <div class="container">
         <div class="row d-flex header-area">
            <nav class="navbar navbar-expand-lg navbar-light">

               <?php
               if (function_exists('rifa_header_logo') && rifa_header_logo()) :
               // The logo is displayed inside the rifa_header_logo() function, so no need to add anything here.
               else :
                  // Display the site title as a fallback if no logo is set
                  ?>
                  <h1 class="site-title">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                     </a>
                  </h1>
               <?php
               endif;
               ?>


               <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                  <i class="fas fa-bars"></i>
               </button>
               <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                  <?php rifa_header_menu(); ?>
                  <?php if (!empty($rifa_btn_switch)) : ?>
                     <div class="right-area header-action d-flex align-items-center">
                        <a href="<?php echo esc_url($rifa_button_link) ?>" class="cmn-btn"><?php echo esc_html($rifa_button_text) ?></a>
                     </div>
                  <?php endif; ?>
               </div>
            </nav>
         </div>
      </div>
   </div>
</header>






<!-- header area end -->