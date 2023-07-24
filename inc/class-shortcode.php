<?php

namespace Wl_Test_Theme\Inc;

class Shortcode {
    private static $instance;

    public function __construct()
    {
        add_shortcode('cars', [$this, 'cars']);
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function cars()
    {
        $args = array(
            'post_type' => 'car',
            'posts_per_page' => 10,
        );
        $the_query = new \WP_Query($args);
        if ($the_query->have_posts()) :?>
            <ul>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <li><a href="<?php echo get_permalink() ?>"><?php echo get_the_title()?> </a></li>
                <?php endwhile; ?>
            </ul>
        <?php else:?>
            <p>No posts found.</p>
        <?php endif;
    }
}
