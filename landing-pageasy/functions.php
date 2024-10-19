<?php
/**
 * landing Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package landing Lite
 */

if ( ! function_exists( 'landing_pageasy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function landing_pageasy_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on landing, use a find and replace
	 * to change 'landing-pageasy' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'landing-pageasy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'landing-pageasy-related', 200, 125, true ); //related

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'landing-pageasy' ),
 ) );

	/*
	 * Switch default core markup for pageasy form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
 ) );

  if ( landing_pageasy_is_wc_active() ) {
    add_theme_support( 'woocommerce' );
  }

	// Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'landing_pageasy_custom_background_args', array(
    'default-color' => '#eee',
    'default-image' => '',
  ) ) );
}
endif;
add_action( 'after_setup_theme', 'landing_pageasy_setup' );

function landing_pageasy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'landing_pageasy_content_width', 678 );
}
add_action( 'after_setup_theme', 'landing_pageasy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landing_pageasy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'landing-pageasy' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
 ) );

    // First Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 1', 'landing-pageasy' ),
    'description'   => __( 'First Top Widget Column', 'landing-pageasy' ),
    'id'            => 'top-widget-first',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );


    // Second Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 2', 'landing-pageasy' ),
    'description'   => __( 'Second Top Widget Column', 'landing-pageasy' ),
    'id'            => 'top-widget-second',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

    // Third Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 3', 'landing-pageasy' ),
    'description'   => __( 'Third Top Widget Column', 'landing-pageasy' ),
    'id'            => 'top-widget-third',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );


    // First Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 1', 'landing-pageasy' ),
    'description'   => __( 'First footer column', 'landing-pageasy' ),
    'id'            => 'footer-first',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

	// Second Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 2', 'landing-pageasy' ),
    'description'   => __( 'Second footer column', 'landing-pageasy' ),
    'id'            => 'footer-second',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

	// Third Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 3', 'landing-pageasy' ),
    'description'   => __( 'Third footer column', 'landing-pageasy' ),
    'id'            => 'footer-third',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  if ( landing_pageasy_is_wc_active() ) {
        // Register WooCommerce Shop and Single Product Sidebar
    register_sidebar( array(
      'name' => __('Shop Page Sidebar', 'landing-pageasy' ),
      'description'   => __( 'Appears on Shop main page and product archive pages.', 'landing-pageasy' ),
      'id' => 'shop-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
      'name' => __('Single Product Sidebar', 'landing-pageasy' ),
      'description'   => __( 'Appears on single product pages.', 'landing-pageasy' ),
      'id' => 'product-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
    ) );
  }
}
add_action( 'widgets_init', 'landing_pageasy_widgets_init' );

function landing_pageasy_custom_sidebar() {
    // Default sidebar.
  $sidebar = 'sidebar';

    // Woocommerce.
  if ( landing_pageasy_is_wc_active() ) {
    if ( is_shop() || is_product_category() ) {
      $sidebar = 'shop-sidebar';
    }
    if ( is_product() ) {
      $sidebar = 'product-sidebar';
    }
  }

  return $sidebar;
}

/**
 * Enqueue scripts and styles.
 */
