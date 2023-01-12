<?php
add_action( 'customize_register', 'customizer_init' );

function customizer_init( $wp_customize ) {
    $wp_customize->add_setting( 'mobile_logo', [
            'default'      => '',
            'transport'    => 'refresh'
        ]
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'mobile_logo', [
            'section'   => 'title_tagline',
            'label'    => 'Mobile logo',
        ] )
    );
    $wp_customize->add_setting(
        'main_header',
        array(
            'default'    =>  true,
            'transport'  =>  'refresh'
        )
    );
    $wp_customize->add_control(
        'main_header',
        array(
            'section'   => 'title_tagline',
            'label'     => 'Основной заголовок',
            'type'      => 'text'
        )
    );

    $wp_customize->add_setting( 'main_bg_image', [
            'default'      => '',
            'transport'    => 'refresh'
        ]
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'main_bg_image', [
            'section'   => 'title_tagline',
            'label'    => 'Фон сайта',
        ] )
    );

    $wp_customize->add_setting( 'email', [
            'default'      => '',
            'transport'    => 'refresh'
        ]
    );
    $wp_customize->add_control(
        'email',
        array(
            'section'   => 'title_tagline',
            'label'     => 'E-mail',
            'type'      => 'text'
        )
    );


}