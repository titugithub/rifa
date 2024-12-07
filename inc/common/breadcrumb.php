<?php
function rifa_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;


    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'rifa'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'rifa'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'rifa'));
    } elseif (is_single() && 'courses' == get_post_type()) {
        $title = esc_html__('Course Details', 'rifa');
    } elseif ('courses' == get_post_type()) {
        $title = esc_html__('Courses', 'rifa');
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'rifa') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'rifa');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'rifa'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }


    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';
        $inner_img_from_page = function_exists('get_field') ? get_field('breadcrumb_inner_image', $_id) : '';
        $hide_inner_img = function_exists('get_field') ? get_field('hide_inner_inner_image', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true);
        $inner_img = get_theme_mod('breadcrumb_inner_thumb');
        $rifa_breadcrumb_switch = get_theme_mod('rifa_breadcrumb_switch', false);
        $breadcrumb_text_switch = get_theme_mod('breadcrumb_text_switch', true);
        $breadcrumb_title_switch = get_theme_mod('breadcrumb_title_switch', true);


        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>

        <?php
                if ($hide_inner_img && empty($_GET['s'])) {
                    $inner_img = '';
                } else {
                    $inner_img = !empty($inner_img_from_page) ? $inner_img_from_page['url'] : $inner_img;
                } ?>

        <!-- page title area start -->


        <?php
                // Check if the breadcrumb switch is enabled
                if (!empty($breadcrumb_switch)) : ?>
            <section class="banner-section inner-banner about d-none">
                <!-- Set the background image for the banner section -->
                <div style="background-image: url('<?php echo esc_url($bg_img); ?>');" class="overlay">
                    <div class="banner-content d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-12">
                                    <div class="main-content">
                                        <!-- Display the main title -->
                                        <h1><?php echo wp_kses_post($title); ?></h1>

                                        <div class="breadcrumb-area">
                                            <!-- Breadcrumb navigation -->
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb d-flex align-items-center">
                                                    <?php
                                                                // Check if the breadcrumb function exists and display breadcrumbs
                                                                if (function_exists('bcn_display')) {
                                                                    bcn_display();
                                                                }
                                                                ?>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <div class="inner-hero-section style--four">
                <div class="bg-shape">
                    <img src="<?php echo esc_url($bg_img); ?>" alt="<?php echo esc_attr($title); ?>">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <ul class="page-list">
                                <?php
                                // Check if the breadcrumb function exists and display breadcrumbs
                                if (function_exists('bcn_display')) {
                                    bcn_display();
                                } else {
                                    // Fallback breadcrumb if BCN is not available
                                    ?>
                                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'rifa'); ?></a></li>
                                    <?php if (!is_front_page()) : ?>
                                        <li class="active"><?php echo wp_kses_post($title); ?></li>
                                    <?php endif; ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>














        <?php endif; // End of breadcrumb switch check 
                ?>











        <?php
                /*
        if (!empty($breadcrumb_switch)) : ?>
            <section style="background: url('<?php echo esc_url($bg_img); ?>') bottom center / cover no-repeat;" class="banner-section inner-banner about">
                <div class="container ">
                    <div class="row gy-4 gy-sm-0 align-items-center">
                        <div class="col-12  <?php echo esc_html(($rifa_breadcrumb_switch) ? 'col-sm-6' : 'col-sm-12')   ?>">
                            <div class="banner__content">
                                <?php if (!empty($breadcrumb_title_switch)) : ?>
                                    <h1 class="banner__title display-4 wow fadeInLeft" data-wow-duration="0.8s"><?php echo wp_kses_post($title); ?></h1>
                                <?php endif; ?>
                                <?php if (!empty($breadcrumb_text_switch)) : ?>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb wow fadeInRight d-flex align-items-center gap-2" data-wow-duration="0.8s">
                                            <?php if (function_exists('bcn_display')) {
                                                bcn_display();
                                            } ?>
                                        </ol>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!empty($rifa_breadcrumb_switch)) : ?>
                            <?php if (!empty($inner_img)) : ?>
                                <div class="col-12 col-sm-6">
                                    <div class="banner__thumb text-end">
                                        <img src="<?php echo esc_url($inner_img); ?>" alt="image">
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif;
        */
                ?>




        <!-- page title area end -->
    <?php
        }
    }

    add_action('rifa_before_main_content', 'rifa_breadcrumb_func');

    // rifa_search_form
    function rifa_search_form()
    {
        ?>
    <div class="search-wrapper p-relative transition-3 d-none">
        <div class="search-form transition-3">
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Enter Your Keyword', 'rifa'); ?>">
                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
            </form>
            <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
        </div>
    </div>
<?php
}

add_action('rifa_before_main_content', 'rifa_search_form');
