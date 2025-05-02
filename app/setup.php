<?php

namespace App;


use function Roots\bundle;



// add_action('acf/init', function () {
//   acf_update_setting('google_api_key', 'AIzaSyDaXk46QYjxROwoMm4TaNAMWdqKgWi64ek');
// });



add_filter('acf/fields/google_map/api', function ($api) {
  $api['key'] = 'AIzaSyC79w3vlb0BHortUdnEqeoD-3fLPz0QU-I';
  return $api;
});

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
  bundle('app')->enqueue();
}, 100);



add_action('enqueue_block_editor_assets', function () {
  bundle('editor')->enqueue();
}, 100);

add_action('wp_print_styles', function () {
  wp_deregister_style('bbp-default');
}, 15);


/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
  /**
   * Enable features from Soil when plugin is activated
   * @link https://roots.io/plugins/soil/
   */
  add_theme_support('soil', [
    'clean-up',
    'disable-rest-api',
    'disable-asset-versioning',
    'disable-trackbacks',
    'google-analytics' => 'UA-75597556-1',
    'js-to-footer',
    'nav-walker',
    'nice-search',
    'relative-urls'
  ]);

  add_theme_support('editor-gradient-presets', array());
  add_theme_support('disable-custom-gradients');
  add_post_type_support('page', 'excerpt');

  /**
   * Enable plugins to manage the document title
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
   */
  add_theme_support('title-tag');

  /**
   * Register navigation menus
   * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
   */

  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'secondary_navigation' => __('Secondary Navigation', 'sage'),
    'footer_navigation' => __('Footer Navigation', 'sage'),
  ]);

  add_theme_support('responsive-embeds');

  /**
   * Enable post thumbnails
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  /**
   * Image sizes
   */
  add_image_size('4x3_xl', 1600, 1200, true);
  add_image_size('4x3_l', 800, 600, true);
  add_image_size('4x3', 400, 300, true);

  add_image_size('16x9_xl', 1280, 720, true);
  add_image_size('16x9_l', 640, 360, true);
  add_image_size('16x9', 320, 180, true);

  add_image_size('wide_xl', 2460, 900, true);
  add_image_size('wide_l', 1230, 450, true);
  add_image_size('wide', 615, 225, true);

  /**
   * Enable HTML5 markup support
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
   */
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  /**
   * Enable selective refresh for widgets in customizer
   * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
   */
  add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
  $config = [
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ];
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary'
  ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
// add_action('the_post', function ($post) {
//     sage('blade')->share('post', $post);
// });

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {


  function section_taxonomy()
  {
    register_taxonomy(
      'section',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
      'page',             // post type name
      array(
        'hierarchical' => true,
        'label' => 'Sections', // display name
        'query_var' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => array(
          'add_new_item' => 'Add new section'
        )
      )
    );
  }
  add_action('init', 'App\section_taxonomy');

  function register_shortcodes()
  {
    add_shortcode('membership', function () {
      return '
           <div class="success-message is-hidden notification is-primary">
              Application successfully submitted.
            </div>

            <form action="https://leedscommunityhomes.us12.list-manage.com/subscribe/post?u=704bc039805a3c6f06c77e27a&id=914751a7ec" method="post" target="_blank" novalidate="">
                <div id="form">
                  <div class="field field__email">
                    <label class="label" for="mce-EMAIL">Email Address<sup>*</sup></label>
                    <div class="control">
                      <input class="input" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="field field__fname">
                    <label class="label" for="mce-FNAME">First Name<sup>*</sup></label>
                    <div class="control">
                      <input class="input" type="text" name="FNAME" id="mce-FNAME" value="" placeholder="First name" required>
                    </div>
                  </div>
                  <div class="field field__lname">
                    <label class="label" for="mce-LNAME">Last Name<sup>*</sup></label>
                    <div class="control">
                      <input class="input" type="text" name="LNAME" id="mce-LNAME" value="" placeholder="Last name" required>
                    </div>
                  </div>

                  <div class="field field__membertype">
                    <label class="label" for="mce-membertype">Membership type</label>
                    <div class="control">
                      <div class="select">
                        <select name="MEMBERTYPE" id="mce-membertype">
                          <option value="Individual">Individual</option>
                          <option value="Organisation">Organisation</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="field field__org_name is-hidden">
                    <label class="label" for="mce-ORG_NAME">Organisation name</label>
                    <div class="control">
                      <input class="input" type="text" name="ORG_NAME" id="mce-ORG_NAME" placeholder="Name of organisation">
                    </div>
                  </div>

                  <div class="field field__agree_rule">
                    <label class="label" for="mce-agree_rule">I support the rules & objectives of Leeds Community Homes.</label>
                    <div class="control">
                      <div class="select">
                        <select name="AGREE_RULE" id="mce-agree_rule">
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="field field__contact_me">
                    <label class="label" for="mce-contact_me">I give Leeds Community Homes permission to contact me as a member.</label>
                    <div class="control">
                      <div class="select">
                        <select name="CONTACT_ME" id="mce-contact_me">
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <br>
              <input value="Join" class="button is-primary is-medium" type="submit">
            </form>
           ';
    });
  }

  add_action('init', 'App\register_shortcodes');
});



add_action('login_enqueue_scripts', function () { ?>
  <style type="text/css">
    #login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/images/pph-logo.png);
      height: 120px;
      width: 120px;
      border-radius: 9999px;
      background-color: #64e2d8;
      background-size: 50% auto;
      background-position: center;
      background-repeat: no-repeat;
      border: 1px solid black;
    }
  </style>
<?php });
