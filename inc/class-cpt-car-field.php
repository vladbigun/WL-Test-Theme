<?php

namespace Wl_Test_Theme\Inc;

class Cpt_Car_Field {
    private static $instance;

    public function __construct()
    {
        add_action( 'add_meta_boxes', [ $this, 'add' ] );
        add_action( 'save_post', [ $this, 'save' ] );
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function add() {
        add_meta_box(
            'wl_test_theme_fields',
            'Main options',
            [ self::class, 'html' ],
            'car'
        );
    }

    public static function save( $post_id ) {
        if ( array_key_exists( 'wl_test_theme_field_color', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_wl_test_theme_field_color_meta_key',
                $_POST['wl_test_theme_field_color']
            );
        }
        if ( array_key_exists( 'wl_test_theme_field_fuel', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_wl_test_theme_field_fuel_meta_key',
                $_POST['wl_test_theme_field_fuel']
            );
        }
        if ( array_key_exists( 'wl_test_theme_field_power', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_wl_test_theme_field_power_meta_key',
                $_POST['wl_test_theme_field_power']
            );
        }
        if ( array_key_exists( 'wl_test_theme_field_price', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_wl_test_theme_field_price_meta_key',
                $_POST['wl_test_theme_field_price']
            );
        }
    }

    public static function html( $post ) {
        $color = get_post_meta( $post->ID, '_wl_test_theme_field_color_meta_key', true );
        $fuel = get_post_meta( $post->ID, '_wl_test_theme_field_fuel_meta_key', true );
        $power = get_post_meta( $post->ID, '_wl_test_theme_field_power_meta_key', true );
        $price = get_post_meta( $post->ID, '_wl_test_theme_field_price_meta_key', true );

        ?>
            <div class="wrapper_cpt_field">
                <label for="wl_test_theme_field_color">Color:</label>
                <input name="wl_test_theme_field_color" type="text" value="<?php echo $color ?>" />
            </div>
            <div class="wrapper_cpt_field">
                <label for="wl_test_theme_field_fuel">Fuel:</label>
                <select name="wl_test_theme_field_fuel" class="">
                    <option value="">Select Fuel...</option>
                    <option value="petrol" <?php selected( $fuel, 'petrol' ); ?>>Petrol</option>
                    <option value="diesel" <?php selected( $fuel, 'diesel' ); ?>>Diesel</option>
                    <option value="electricity" <?php selected( $fuel, 'electricity' ); ?>>Electricity</option>
                </select>
            </div>
            <div class="wrapper_cpt_field">
                <label for="wl_test_theme_field_power">Power:</label>
                <input name="wl_test_theme_field_power" type="number" value="<?php echo $power ?>" />
            </div>
            <div class="wrapper_cpt_field">
                <label for="wl_test_theme_field_power">Price:</label>
                <input name="wl_test_theme_field_price" type="number" value="<?php echo $price ?>" />
            </div>
        <?php
    }
}
