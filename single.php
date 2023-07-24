<?php get_header(); ?>

<div class="container">
    <h1>
        <?php echo get_the_title(); ?>
    </h1>
    <?php the_post_thumbnail( 'medium' ); ?>
    <p><?php echo get_the_content(); ?></>
    <div>
        <ul>
            <li>Color: <?= get_post_meta(get_the_ID(), '_wl_test_theme_field_color_meta_key', true ) ?></li>
            <li>Fuel: <?= get_post_meta(get_the_ID(), '_wl_test_theme_field_fuel_meta_key', true ) ?></li>
            <li>Power: <?= get_post_meta(get_the_ID(), '_wl_test_theme_field_power_meta_key', true ) ?></li>
            <li>Price: <?= get_post_meta(get_the_ID(), '_wl_test_theme_field_price_meta_key', true ) ?></li>
        </ul>
    </div>
</div>
<?php get_footer();