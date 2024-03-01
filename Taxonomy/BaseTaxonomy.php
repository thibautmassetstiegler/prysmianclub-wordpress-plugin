<?php

namespace PrysmianClub\Plugin\Taxonomy;

class BaseTaxonomy
{
    public function __construct()
    {
        add_action('init', array($this, 'register'));
    }

    public function register()
    {
        if (!defined('static::NAME')) {
            return;
        }

        register_taxonomy(static::NAME, static::$postTypeName, static::ARGS);
    }

    public function unregister()
    {
        if (!defined('static::NAME')) {
            return;
        }

        unregister_taxonomy(static::NAME);
    }
}