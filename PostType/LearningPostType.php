<?php

namespace PrysmianClub\Plugin\PostType;

use PrysmianClub\Plugin\PostType\BasePostType;

class LearningPostType extends BasePostType
{
    public const NAME = 'learning';

    protected const ARGS = array(
        'has_archive'   => true,
        'label'         => 'Formation',
        'menu_icon'     => 'dashicons-awards',
        'public'        => true,
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
    );

    protected const TAXONOMIES = array(
        'learning_category' => array(
            'label' => 'Catégorie',
            'public' => true,
            'show_in_rest' => true,
        ),
    );
}