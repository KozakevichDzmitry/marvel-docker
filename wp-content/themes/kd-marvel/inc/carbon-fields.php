<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'truemisha_carbon');
function truemisha_carbon()
{

    Container::make('post_meta', 'Настройки страницы')
        ->add_tab(__('About block'), array(
            Field::make('text', 'crb_about_title', __('Title in about block')),
            Field::make('complex', 'crb_list_about', __('List'))
                ->add_fields(array(
                    Field::make('image', 'photo', __('List photo')),
                    Field::make('textarea', 'description', __('List description')),
                ))
        ))
        ->add_tab(__('Services block'), array(
            Field::make('text', 'crb_services_title', __('Title in the services block')),
            Field::make('textarea', 'crb_services_description', __('Description after title')),
            Field::make('complex', 'crb_list_services', __('List services'))
                ->add_fields(array(
                    Field::make('text', 'title', __('Service title')),
                    Field::make('complex', 'crb_service_options_list', __('Service options list'))
                        ->add_fields(array(
                            Field::make('textarea', 'text', __('Option text')),
                        ))
                )),
            Field::make('textarea', 'crb_services_description2', __('Description after list services')),
        ))
        ->add_tab(__('Contacts'), array(
            Field::make('text', 'crb_contact_title', __('Title in the contact block')),
            Field::make('complex', 'crb_contacts', __('Contacts list'))
                ->add_fields(array(
                    Field::make( 'select', 'crb_contact_select', __( 'Choose Options' ) )
                        ->set_options( array(
                            'address' => 'address',
                            'email' => 'e-mail',
                            'phone' => 'phone',
                        ) ),
                    Field::make('text', 'label', __('Label')),
                    Field::make('text', 'contact', __('Contact')),
                )),
        ));

}