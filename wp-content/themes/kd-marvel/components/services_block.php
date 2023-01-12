<?php

function render_services_block(){
?>
    <div id="services" class="services" data-block="indicate" data-block-title ="Services"  data-indicate-color="#333333">
        <div class="services__wrapper container">
            <?php
            $services_title = carbon_get_post_meta(get_the_ID(), 'crb_services_title');
            if ( $services_title):?>
                <h2 class="services__header header-title bottom-line bottom-line-white"><?php echo  $services_title ?></h2>
            <?php endif ?>
            <?php
            $services_description = carbon_get_post_meta(get_the_ID(), 'crb_services_description');
            if ( $services_description):?>
                <p class="services__description"><?php echo  $services_description ?></p>
            <?php endif ?>
            <?php $list_services = carbon_get_post_meta( get_the_ID(), 'crb_list_services' );
            if( $list_services ) :?>
                <div class="services__lists">
                    <?php foreach( $list_services as $service ) : ?>
                        <div class="services__list">
                            <h3 class="services__list-title"><?php echo $service[ 'title' ]; ?></h3>
                            <?php
                            $service_options_list = $service['crb_service_options_list'];
                            if( $service_options_list ) :?>
                                <div class="services__list-wrapper">
                                    <ul class="services__list-items">
                                        <?php foreach( $service_options_list as $item ) : ?>
                                            <li class="services__list-item"><?php echo $item[ 'text' ]; ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                    <a href="" class="services__link"><?php render_arrow_right_icon(); ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <?php
            $services_description2 = carbon_get_post_meta(get_the_ID(), 'crb_services_description2');
            if ( $services_description2):?>
                <p class="services__description"><?php echo $services_description2 ?></p>
            <?php endif ?>
        </div>
    </div>
<?php
}