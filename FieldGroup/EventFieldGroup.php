<?php

namespace PrysmianClub\Plugin\FieldGroup;

use PrysmianClub\Plugin\FieldGroup\BaseFieldGroup;

use PrysmianClub\Plugin\PostType\EventPostType;

class EventFieldGroup extends BaseFieldGroup
{
    protected const ARGS = array(
        'key' => 'group_65ea0f690e1bf',
        'title' => 'Événements',
        'fields' => array(
            array(
                'key' => 'field_65ea0f69e2cc9',
                'label' => 'Lieu',
                'name' => 'location',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_65ea0fb2e2ccb',
                'label' => 'Date',
                'name' => 'date',
                'aria-label' => '',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'd.m Y',
                'first_day' => 1,
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    );

    protected function getLocation()
    {
        return array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => EventPostType::NAME,
                ),
            ),
        );
    }
}