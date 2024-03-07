<?php

namespace PrysmianClub\Plugin\FieldGroup;

use PrysmianClub\Plugin\FieldGroup\BaseFieldGroup;

use PrysmianClub\Plugin\PostType\ResourcePostType;

class ResourceFieldGroup extends BaseFieldGroup
{
    protected const ARGS = array(
        'key' => 'group_65e2256ca129c',
        'title' => 'Ressource',
        'fields' => array(
            array(
                'key' => 'field_65e2256c0be5d',
                'label' => 'Fichier',
                'name' => 'file',
                'aria-label' => '',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
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
                    'value' => ResourcePostType::NAME,
                ),
            ),
        );
    }
}