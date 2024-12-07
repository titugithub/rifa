<?php
/**
 * rifa customizer
 *
 * @package rifa
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function rifa_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'rifa_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Theme Customizer', 'rifa' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'General Setting', 'rifa' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );



    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'rifa' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'rifa' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'rifa' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'rifa' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'rifa' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );


    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'rifa' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'rifa' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );


    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'rifa' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'rifa_customizer',
    ] );



}

add_action( 'customize_register', 'rifa_customizer_panels_sections' );

function _header_top_fields( $fields ) {


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'rifa' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'rifa' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];

    $fields[] = [
        'type'     => 'number',
        'settings' => 'container_width',
        'label'    => esc_html__( 'Container width (Bootstrap Grid)', 'rifa' ),
        'section'  => 'header_top_setting',
        'priority' => 10,
    ];


    $fields[] = [
        'type'     => 'text',
        'settings' => 'service_slug',
        'label'    => esc_html__( 'Service Slug', 'rifa' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'service', 'rifa' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'service_cat_slug',
        'label'    => esc_html__( 'Service Category Slug', 'rifa' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'service_cat', 'rifa' ),
        'priority' => 10,
    ];


    return $fields;

}
add_filter( 'kirki/fields', '_header_top_fields' );



/*
Header Settings
 */
function _header_header_fields( $fields ) {


    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'rifa' ),
        'description' => esc_html__( 'Upload Your Logo.', 'rifa' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'     => 'number',
        'settings' => 'logo_width',
        'label'    => esc_html__( 'Logo Width( Large Device)', 'rifa' ),
        'section'  => 'section_header_logo',
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'number',
        'settings' => 'logo_width_small',
        'label'    => esc_html__( 'Logo Width( Small Device)', 'rifa' ),
        'section'  => 'section_header_logo',
        'priority' => 10,
    ];




    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );



