<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // $wp_customize->remove_panel('widgets');
    $wp_customize->remove_section('custom_css');

    // remove nav menus
    // remove_action( 'customize_controls_enqueue_scripts', array( $wp_customize->nav_menus, 'enqueue_scripts' ) );
    // remove_action( 'customize_register', array( $wp_customize->nav_menus, 'customize_register' ), 11 );
    // remove_filter( 'customize_dynamic_setting_args', array( $wp_customize->nav_menus, 'filter_dynamic_setting_args' ) );
    // remove_filter( 'customize_dynamic_setting_class', array( $wp_customize->nav_menus, 'filter_dynamic_setting_class' ) );
    // remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
    // remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'available_items_template' ) );
    // remove_action( 'customize_preview_init', array( $wp_customize->nav_menus, 'customize_preview_init' ) );

    // Blog name
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);

    // Logo

    $wp_customize->add_setting('site_logo');

    $wp_customize->add_control(
        new \WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
                'label' => 'Logo',
                'section' => 'title_tagline',
                'settings' => 'site_logo',
                'transport' => 'postMessage'
            )
        )
    );

    // Contact details

    $wp_customize->add_section(
        'company',
        array(
            'title' => 'Company',
            'description' => 'Manage company details',
            'priority' => 35,
        )
    );


    $wp_customize->add_setting(
        'company_info',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );


    $wp_customize->add_control(
        'company_info',
        array(
            'type' => 'textarea',
            'label' => 'Company information',
            'section' => 'company',
            'settings' => 'company_info',
            'default' => 'Leeds Community Homes Ltd. is registered under the Co–operative and Community Benefit Societies Act 2014 as a Community Benefit Society. Registered Number 7252.'
        )
    );

    $wp_customize->add_section(
        'contactdetails',
        array(
            'title' => 'Contact Details',
            'description' => 'Manage contact details',
            'priority' => 35,
        )
    );

    $wp_customize->add_section(
        'social',
        array(
            'title' => 'Social Details',
            'description' => 'Manage social media details',
            'priority' => 40,
        )
    );

    $wp_customize->add_setting(
        'address',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'address',
        array(
            'label' => 'Address',
            'section' => 'contactdetails',
            'settings' => 'address'
        )
    );

    $wp_customize->get_setting('address')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('address', [
        'selector' => '.address',
        'render_callback' => function () {
            echo get_theme_mod('address', 'no address set');
        }
    ]);


    $wp_customize->add_setting(
        'phonenumber_humans',
        array(
            'default' => '0121 123 4567',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'phonenumber_humans',
        array(
            'label' => 'Phone Number (human readable)',
            'section' => 'contactdetails',
            'settings' => 'phonenumber_humans'
        )
    );

    $wp_customize->add_setting(
        'phonenumber_robots',
        array(
            'default' => '+441211234567',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'phonenumber_robots',
        array(
            'label' => 'Phone Number (for robots)',
            'section' => 'contactdetails',
            'settings' => 'phonenumber_robots'
        )
    );

    $wp_customize->add_setting(
        'email_address',
        array(
            'default' => 'info@example.com',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'email_address',
        array(
            'label' => 'Email Address',
            'section' => 'contactdetails',
            'settings' => 'email_address'
        )
    );

    $wp_customize->add_setting(
        'twitter',
        array(
            'default' => 'https://twitter.com/LeedsCommHomes',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'twitter',
        array(
            'label' => 'Twitter',
            'section' => 'social',
            'settings' => 'twitter'
        )
    );

    $wp_customize->add_setting(
        'facebook',
        array(
            'default' => 'https://www.facebook.com/LeedsCommunityHomes/',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'facebook',
        array(
            'label' => 'Facebook',
            'section' => 'social',
            'settings' => 'facebook'
        )
    );

    $wp_customize->add_setting(
        'linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'linkedin',
        array(
            'label' => 'LinkedIn',
            'section' => 'social',
            'settings' => 'linkedin'
        )
    );

    $wp_customize->add_setting(
        'instagram',
        array(
            'default' => 'https://www.instagram.com/leedscommunityhomes/',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'instagram',
        array(
            'label' => 'Instagram',
            'section' => 'social',
            'settings' => 'instagram'
        )
    );

    $wp_customize->add_setting(
        'youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'youtube',
        array(
            'label' => 'YouTube',
            'section' => 'social',
            'settings' => 'youtube'
        )
    );


    $wp_customize->add_panel('home_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Home',
        'description'    => '',
    ));

    $wp_customize->add_section(
        'home_sections',
        array(
            'title' => 'Home Sections',
            'description' => '',
            'priority' => 15,
            'panel' => 'home_panel',
        )
    );

    $wp_customize->add_setting(
        'home_section_A',
        array(
            'default' => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'home_section_A',
        array(
            'type' => 'select',
            'label' => 'Section A',
            'section' => 'home_sections',
            'settings' => 'home_section_A',
            'choices' => array_reduce(
                get_terms('section'),
                function ($result, $item) {
                    $result[$item->term_id] = $item->name;
                    return $result;
                }
            ),
        )
    );

    $wp_customize->add_setting(
        'home_section_B',
        array(
            'default' => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'home_section_B',
        array(
            'type' => 'select',
            'label' => 'Section B',
            'section' => 'home_sections',
            'settings' => 'home_section_B',
            'choices' => array_reduce(
                get_terms('section'),
                function ($result, $item) {
                    $result[$item->term_id] = $item->name;
                    return $result;
                }
            ),
        )
    );

    $wp_customize->add_setting(
        'home_section_C',
        array(
            'default' => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'home_section_C',
        array(
            'type' => 'select',
            'label' => 'Section C',
            'section' => 'home_sections',
            'settings' => 'home_section_C',
            'choices' => array_reduce(
                get_terms('section'),
                function ($result, $item) {
                    $result[$item->term_id] = $item->name;
                    return $result;
                }
            ),
        )
    );
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js'), ['customize-preview'], null, true);
});
