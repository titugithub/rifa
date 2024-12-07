<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rifa_widgets_init() {

 

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'rifa' ),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__( 'Set Your Blog Widget', 'rifa' ),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-60 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar__widget-head mb-35"><h3 class="sidebar__widget-title">',
        'after_title'   => '</h3></div>',
    ] );






}
add_action( 'widgets_init', 'rifa_widgets_init' );