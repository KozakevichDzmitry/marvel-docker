<?php
function render_footer_contacts()
{
    $contact_title = carbon_get_post_meta(get_the_ID(), 'crb_contact_title');
    ?>
    <div id="contact" class="footer__contacts" data-block="indicate" data-block-title ="Contact"  data-indicate-color="#ffffff">
        <?php if ($contact_title):?>
        <h2 class="footer__title header-title bottom-line bottom-line-white"><?php echo $contact_title ?></h2>
        <?php endif ?>
        <div class="footer__contacts-content">
            <?php
            $contact_list = carbon_get_post_meta( get_the_ID(), 'crb_contacts' );
            if( $contact_list ) :
                foreach( $contact_list as $item ) : ?>
                    <div class="contact-wrapper">
                        <span><?php echo $item['label'] ?></span>
                        <?php
                        switch ($item['crb_contact_select']){
                            case 'address': ?>
                                <span class="contact"> <?php echo $item['contact'] ?></span>
                            <?php     break;
                            case 'phone':?>
                                <a href="tel:<?php echo $item['contact'] ?>">
                                    <?php echo $item['contact'] ?>
                                </a>
                                <?php     break;
                            case 'email':?>
                                <a href="mailto:<?php echo $item['contact'] ?>">
                                    <?php echo $item['contact'] ?>
                                </a>
                                <?php break;
                        }
                        ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <?php
}
