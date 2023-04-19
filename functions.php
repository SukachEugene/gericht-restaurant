<?php

require_once(get_template_directory() . '/helper.php');
require_once(get_template_directory() . '/widgets.php');


add_action('wp_enqueue_scripts', 'my_theme_enqueue_files');

function my_theme_enqueue_files()
{

  // google fonts
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300;400;500;600;700&display=swap', false);
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', false);

  //basic styles
  wp_enqueue_style('start-reset', get_template_directory_uri() . '/css/start-reset.css');
  wp_enqueue_style('globals', get_template_directory_uri() . '/css/globals.css');

  // elements styles
  wp_enqueue_style('slick-css', get_theme_file_uri() . '/css/slick.css');
  wp_enqueue_style('slick-theme-css', get_theme_file_uri() . '/css/slick-theme.css');
  wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
  wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css');
  wp_enqueue_style('sidebar', get_template_directory_uri() . '/css/sidebar.css');
  wp_enqueue_style('front-page', get_template_directory_uri() . '/css/front-page.css');
  wp_enqueue_style('our-services', get_template_directory_uri() . '/css/our-services.css');
  wp_enqueue_style('about-us', get_template_directory_uri() . '/css/about-us.css');
  wp_enqueue_style('404', get_template_directory_uri() . '/css/404.css');
  wp_enqueue_style('coming-soon', get_template_directory_uri() . '/css/coming-soon.css');
  wp_enqueue_style('category', get_template_directory_uri() . '/css/category.css');
  wp_enqueue_style('tag', get_template_directory_uri() . '/css/tag.css');
  wp_enqueue_style('search', get_template_directory_uri() . '/css/search.css');

  wp_enqueue_style('single-our-team', get_template_directory_uri() . '/css/single-our-team.css');
  wp_enqueue_style('single-post', get_template_directory_uri() . '/css/single-post.css');

  wp_enqueue_style('flexible-content-styles', get_template_directory_uri() . '/css/flexible-content-styles.css');

  wp_enqueue_style('template-page-contact-us', get_template_directory_uri() . '/css/template-page-contact-us.css');
  wp_enqueue_style('template-page-team', get_template_directory_uri() . '/css/template-page-team.css');
  wp_enqueue_style('template-page-blog', get_template_directory_uri() . '/css/template-page-blog.css');
  wp_enqueue_style('template-page-faq', get_template_directory_uri() . '/css/template-page-faq.css');

  wp_enqueue_style('block-reservations', get_template_directory_uri() . '/css/block-reservations.css');
  wp_enqueue_style('block-menu', get_template_directory_uri() . '/css/block-menu.css');
  wp_enqueue_style('block-chefs-word', get_template_directory_uri() . '/css/block-chefs-word.css');
  wp_enqueue_style('block-customers', get_template_directory_uri() . '/css/block-customers.css');
  wp_enqueue_style('block-video-banner', get_template_directory_uri() . '/css/block-video-banner.css');
  wp_enqueue_style('block-blog-posts', get_template_directory_uri() . '/css/block-blog-posts.css');
  wp_enqueue_style('block-gallery', get_template_directory_uri() . '/css/block-gallery.css');
  wp_enqueue_style('block-head-banner', get_template_directory_uri() . '/css/block-head-banner.css');
  wp_enqueue_style('block-laurels', get_template_directory_uri() . '/css/block-laurels.css');
  wp_enqueue_style('block-blog-posts-for-blog-page', get_template_directory_uri() . '/css/block-blog-posts-for-blog-page.css');

  wp_enqueue_style('global-responsive', get_template_directory_uri() . '/css/global-responsive.css');

  // main theme's style file
  wp_enqueue_style('style', get_stylesheet_uri());

  //external scripts
  wp_enqueue_script('jquery', get_theme_file_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('slick-min-js', get_theme_file_uri() . '/js/slick.min.js');
  wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/3f554732dc.js', [], null);

  //custom ajax script file, decision for connect from: https://webdeasy.de/en/ajax-in-wordpress-en/
  wp_enqueue_script("ajax-scripts", get_template_directory_uri() . "/js/ajax-scripts.js");

  // custom scripts files
  wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/js/jquery-scripts.js');
  wp_enqueue_script('timeWorker', get_template_directory_uri() . '/js/timeWorker.js', array(), '1.0', true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js');


  wp_localize_script("ajax-scripts", "PHPVARS", array(
    "ajaxurl" => admin_url("admin-ajax.php"),
  ));
}







// header nav menu
add_action('init', 'register_my_menu');

function register_my_menu()
{
  register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_mobil_menu');

function register_my_mobil_menu()
{
  register_nav_menu('mobil-menu', __('Mobil Menu'));
}




// turn off the default Gutenberg builder
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

function disable_gutenberg_editor()
{
  return false;
}




/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// remove top margin by WP admin panel
add_action('get_header', 'remove_admin_login_header');

function remove_admin_login_header()
{
  remove_action('wp_head', '_admin_bar_bump_cb');
}




// create global options contents fields
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}




// filter for download .svg files from: https://github.com/WordPress/gutenberg/issues/22861
add_filter('upload_mimes', function () {
  $mimes = [
    'svg' => 'image/svg+xml',
    'jpg|jpeg' => 'image/jpeg',
    'png' => 'image/png',
  ];
  return $mimes;
});


// turn on post's thumbnails
add_action('after_setup_theme', 'theme_features');

function theme_features()
{
  add_theme_support('post-thumbnails');
}






// add category picture options on admin panel, by: https://www.webdesignvista.com/how-to-add-and-update-images-for-categories-in-wordpress/
add_action('category_add_form_fields', 'category_add_form_fields_callback');
function category_add_form_fields_callback()
{
  $banner_id = null;
  $image_id = null;
?>


  <div id="category_custom_banner"></div>
  <input type="hidden" id="category_custom_banner_url" name="category_custom_banner_url">
  <div style="margin-bottom: 20px;">
    <span>Category Banner </span>
    <a href="#" class="button custom-button-upload" id="custom-button-upload-banner">Upload banner</a>
    <a href="#" class="button custom-button-remove" id="custom-button-remove-banner" style="display: none">Remove banner</a>
  </div>

  <div id="category_custom_image"></div>
  <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
  <div style="margin-bottom: 20px;">
    <span>Category Image </span>
    <a href="#" class="button custom-button-upload" id="custom-button-upload">Upload image</a>
    <a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none">Remove image</a>
  </div>


<?php
}


add_action('admin_enqueue_scripts', 'admin_enqueue_scripts_callback');
function admin_enqueue_scripts_callback()
{

  // WordPress media uploader scripts
  if (!did_action('wp_enqueue_media')) {
    wp_enqueue_media();
  }
  // our uploader.js 
  wp_enqueue_script('uploader', get_stylesheet_directory_uri() . '/js/uploader.js', array(), "1.0", true);
}



add_action('create_term', 'custom_create_term_callback');
function custom_create_term_callback($term_id)
{

  add_term_meta(
    $term_id,
    'category_banner',
    esc_url($_REQUEST['category_custom_banner_url'])
  );

  add_term_meta(
    $term_id,
    'category_image',
    esc_url($_REQUEST['category_custom_image_url'])
  );
}


add_action('category_edit_form_fields', 'category_edit_form_fields_callback', 10, 2);
function category_edit_form_fields_callback($ttObj, $taxonomy)
{

  $term_id = $ttObj->term_id;
  $banner = '';
  $banner = get_term_meta($term_id, 'term_banner', true);
  $image = '';
  $image = get_term_meta($term_id, 'term_image', true);

?>
  <tr class="form-field term-banner-wrap">
    <th scope="row"><label for="banner">Banner</label></th>
    <td>
      <?php if ($banner) : ?>
        <span id="category_custom_banner">
          <img src="<?php echo $banner; ?>" style="width: 150px" />
        </span>
        </br>
        <input type="hidden" id="category_custom_banner_url" name="category_custom_banner_url">

        <span>
          <a href="#" class="button custom-button-upload-banner" id="custom-button-upload-banner" style="display: none">Upload Banner</a>
          <a href="#" class="button custom-button-remove-banner">Remove Banner</a>
        </span>
      <?php else : ?>
        <span id="category_custom_banner"></span>
        <input type="hidden" id="category_custom_banner_url" name="category_custom_banner_url">
        <span>
          <a href="#" class="button custom-button-upload-banner" id="custom-button-upload-banner">Upload Banner</a>
          <a href="#" class="button custom-button-remove-banner" style="display: none">Remove Banner</a>
        </span>
      <?php endif; ?>
    </td>
  </tr>


  <tr class="form-field term-image-wrap">
    <th scope="row"><label for="image">Image</label></th>
    <td>
      <?php if ($image) : ?>
        <span id="category_custom_image">
          <img src="<?php echo $image; ?>" style="width: 150px" />
        </span>
        </br>
        <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">

        <span>
          <a href="#" class="button custom-button-upload" id="custom-button-upload" style="display: none">Upload image</a>
          <a href="#" class="button custom-button-remove">Remove image</a>
        </span>
      <?php else : ?>
        <span id="category_custom_image"></span>
        <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
        <span>
          <a href="#" class="button custom-button-upload" id="custom-button-upload">Upload image</a>
          <a href="#" class="button custom-button-remove" style="display: none">Remove image</a>
        </span>
      <?php endif; ?>
    </td>
  </tr>


<?php
}

add_action('edit_term', 'edit_term_callback');
function edit_term_callback($term_id)
{
  $banner = '';
  $banner = get_term_meta($term_id, 'term_banner');

  if ($banner)
    update_term_meta(
      $term_id,
      'term_banner',
      esc_url($_POST['category_custom_banner_url'])
    );

  else
    add_term_meta(
      $term_id,
      'term_banner',
      esc_url($_POST['category_custom_banner_url'])
    );


  $image = '';
  $image = get_term_meta($term_id, 'term_image');

  if ($image)
    update_term_meta(
      $term_id,
      'term_image',
      esc_url($_POST['category_custom_image_url'])
    );

  else
    add_term_meta(
      $term_id,
      'term_image',
      esc_url($_POST['category_custom_image_url'])
    );
}





// Loads blog posts on front page by Ajax
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts()
{

  $paged = $_POST['page'];
  $number = $_POST['numberPerPage'];

  $posts = get_posts(array(
    'post_type' => 'post',
    'order' => 'ASC',
    'posts_per_page' => $number,
    'paged' => $paged,

  ));

  $response = array();

  if ($paged >= count($posts)) {
    $response['finish'] = true;
  } else {
    $response['finish'] = false;
  }

  if ($posts) {
    ob_start();

    if ($number == 3) {
      get_template_part('templates/block', 'blog-posts');
    } else if ($number == 4) {
      get_template_part('templates/block', 'blog-posts-for-blog-page');
    }

    $response['html'] = ob_get_clean();
  }
  wp_send_json($response);
}




// Add sidebar
function gericht_widgets_init()
{
  register_sidebar(array(
    'name'          => __('Sidebar', 'Gericht'),
    'id'            => 'sidebar',
    'description'   => __('Add widgets here to appear in your sidebar.', 'Gericht'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'gericht_widgets_init');





// Add custom styles to flexible content
function wpb_mce_buttons_2($buttons)
{
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

//Decision from: https://www.wpbeginner.com/wp-tutorials/how-to-add-custom-styles-to-wordpress-visual-editor/
function my_mce_before_init_insert_formats($init_array)
{

  $style_formats = array(

    array(
      'title' => 'Post Content Header',
      'block' => 'span',
      'classes' => 'post-content-header',
      'wrapper' => true,
    ),

    array(
      'title' => 'Post Content Image | Left Position',
      'block' => 'div',
      'classes' => 'post-content-image-left',
      'wrapper' => true,
    ),

    array(
      'title' => 'Post Content Image | Right Position',
      'block' => 'div',
      'classes' => 'post-content-image-right',
      'wrapper' => true,
    ),
  );

  $init_array['style_formats'] = json_encode($style_formats);
  return $init_array;
}
// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');




// Custom conmments structure
if (!function_exists('better_comments')) :
  function better_comments($comment, $args, $depth)
  {
?>
      <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
          <div class="comment-flex">

              <div class="img-thumbnail d-none d-sm-block">
                  <?php echo get_avatar($comment, $size = '80', $default = 'http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g'); ?>
              </div>

              <div class="comment-content">
                  <div class="comment-first-row">
                      <h5><?php echo get_comment_author() ?></h5>
                      <a href="#"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
                  </div>
                  <p><?php echo get_comment_date('j M Y') ?></p>
                  <div class="comment-content-text"> <?php comment_text() ?></div>
              </div>

          </div>

  <?php
  }
endif;

?>