<?php

namespace PrysmianClub\Plugin\FieldGroup;

class BaseFieldGroup
{
    public function __construct()
    {
        add_action('acf/include_fields', array($this, 'register'));
    }

    public function register()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        if (!defined('static::ARGS')) {
            return;
        }

        if (!method_exists($this, 'getLocation')) {
            return;
        }

        $customField = array(
            'location' => $this->getLocation(),
            ...static::ARGS,
        );

        acf_add_local_field_group($customField);
    }
}