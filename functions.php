<?php
/**
 * WL Test Theme
 */

if (!defined('THEME_DIR_PATH')) {
    define('THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}
if (!defined('THEME_DIR_URI')) {
    define('THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}
if (!defined('THEME_VERSION')) {
    define('THEME_VERSION', untrailingslashit(get_template_directory_uri()));
}

include_once "inc/class-wl-test-theme.php";
include_once "inc/class-cpt-car-field.php";
include_once "inc/class-shortcode.php";

use Wl_Test_Theme\Inc\Wl_Test_Theme;
Wl_Test_Theme::get_instance();

