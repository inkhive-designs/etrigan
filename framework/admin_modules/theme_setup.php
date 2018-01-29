<?php
/**
 * etrigan functions and definitions
 *
 * @package etrigan
 */



if ( ! function_exists( 'etrigan_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function etrigan_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on etrigan, use a find and replace
         * to change 'etrigan' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'etrigan', get_template_directory() . '/languages' );

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 640; /* pixels */
        }

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         *
         */
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 400 );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'etrigan' ),
            /*'top' => __( 'Top Menu', 'etrigan' ), */
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         *
         * Note: The theme declares support for HTML search form, but also uses its own implementation in searchform-top.php, which is loaded in header.php
         *
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ) );
        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'etrigan_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_image_size('etrigan-sq-thumb', 600,600, true );
        add_image_size('etrigan-thumb', 540,450, true );
        add_image_size('pop-thumb',542, 340, true );


        //Declare woocommerce support
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-lightbox' );


        add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
        function add_featured_image_instruction( $content ) {
            return $content .= '<p>Featured Image will be shown on a header. Your theme works best with an image with a header size of 1200 × 400 pixels.</p>';
        }

    }
endif; // etrigan_setup
add_action( 'after_setup_theme', 'etrigan_setup' );