function landing_pageasy_scripts() {
	wp_enqueue_style( 'landing-pageasy-style', get_stylesheet_uri() );

	$handle = 'landing-pageasy-style';

    // WooCommerce
  if ( landing_pageasy_is_wc_active() ) {
    if ( is_woocommerce() || is_cart() || is_checkout() ) {
      wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce2.css' );
      $handle = 'woocommerce';
    }
  }

  wp_enqueue_script( 'landing-pageasy-customscripts', get_template_directory_uri() . '/js/customscripts.js',array('jquery'),'',true); 

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'landing_pageasy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Copyrights
 */
if ( ! function_exists( 'landing_pageasy_copyrights_credit' ) ) {
  function landing_pageasy_copyrights_credit() { 
    global $bclwp_options
    ?>
    <!--start copyrights-->
    <div class="copyrights">
      <div class="container">
        <div class="row" id="copyright-note">
          <span>

            <?php
            $landing_pageasy_copyright_text = get_theme_mod('landing_pageasy_copyright_text', 'Copyright 2017 - Powered By WordPress. ');
            echo $landing_pageasy_copyright_text;
            ?>
          </span>
        </div>
      </div>
    </div>
    <!--end copyrights-->
  <?php }
}

/**
 * Custom Comments template
 */
if ( ! function_exists( 'landing_pageasy_comments' ) ) {
	function landing_pageasy_comment($comment, $args, $depth) { ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" style="position:relative;" itemscope itemtype="http://schema.org/UserComments">
      <div class="comment-author vcard">
       <?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
       <div class="comment-metadata">
        <?php printf('<span class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</span>', get_comment_author_link()) ?>
        <span class="comment-meta">
          <?php edit_comment_link(__('(Edit)', 'landing-pageasy'),'  ','') ?>
        </span>
      </div>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.', 'landing-pageasy') ?></em>
      <br />
    <?php endif; ?>
    <div class="commentmetadata" itemprop="commentText">
     <?php comment_text() ?>
     <time><?php comment_date(get_option( 'date_format' )); ?></time>
     <span class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </span>
  </div>
</div>
</li>
<?php }
}

/*
 * Excerpt
 */
function landing_pageasy_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/**
 * Shorthand function to check for more tag in post.
 *
 * @return bool|int
 */
function landing_pageasy_post_has_moretag() {
  return strpos( get_the_content(), '<!--more-->' );
}

if ( ! function_exists( 'landing_pageasy_readmore' ) ) {
    /**
     * Display a "read more" link.
     */
    function landing_pageasy_readmore() {
      ?>
      <div class="readMore">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
          <?php _e( 'Read More', 'landing-pageasy' ); ?>
        </a>
      </div>
      <?php 
    }
  }

/**
 * Breadcrumbs
 */
if (!function_exists('landing_pageasy_the_breadcrumb')) {
  function landing_pageasy_the_breadcrumb() {
    if ( is_front_page() ) {
      return;
    }
    echo '<span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
    echo esc_url( home_url() );
    echo '">'.esc_html(sprintf( __( "Home", 'landing-pageasy' )));
    echo '</a></span><span><i class="landing-icon icon-angle-double-right"></i></span>';
    if (is_single()) {
      $categories = get_the_category();
      if ( $categories ) {
        $level = 0;
        $hierarchy_arr = array();
        foreach ( $categories as $cat ) {
          $anc = get_ancestors( $cat->term_id, 'category' );
          $count_anc = count( $anc );
          if (  0 < $count_anc && $level < $count_anc ) {
            $level = $count_anc;
            $hierarchy_arr = array_reverse( $anc );
            array_push( $hierarchy_arr, $cat->term_id );
          }
        }
        if ( empty( $hierarchy_arr ) ) {
          $category = $categories[0];
          echo '<span typeof="v:Breadcrumb"><a href="'. esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="landing-icon icon-angle-double-right"></i></span>';
        } else {
          foreach ( $hierarchy_arr as $cat_id ) {
            $category = get_term_by( 'id', $cat_id, 'category' );
            echo '<span typeof="v:Breadcrumb"><a href="'. esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="landing-icon icon-angle-double-right"></i></span>';
          }
        }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_page()) {
      $parent_id  = wp_get_post_parent_id( get_the_ID() );
      if ( $parent_id ) {
        $breadcrumbs = array();
        while ( $parent_id ) {
          $page = get_page( $parent_id );
          $breadcrumbs[] = '<span typeof="v:Breadcrumb"><a href="'.esc_url( get_permalink( $page->ID ) ).'" rel="v:url" property="v:title">'.esc_html( get_the_title($page->ID) ). '</a></span><span><i class="landing-icon icon-angle-double-right"></i></span>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse( $breadcrumbs );
        foreach ( $breadcrumbs as $crumb ) { echo $crumb; }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $this_cat_id = $cat_obj->term_id;
      $hierarchy_arr = get_ancestors( $this_cat_id, 'category' );
      if ( $hierarchy_arr ) {
        $hierarchy_arr = array_reverse( $hierarchy_arr );
        foreach ( $hierarchy_arr as $cat_id ) {
          $category = get_term_by( 'id', $cat_id, 'category' );
          echo '<span typeof="v:Breadcrumb"><a href="'.esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="landing-icon icon-angle-double-right"></i></span>';
        }
      }
      echo "<span><span>";
      single_cat_title();
      echo "</span></span>";
    } elseif (is_author()) {
      echo "<span><span>";
      if(get_query_var('author_name')) :
        $curauth = get_user_by('slug', get_query_var('author_name'));
      else :
        $curauth = get_userdata(get_query_var('author'));
      endif;
      echo esc_html( $curauth->nickname );
      echo "</span></span>";
    } elseif (is_pageasy()) {
      echo "<span><span>";
      the_pageasy_query();
      echo "</span></span>";
    } elseif (is_tag()) {
      echo "<span><span>";
      single_tag_title();
      echo "</span></span>";
    }
  }
}


/*
 * Google Fonts
 */
function landing_pageasy_fonts_url() {
  $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Monda, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monda = _x( 'on', 'Monda font: on or off', 'landing-pageasy' );

    if ( 'off' !== $monda ) {
      $font_families = array();

      if ( 'off' !== $monda ) {
        $font_families[] = urldecode('Open+Sans:400,600,700,800');
      }

      $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin,latin-ext' ),
      );

      $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
  }

  function landing_pageasy_scripts_styles() {
    wp_enqueue_style( 'theme-slug-fonts', landing_pageasy_fonts_url(), array(), null );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
  }
  add_action( 'wp_enqueue_scripts', 'landing_pageasy_scripts_styles' );

/**
 * WP Mega Menu Plugin Support
 */
function landing_pageasy_megamenu_parent_element( $selector ) {
  return '.primary-navigation .container';
}
add_filter( 'wpmm_container_selector', 'landing_pageasy_megamenu_parent_element' );

/**
 * Determines whether the WooCommerce plugin is active or not.
 * @return bool
 */
function landing_pageasy_is_wc_active() {
  if ( is_multisite() ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    return is_plugin_active( 'woocommerce/woocommerce.php' );
  } else {
    return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
  }
}

/**
 * WooCommerce
 */
if ( landing_pageasy_is_wc_active() ) {
  if ( !function_exists( 'bclwp_loop_columns' )) {
        /**
         * Change number or products per row to 3
         *
         * @return int
         */
        function bclwp_loop_columns() {
            return 3; // 3 products per row
          }
        }
        add_filter( 'loop_shop_columns', 'bclwp_loop_columns' );

    /**
     * Redefine woocommerce_output_related_products()
     */
    function woocommerce_output_related_products() {
      $args = array(
        'posts_per_page' => 3,
        'columns' => 3,
      );
        woocommerce_related_products($args); // Display 3 products in rows of 1
      }

      global $pagenow;
      if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
        /**
         * Define WooCommerce image sizes.
         */
        function landing_pageasy_woocommerce_image_dimensions() {
          $catalog = array(
                'width'     => '210',   // px
                'height'    => '155',   // px
                'crop'      => 1        // true
              );
          $single = array(
                'width'     => '326',   // px
                'height'    => '444',   // px
                'crop'      => 1        // true
              );
          $thumbnail = array(
                'width'     => '74',    // px
                'height'    => '74',   // px
                'crop'      => 0        // false
              );
            // Image sizes
            update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
            update_option( 'shop_single_image_size', $single );         // Single product image
            update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
          }
          add_action( 'init', 'landing_pageasy_woocommerce_image_dimensions', 1 );
        }


    /**
     * Change the number of product thumbnails to show per row to 4.
     *
     * @return int
     */
    function landing_pageasy_woocommerce_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
   }
   add_filter( 'woocommerce_product_thumbnails_columns', 'landing_pageasy_woocommerce_thumb_cols' );


    /**
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param $fragments
     *
     * @return mixed
     */
    function landing_pageasy_header_add_to_cart_fragment( $fragments ) {
      global $woocommerce;
      ob_start(); ?>

      <a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'landing-pageasy' ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'landing-pageasy' ), $woocommerce->cart->cart_contents_count );?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

      <?php $fragments['a.cart-contents'] = ob_get_clean();
      return $fragments;
    }
    add_filter( 'add_to_cart_fragments', 'landing_pageasy_header_add_to_cart_fragment' );

    /**
     * Optimize WooCommerce Scripts
     * Updated for WooCommerce 2.0+
     * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
     */
    function landing_pageasy_manage_woocommerce_styles() {
        //remove generator meta tag
      remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

        //first check that woo exists to prevent fatal errors
      if ( function_exists( 'is_woocommerce' ) ) {
            //dequeue scripts and styles
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
          wp_dequeue_style( 'woocommerce-layout' );
          wp_dequeue_style( 'woocommerce-smallscreen' );
          wp_dequeue_style( 'woocommerce-general' );
                wp_dequeue_style( 'wc-bto-styles' ); //Composites Styles
                wp_dequeue_script( 'wc-add-to-cart' );
                wp_dequeue_script( 'wc-cart-fragments' );
                wp_dequeue_script( 'woocommerce' );
                wp_dequeue_script( 'jquery-blockui' );
                wp_dequeue_script( 'jquery-placeholder' );
              }
            }
          }
          add_action( 'wp_enqueue_scripts', 'landing_pageasy_manage_woocommerce_styles', 99 );

    // Remove WooCommerce generator tag.
          remove_action('wp_head', 'wc_generator_tag');
        }

