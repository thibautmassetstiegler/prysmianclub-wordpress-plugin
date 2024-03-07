<?php

namespace PrysmianClub\Plugin\PostType;

use PrysmianClub\Plugin\PostType\BasePostType;

class EventPostType extends BasePostType
{
    public const NAME = 'event';

    protected const ARGS = array(
        'has_archive'   => true,
        'label'         => 'Événements',
        'menu_icon'     => 'dashicons-calendar',
        'public'        => true,
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
    );
}