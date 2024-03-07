<?php

namespace PrysmianClub\Plugin\PostType;

use PrysmianClub\Plugin\PostType\BasePostType;

class ResourcePostType extends BasePostType
{
    public const NAME = 'resource';

    protected const ARGS = array(
        'has_archive'   => true,
        'label'         => 'Ressources',
        'menu_icon'     => 'dashicons-download',
        'public'        => true,
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
    );
}