/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'landing_pageasy_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function landing_pageasy_archive_post( $layout = '' ) { 
     ?>
     <article class="post excerpt">

       <?php if ( has_post_thumbnail() ) { ?>
         <div class="post-blogs-container-thumbnails">
         <?php } else { ?>
           <div class="post-blogs-container">
           <?php } ?>

           <?php if ( empty($landing_pageasy_full_posts) ) : ?>


             <?php if ( has_post_thumbnail() ) { ?>
               <div class="featured-thumbnail-container">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
                  <?php the_post_thumbnail( 'full' ); ?>
                </a>
              </div>
            <?php } ?>
            <div class="thumbnail-post-content">
              <h2 class="title">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
              </h2>

              <span class="entry-meta">
                <?php echo get_the_date(); ?>
                <?php
                if ( is_sticky() && is_home() && ! is_paged() ) {
                  printf( ' / <span class="sticky-text">%s</span>', __( 'Featured', 'landing-pageasy' ) );
                } ?>
              </span>
              <div class="post-content">
                <?php echo landing_pageasy_excerpt(50); ?>...
              </div>

              <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="read-more"><?php _e( 'Read More', 'landing-pageasy' ); ?></a>

            <?php else : ?>
              <?php if (landing_pageasy_post_has_moretag()) : ?>
                <?php landing_pageasy_readmore(); ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>

      </article>
    <?php }
  }








  require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Free Seo Optimized Responsive Theme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'landing_pageasy_register_required_plugins' );

