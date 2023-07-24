<?php
namespace Wl_Test_Theme\Inc;

class Wl_Test_Theme
{
    private static $instance;

    public function __construct()
    {
        add_action('init', [$this, 'bootstrap']);
        add_action('init', [$this, 'post_type']);
        add_action('init', [$this, 'taxonomy']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_style']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_style']);
        add_action('after_setup_theme', [$this, 'theme_setup']);
        add_action( 'customize_register', [$this, 'customizer_init'] );
    }

    public static function bootstrap()
    {
        Cpt_Car_Field::get_instance();
        Shortcode::get_instance();
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function post_type()
    {

        register_post_type(
            'car',
            array(
                'labels' => array(
                    'name' => 'Car',
                    'singular_name' => 'Car',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Car',
                    'edit_item' => 'Edit Car',
                    'new_item' => 'New Car',
                    'view_item' => 'View Car',
                    'search_items' => 'Search Car',
                    'not_found' => 'Car Not Found',
                    'not_found_in_trash' => 'is empty',
                    'menu_name' => 'Cars',
                ),
                'public' => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-clipboard',
                'supports'  => array('title', 'thumbnail', 'editor'),
                'hierarchical' => true,
                'has_archive'    => true,
                'rewrite' => array(
                    'slug' => 'cars',
                    'with_front' => false
                ),
            )
        );
    }

    public  function taxonomy()
    {
        register_taxonomy(
            'car_manufacturer',
            array('car'),
            array(
                'label' => 'Car manufacturer',
                'labels' => array(
                    'name' => __('Car manufacturer'),
                    'singular_name' => __('Car manufacturer')
                ),
                'public' => true,
                'query_var' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'meta_box_cb' => 'post_categories_meta_box',
                'hierarchical' => true,
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'car-manufacturer',
                    'with_front' => false
                )
            )
        );
        register_taxonomy(
            'car_model',
            array('car'),
            array(
                'label' => 'Car model',
                'labels' => array(
                    'name' => __('Car model'),
                    'singular_name' => __('Car model')
                ),
                'public' => true,
                'query_var' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'meta_box_cb' => 'post_categories_meta_box',
                'hierarchical' => true,
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'car-model',
                    'with_front' => false
                )
            )
        );
        register_taxonomy(
            'car_country',
            array('car'),
            array(
                'label' => 'Car country',
                'labels' => array(
                    'name' => __('Car country'),
                    'singular_name' => __('Car country')
                ),
                'public' => true,
                'query_var' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'meta_box_cb' => 'post_categories_meta_box',
                'hierarchical' => true,
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'car-country',
                    'with_front' => false
                )
            )
        );
    }

    public function customizer_init( $wp_customize )
    {
        $wp_customize->add_section(
            'wl_test_theme_header_section',
            array(
                'title'       => 'Хедер',
                'priority'    => 1,
                'description' => 'Тут вы можете настроить шапку вашего сайта.',
            )
        );

        $wp_customize->add_setting(
            'wl_test_theme_header_phone',
            array(
                'default'    =>  '',
                'transport'  =>  'postMessage'
            )
        );
        $wp_customize->add_control(
            'wl_test_theme_header_phone',
            array(
                'section'   => 'wl_test_theme_header_section',
                'label'     => 'Phone',
                'type'      => 'text'
            )
        );
    }

    public  function theme_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
        add_theme_support('custom-logo');
    }


    public function admin_enqueue_style()
    {
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style('admin-main-css',  get_template_directory_uri()  . '/assets/css/admin-main.css', array(), THEME_VERSION);
        wp_enqueue_script('admin-main-js',  get_template_directory_uri()  . '/assets/js/admin-main.js', array('wp-color-picker'), THEME_VERSION, 1);
    }

    public function enqueue_style()
    {
        wp_enqueue_style('main-css',  get_template_directory_uri()  . '/assets/css/main.css', array(), THEME_VERSION);
    }


    public function enqueue_scripts()
    {
        wp_enqueue_script('main-js',  get_template_directory_uri()  . '/assets/js/main.js', array(), THEME_VERSION, true);
    }
}
