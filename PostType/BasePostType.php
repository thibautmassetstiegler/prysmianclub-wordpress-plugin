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

    public function registerACFCustomFields()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        if (!defined('static::ACF_CUSTOM_FIELDS')) {
            return;
        }

        $location = array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => static::NAME,
                ),
            ),
        );

        foreach (static::ACF_CUSTOM_FIELDS as $customField) {
            $customField['location'] = $location;

            acf_add_local_field_group($customField);
        }
    }
}