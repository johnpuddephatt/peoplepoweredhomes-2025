<?php

namespace App;

/**
 * Add <body> classes
 */

add_filter('bp_template_include_theme_compat', function ($template) {
    if (is_buddypress()) {
        echo view('page');
        $template = '';
    }
    return $template;
});

add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }


    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */

add_filter('excerpt_length', function () {
    return 20;
}, 999);

add_filter('excerpt_more', function () {
    return ' &hellip;';
});

add_filter('wp_img_tag_add_auto_sizes', '__return_false');
