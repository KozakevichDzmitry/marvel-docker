<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kd-marvel
 */

require_once(COMPONENTS_PATH . "footter-contacts.php");
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer__wrapper">
            <?php render_footer_contacts(); ?>
            <div class="footer__form">
                <h3 class="footer__form-title">Stay in the loop by getting on our mailing list
                </h3>
                <div class="form">
                    <?php echo do_shortcode('[contact-form-7 id="27" title="Контактная форма 1"]');?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