function landing_pageasy_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
      array(
        'name'        => 'Superb Helper',
        'slug'        => 'superb-helper',
      ),

      array(
        'name'        => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
        'slug'        => 'superb-blocks',
      ),

    );

    $config = array(
        'id'           => 'landing_pageasy',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.


      );

    tgmpa( $plugins, $config );
  }



/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );








// Theme page start

add_action('admin_menu', 'landing_pageasy_themepage');
function landing_pageasy_themepage()
{
  $option = get_option('landing_pageasy_themepage_seen');
  $awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
  $theme_info = add_theme_page(__('Theme Settings', 'landing-pageasy'), __('Theme Settings', 'landing-pageasy').$awaiting, 'manage_options', 'landing-pageasy-info.php', 'landing_pageasy_info_page', 1);
}
function landing_pageasy_info_page()
{
  $user = wp_get_current_user();
  $theme = wp_get_theme();
  $parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
  $theme_name = is_child_theme() ? $theme." ".__("and", "landing-pageasy")." ".$parent_name : $theme;
  $demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "landing-pageasy"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "landing-pageasy");
  $premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "landing-pageasy"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "landing-pageasy"),$theme);
  $option_name = 'landing_pageasy_themepage_seen';
  $option = get_option($option_name, null);
  if (is_null($option)) {
    add_option($option_name, true);
  } elseif (!$option) {
    update_option($option_name, true);
  } ?>
  <div class="wrap">

    <div class="spt-theme-settings-wrapper">
      <div class="spt-theme-settings-wrapper-main-content">
        <div class="spt-theme-settings-tabs">

         <div class="spt-theme-settings-tab">
           <input type="radio" id="tab-1" name="tab-group-1">



           <label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "landing-pageasy"); ?> <?php echo esc_html($theme_name); ?></label>

           <div class="spt-theme-settings-content">

            <div class="spt-theme-settings-content-getting-started-wrapper">
              <div class="spt-theme-settings-content-item">
                <div class="spt-theme-settings-content-item-header">
                  <?php esc_html_e("Add Menus", "landing-pageasy"); ?>
                </div>
                <div class="spt-theme-settings-content-item-content">
                 <a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "landing-pageasy"); ?></a>
               </div>
             </div>

             <div class="spt-theme-settings-content-item">
              <div class="spt-theme-settings-content-item-header">
               <?php esc_html_e("Add Widgets", "landing-pageasy"); ?>
             </div>
             <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "landing-pageasy"); ?></a>
            </div>
          </div>

          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
              <?php esc_html_e("Change Header Image", "landing-pageasy"); ?>
            </div>
            <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></a>
            </div>
          </div>

          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
              <?php esc_html_e("Customize Header Text, Buttons & Colors", "landing-pageasy"); ?>
            </div>
            <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></a>
            </div>
          </div>


          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
             <?php esc_html_e("Upload Logo", "landing-pageasy"); ?>
           </div>
           <div class="spt-theme-settings-content-item-content">
            <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></a>
          </div>
        </div>

        <div class="spt-theme-settings-content-item">
          <div class="spt-theme-settings-content-item-header">
           <?php esc_html_e("Change Background Color / Image", "landing-pageasy"); ?>
         </div>
         <div class="spt-theme-settings-content-item-content">
          <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></a>
        </div>
      </div>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Customize All Fonts", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Customize All Colors", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Import Demo Content", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Demo Import", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Contact Premium Support", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Unlock Full SEO Optimization", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Show logo in the mobile header", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Only Show Header On Front Page", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Custom Header Height", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Only Show Widgets On Front Page", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Unlock Elementor Compatibility", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Install Elementor", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Access All Child Themes", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("View Child Themes", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Add Recent Posts Widget", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Widgets", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Custom Copyright Text", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Custom Copyright Text", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Tag' from tag page title", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Author' from author page title", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Category' from author page title", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Right/Left Sidebar", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Author Section", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Related Posts Section", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Breadcrumbs", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Tags Section", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/landing-pageasy/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Right/Next or Numbered Pagination", "landing-pageasy"); ?></span> <span><?php esc_html_e("Premium", "landing-pageasy"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "landing-pageasy"); ?></span>
        </div>
      </a>

      


    </div>
  </div> 
