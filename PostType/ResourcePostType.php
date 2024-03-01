<?php

namespace PrysmianClub\Plugin\PostType;

use PrysmianClub\Plugin\PostType\BasePostType;

class ResourcePostType extends BasePostType
{
    public const NAME = 'resource';

    protected const ARGS = array(
        'has_archive'   => true,
        'label'         => 'Ressource',
        'menu_icon'     => 'dashicons-download',
        'public'        => true,
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
    );

    protected const TAXONOMIES = array(
        'resource_category' => array(
            'has_archive'   => true,
            'label'         => 'Catégorie',
            'public'        => true,
            'show_in_rest'  => true,
        ),
    );

    protected const ACF_CUSTOM_FIELDS = array(
        array(
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
        ),
    );
}