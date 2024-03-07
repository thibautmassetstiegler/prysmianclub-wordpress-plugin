<?php

namespace PrysmianClub\Plugin\PostType;

class BasePostType
{
    public function __construct()
    {
        add_action('init', array($this, 'register'));
    }

    public function register()
    {
        register_post_type(static::NAME, static::ARGS);
    }

    public function unregister()
    {
        unregister_post_type(static::NAME);
    }
}