</div>


</div>      
</div>

<div class="spt-theme-settings-wrapper-sidebar">

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "landing-pageasy"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <ul>
        <li>
          <a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "landing-pageasy"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "landing-pageasy"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "landing-pageasy"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "landing-pageasy"); ?></a>
        </li>

      </ul>
    </div>
  </div>


  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "landing-pageasy"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php echo esc_html($demo_text); ?></p>
      <a href="https://superbthemes.com/demo/landing-pageasy/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "landing-pageasy"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "landing-pageasy"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php echo esc_html($premium_text); ?></p>
      <a href="https://superbthemes.com/landing-pageasy/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "landing-pageasy"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "landing-pageasy"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php esc_html_e("If you have issues with", "landing-pageasy"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "landing-pageasy"); ?></p>
      <a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "landing-pageasy"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "landing-pageasy"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php esc_html_e("Do you enjoy using", "landing-pageasy"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "landing-pageasy"); ?></p>
      <a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "landing-pageasy"); ?></a>
    </div>
  </div>



</div>

</div>
</div>


<?php
}

function landing_pageasy_comparepage_css($hook) {
  if ('appearance_page_landing-pageasy-info' != $hook) {
    return;
  }
  wp_enqueue_style('landing-pageasy-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'landing_pageasy_comparepage_css');

// Theme page end




add_action('admin_init', 'landing_pageasy_spbThemesNotification', 8);

function landing_pageasy_spbThemesNotification(){
  $notifications = include('inc/admin_notification/Autoload.php');
  $notifications->Add("landing_pageasy_notification", "Unlock All Features with Landing Pageasy Premium – Limited Time Offer", "

    Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Landing Pageasy Premium. 
    The discount is only available for a limited time.

    <div>
    <a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/landing-pageasy/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/landing-pageasy/'>Upgrade Now</a>
    </div>

    ", "info");
  

  $options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
  $notifications->Add("landing_pageasy_notification_start", "Let's get you started with Landing Pageasy!", '
    <span class="st-notification-wrapper">
    <span class="st-notification-column-wrapper">
    <span class="st-notification-column">
    <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
    </span>

    <span class="st-notification-column">
    <h2>Why Landing Pageasy</h2>
    <ul class="st-notification-column-list">
    <li>Easy to Use & Customize</li>
    <li>Search Engine Optimized</li>
    <li>Lightweight and Fast</li>
    <li>Top-notch Customer Support</li>
    </ul>
    <a href="https://superbthemes.com/demo/landing-pageasy/" target="_blank" class="button">View Landing Pageasy Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

    </span>
    <span class="st-notification-column">
    <h2>Customize Landing Pageasy</h2>
    <ul>
    <li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
    <li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
    <li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
    </ul>
    </span>
    </span>
    <span class="st-notification-footer">
    Landing Pageasy is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
    </span>
    </span>

    <style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

    ', "info", $options_notification_start);
  $notifications->Boot();
}


