<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
        </div>
        <div class="phone">
            <?php echo get_theme_mod( 'wl_test_theme_header_phone' ); ?>
        </div>
	</header>