/*
_header_page_title_fields
 */

    // Breadcrumb Setting
    function _header_page_title_fields($fields)
    {
        // Breadcrumb Setting
        $fields[] = [
            'type'     => 'switch',
            'settings' => 'breadcrumb_switch',
            'label'    => esc_html__('Breadcrumb Hide', 'rifa'),
            'section'  => 'breadcrumb_setting',
            'default'  => '1',
            'priority' => 10,
            'choices'  => [
                'on'  => esc_html__('Enable', 'rifa'),
                'off' => esc_html__('Disable', 'rifa'),
            ],
        ];
    
    
        $fields[] = [
            'type'        => 'image',
            'settings'    => 'breadcrumb_bg_img',
            'label'       => esc_html__('Breadcrumb Background Image', 'rifa'),
            'description' => esc_html__('Breadcrumb Background Image', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => get_template_directory_uri() . '/assets/images/inner_banner.png',
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
    
        $fields[] = [
            'type'        => 'color',
            'settings'    => 'rifa_breadcrumb_bg_color',
            'label'       => __('Breadcrumb BG Color', 'rifa'),
            'description' => esc_html__('This is a Breadcrumb bg color control.', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => '',
            'priority'    => 10,
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        $fields[] = [
            'type'        => 'color',
            'settings'    => 'rifa_breadcrumb_icon_color',
            'label'       => __('Breadcrumb Separetor Color', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => '',
            'priority'    => 10,
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
    
        // text 
        $fields[] = [
            'type'     => 'switch',
            'settings' => 'rifa_breadcrumb_switch',
            'label'    => esc_html__('breadcrumb Image', 'rifa'),
            'section'  => 'breadcrumb_setting',
            'default'  => '0',
            'priority' => 10,
            'choices'  => [
                'on'  => esc_html__('Enable', 'rifa'),
                'off' => esc_html__('Disable', 'rifa'),
            ],
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        $fields[] = [
            'type'        => 'image',
            'settings'    => 'breadcrumb_inner_thumb',
            'label'       => esc_html__('Breadcrumb inner Image', 'rifa'),
            'description' => esc_html__('Breadcrumb inner Image', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => get_template_directory_uri() . '/assets/images/reviews_banner.png',
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'rifa_breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        // Breadcrumb title Setting
        $fields[] = [
            'type'     => 'switch',
            'settings' => 'breadcrumb_title_switch',
            'label'    => esc_html__('Breadcrumb Title Hide', 'rifa'),
            'section'  => 'breadcrumb_setting',
            'default'  => '1',
            'priority' => 10,
            'choices'  => [
                'on'  => esc_html__('Enable', 'rifa'),
                'off' => esc_html__('Disable', 'rifa'),
            ],
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        $fields[] = [
            'type'        => 'typography',
            'settings'    => 'breadcrumb_title_typography',
            'label'       => esc_html__('Breadcrumb Title Font', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '0',
                'color'          => '',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
            'output'      => [
                [
                    'element' => '.banner .banner__content .banner__title',
                ],
            ],
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_title_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        // Breadcrumb text Setting
        $fields[] = [
            'type'     => 'switch',
            'settings' => 'breadcrumb_text_switch',
            'label'    => esc_html__('Breadcrumb Text Hide', 'rifa'),
            'section'  => 'breadcrumb_setting',
            'default'  => '1',
            'priority' => 10,
            'choices'  => [
                'on'  => esc_html__('Enable', 'rifa'),
                'off' => esc_html__('Disable', 'rifa'),
            ],
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];
    
        $fields[] = [
            'type'        => 'typography',
            'settings'    => 'breadcrumb_text_typography',
            'label'       => esc_html__('Breadcrumb Font', 'rifa'),
            'section'     => 'breadcrumb_setting',
            'default'     => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '0',
                'color'          => '',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
            'output'      => [
                [
                    'element' => '.banner .banner__content .breadcrumb span',
                ],
            ],
            'active_callback' => [
                [
                    'setting'  => 'breadcrumb_text_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ],
        ];







        $fields[] = [
            'type'     => 'select',
            'settings'    => 'align_setting',
            'label'       => esc_html__( 'Breadcrumb Alignment', 'rifa' ),
            'section'     => 'breadcrumb_setting',
            'default'     => 'left',
            'placeholder' => esc_html__( 'Choose an option', 'rifa' ),
            'choices'     => [
                'left' => esc_html__( 'Left', 'rifa' ),
                'center' => esc_html__( 'Center', 'rifa' ),
                'right' => esc_html__( 'Right', 'rifa' ),
            ],
            'priority' => 10,
        ];



        $fields[] = [
            'type'     => 'number',
            'settings' => 'breadcrumb_ptop',
            'label'    => esc_html__( 'Padding Top', 'rifa' ),
            'section'  => 'breadcrumb_setting',
            'priority' => 10,
        ];


        $fields[] = [
            'type'     => 'number',
            'settings' => 'breadcrumb_pbottom',
            'label'    => esc_html__( 'Padding Bottom', 'rifa' ),
            'section'  => 'breadcrumb_setting',
            'priority' => 10,
        ];

    

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'rifa_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'rifa' ),
            'off' => esc_html__( 'Disable', 'rifa' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'rifa_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'rifa' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'rifa' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'rifa' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'rifa'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'rifa'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );



// color
function rifa_color_fields( $fields ) {

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'rifa_color_option_1',
        'label'       => __( 'Primary Color', 'rifa' ),
        'description' => esc_html__( 'This is a Primary color control.', 'rifa' ),
        'section'     => 'color_setting',
        'default'     => '',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'rifa_color_option_2',
        'label'       => __( 'Secondary Color', 'rifa' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'rifa' ),
        'section'     => 'color_setting',
        'default'     => '',
        'priority'    => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', 'rifa_color_fields' );

// 404
function rifa_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'rifa_404_bg',
        'label'       => esc_html__( '404 Image.', 'rifa' ),
        'description' => esc_html__( '404 Image.', 'rifa' ),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'rifa_error_title',
        'label'    => esc_html__( 'Not Found Title', 'rifa' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'rifa' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'rifa_error_desc',
        'label'    => esc_html__( '404 Description Text', 'rifa' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'rifa' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'rifa_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'rifa' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'rifa' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'rifa_404_fields' );





/**
 * Added Fields
 */
function rifa_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'p',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_link_setting',
        'label'       => esc_html__( 'Link', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_span_setting',
        'label'       => esc_html__( 'Span', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'rifa' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'rifa_typo_fields' );









/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function rifa_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'rifa' ) ) {
        $value = Kirki::get_option( rifa_get_theme(), $name );
    }

    return apply_filters( 'rifa_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function rifa_get_theme() {
    return 'rifa';
}