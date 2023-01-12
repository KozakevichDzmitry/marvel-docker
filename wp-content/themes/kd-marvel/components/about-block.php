<?php
function render_about_block()
{
    ?>
    <div id="about" class="about" data-block="indicate" data-block-title ="About"  data-indicate-color="#333333">
        <div class="container">
            <?php
            $about_title = carbon_get_post_meta(get_the_ID(), 'crb_about_title');
            if ($about_title):?>
                <h2 class="about__header header-title bottom-line"><?php echo $about_title?></h2>
            <?php endif ?>
            <?php
            $list = carbon_get_post_meta( get_the_ID(), 'crb_list_about' );
            if( $list ) :
                foreach( $list as $item ) : ?>
                    <div class="about__content">
                        <div class="about__image"><?php echo wp_get_attachment_image( $item[ 'photo' ], 'full'); ?></div>
                        <div class="about__description"><?php echo $item[ 'description' ]; ?></div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <?php
}
