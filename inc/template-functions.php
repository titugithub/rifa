<?php

/**
 * Body class
 * Post Category
 * Image Alt Text
 * Post Social
 * Post Tag
 * Pagination
 * */ 

/**Add Custom class in Body like archieve, search, etc. **/ 
function rifa_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    if ( !empty($get_user) ) {
        $classes[] = 'profile-breadcrumb';
    }

    return $classes;
}
add_filter( 'body_class', 'rifa_body_classes' );




/** Get categories **/
function rifa_get_category() {

    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ( $categories as $category ) {

        if ( $x == 2 ) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>';

    }
}



/** img alt-text **/
function rifa_img_alt_text( $img_er_id = null ) {
    $image_id = $img_er_id;
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
    $image_title = get_the_title( $image_id );

    if ( !empty( $image_id ) ) {
        if ( $image_alt ) {
            $alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
        } else {
            $alt_text = get_the_title( $image_id );
        }
    } else {
        $alt_text = esc_html__( 'Image Alt Text', 'rifa' );
    }

    return $alt_text;
}





/**Social Blog For Blog Post**/ 
function rifa_get_social()
{ ?>

<div class="social flex-wrap">
    <p class="share_title flex-shrink-0 mb-0"><?php echo esc_html__('Share -', 'rifa'); ?></p>
    <a href="http://www.facebook.com/sharer/sharer.php?u=" class="box_8 p-0 btn_theme btn_alt">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="http://www.twitter.com/share?url=" class="box_8 p-0 btn_theme btn_alt">
        <i class="fab fa-twitter"></i>
    </a>
    <a href="https://pinterest.com/pin/create/button/?url=" class="box_8 p-0 btn_theme btn_alt">
        <i class="fab fa-pinterest-p"></i>
    </a>
    <a href="http://www.twitch.com/share?url=" class="box_8 p-0 btn_theme btn_alt">
        <i class="fab fa-twitch"></i>
    </a>
    <a href="https://skype.com/pin/create/button/?url=" class="box_8 p-0 btn_theme btn_alt">
        <i class="fab fa-skype"></i>
    </a>
</div>


<?php
}



/**Blog detail tag Por Post**/
function rifa_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<div class="ft-post-tag"><span>' . esc_html__('Post Tags : ', 'rifa') . '</span>';
        $tag_list = get_the_tag_list('', ' ', '');
        $tag_list_with_classes = str_replace('<a ', '<a class="btn_theme btn_alt" ', $tag_list);
        $html .= $tag_list_with_classes;
        $html .= '</div>';
    }
    return $html;
}


/**Pagination**/ 

if (!function_exists('rifa_pagination')) {

    function _rifa_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function rifa_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _rifa_pagi_callback($pagi);
    }
}
