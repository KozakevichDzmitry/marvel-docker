<?php
require_once(ICON_PATH . "icon-menu-open.php");
require_once(ICON_PATH . "icon-menu-close.php");
require_once(ICON_PATH . "icon-btn.php");
function render_header_menu()
{
?>
    <header class="header">
        <div class="header__logo">
            <?php the_custom_logo(); ?>
            <a href="<?php home_url() ?>" class="custom-logo--mobile-link" rel="home" aria-current="page">
                <img class="custom-logo--mobile" src="<?php echo get_theme_mod('mobile_logo');?>" alt="logo">
            </a>
        </div>
        <button class="menu-toggle" aria-controls="primary-menu"
                aria-expanded="false">
            <span class="icon-open"><?php render_menu_open_icon(); ?></span>
            <span class="icon-close"><?php render_menu_close_icon(); ?></span>
        </button>
        <nav id="site-navigation" class="main-navigation navbar-toggler" >
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container_class' => 'menu-wrapper',
                )
            );
            ?>
            <div class="nav__btn">
                <a class="btn btn--mobile" id="btnContactMobile" href="#contact">CONTACT US <?php render_btn_icon(); ?></a>
            </div>
        </nav>
    </header>
<?php
}
