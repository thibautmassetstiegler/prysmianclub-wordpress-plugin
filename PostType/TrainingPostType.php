<?php

namespace PrysmianClub\Plugin\PostType;

use PrysmianClub\Plugin\PostType\BasePostType;

class TrainingPostType extends BasePostType
{
    public const NAME = 'training';

    protected const ARGS = array(
        'has_archive'   => true,
        'label'         => 'Formation',
        'menu_icon'     => 'dashicons-awards',
        'public'        => true,
        'rest_base'     => 'trainings',
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
    );
}