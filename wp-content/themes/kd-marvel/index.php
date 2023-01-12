<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kd-marvel
 */

require_once(ICON_PATH . "icon-btn.php");
require_once(ICON_PATH . "icon-arrow-right.php");
require_once(COMPONENTS_PATH . "header_menu.php");
require_once(COMPONENTS_PATH . "about-block.php");
require_once(COMPONENTS_PATH . "services_block.php");

get_header();
?>

    <main id="primary" class="site-main">
        <div class="main__section main_bg-image">
            <div class="main__section-wrapper container">
                <?php render_header_menu();?>
                <div id="home" class="header__site-branding" data-block="indicate" data-block-title ="Home"
                     data-indicate-color="#ffffff">
                    <?php
                    $main_title = get_theme_mod('main_header');
                    if ($main_title):?>
                    <h1 class="header__site-title"><?php  echo $main_title ?></h1>
                    <?php endif ?>
                    <?php $main_description = get_bloginfo('description');
                    if ($main_description):?>
                        <p class="header__site-description"><?php echo $main_description; ?></p>
                    <?php endif ?>
                    <a class="btn" href="#contact">CONTACT US <?php render_btn_icon(); ?></a>
                </div>
                <div class="main__section-footer">
                    <p class="header__info-text">Scroll for more</p>
                </div>
            </div>
        </div>
        <?php render_about_block();?>
        <?php render_services_block();?>
    </main>
<?php
    get_footer();


