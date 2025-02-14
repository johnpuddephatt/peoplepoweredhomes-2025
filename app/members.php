<?php

add_action('init', function () {
    add_role(
        'member_pending', // Role slug
        'Member (pending)',
        array(
            'read' => true,
        )
    );

    add_role(
        'member', // Role slug
        'Member (approved)',
        array(
            'read' => true,
        )
    );
});



add_action('template_redirect', function () {
    if (is_admin() || current_user_can('manage_options')) {
        return; // Skip admin area and admins
    }

    if (is_singular() || (is_archive() && get_queried_object()->name == 'forum')) { // Ensures it runs only on single pages/posts
        $restricted = get_field('requires_login', get_the_id()) || get_queried_object()->name == 'forum';
        if ($restricted && (!is_user_logged_in() || in_array('member_pending', (array) (wp_get_current_user())->roles))) {
            wp_redirect(get_field('access_denied_page', 'option'));
            exit;
        }
    }
});




add_action('init', function () {

    $current_user = wp_get_current_user();
    if ($current_user->ID && in_array($current_user->roles[0], ['member', 'member_pending'])) {
        show_admin_bar(false);
    }
});




add_action('admin_init', function () {
    $current_user = wp_get_current_user();

    if ($current_user->ID && in_array($current_user->roles[0], ['member', 'member_pending'])) {
        wp_redirect(home_url('/'));
        exit;
    }
});


// Hook into role changes
add_action('set_user_role', function ($user_id, $new_role, $old_roles) {
    // Get user data
    $user = get_userdata($user_id);
    $user_email = $user->user_email;
    $user_name = $user->user_login;
    global $wp_roles;
    if (count($old_roles) && $old_roles[0] == 'member_pending' && $new_role == 'member') {

        $subject = "Your People Powered Homes account has been approved";
        $message = "Hi $user_name,\n\n";
        $message = str_replace('[login]', '<a href="' . get_field('login_page', 'option') . '">Click here to login</a>', get_field('approval_email', 'option'));
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        wp_mail($user_email, $subject, $message, $headers);
    }
}, 10, 3);


add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_67acf8a06e06e',
        'title' => 'Messages',
        'fields' => array(
            array(
                'key' => 'field_67acf8a069a32',
                'label' => 'Login page message',
                'name' => 'login_page_message',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => 'Insert [register] to create a registration link.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 1,
                'rows' => '3',
                'placeholder' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_67acf8a069f23',
                'label' => 'Approval email',
                'name' => 'approval_email',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => 'Insert [login] to create a login link.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 1,
                'rows' => '3',
                'placeholder' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_67af465a069f23',
                'label' => 'New registration email',
                'name' => 'new_registration_email',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => 'Insert [user] to create a link to the new user’s account.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 1,
                'rows' => '3',
                'placeholder' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'membership-options',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_67ad1c8f51baa',
        'title' => 'Pages',
        'fields' => array(
            array(
                'key' => 'field_67ad1c8f42cf4',
                'label' => 'Login page',
                'name' => 'login_page',
                'aria-label' => '',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'allow_archives' => 0,
                'multiple' => 0,
                'allow_null' => 0,
                'allow_in_bindings' => 0,
            ),
            array(
                'key' => 'field_67ad1cc442cf5',
                'label' => 'Registration page',
                'name' => 'registration_page',
                'aria-label' => '',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'allow_archives' => 0,
                'multiple' => 0,
                'allow_null' => 0,
                'allow_in_bindings' => 0,
            ),
            array(
                'key' => 'field_67ad1cd642cf6',
                'label' => 'Account pending page',
                'name' => 'account_pending_page',
                'aria-label' => '',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'allow_archives' => 0,
                'multiple' => 0,
                'allow_null' => 0,
                'allow_in_bindings' => 0,
            ),
            array(
                'key' => 'field_67ad1f9842cf7',
                'label' => 'Access denied page',
                'name' => 'access_denied_page',
                'aria-label' => '',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'allow_archives' => 0,
                'multiple' => 0,
                'allow_null' => 0,
                'allow_in_bindings' => 0,
            ),
            array(
                'key' => 'field_67ad1f9842cf7',
                'label' => 'Redirect after login page',
                'name' => 'redirect_after_login_page',
                'aria-label' => '',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'allow_archives' => 0,
                'multiple' => 0,
                'allow_null' => 0,
                'allow_in_bindings' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'membership-options',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_67acfa5abd188',
        'title' => 'Requires login',
        'fields' => array(
            array(
                'key' => 'field_67acfa5ad0c77',
                'label' => 'Restrict access to approved members',
                'name' => 'requires_login',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'allow_in_bindings' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
});

add_action('acf/init', function () {
    acf_add_options_page(array(
        'page_title' => 'Members',
        'menu_slug' => 'membership-options',
        'position' => '',
        'redirect' => false,
        'menu_icon' => array(
            'type' => 'dashicons',
            'value' => 'dashicons-buddicons-buddypress-logo',
        ),
        'icon_url' => 'dashicons-buddicons-buddypress-logo',
    ));
});
