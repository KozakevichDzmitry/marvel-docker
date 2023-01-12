<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kd-marvel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$main_bg_image = get_theme_mod('main_bg_image')
?>
<style>
    <?php if($main_bg_image) : ?>
        .main_bg-image {
            background: url(<?php echo $main_bg_image ?>) no-repeat;
            background-size: cover;
            position: relative;
        }
        .main_bg-image:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, #000000 4.66%, rgba(0, 0, 0, 0) 76.78%);
            transform: matrix(1, 0, 0, -1, 0, 0);
        }
    <?php endif ?>
</style>
<?php wp_body_open(); ?>
<div id="page" class="site">
