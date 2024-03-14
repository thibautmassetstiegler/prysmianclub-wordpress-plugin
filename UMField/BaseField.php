<?php

namespace PrysmianClub\Plugin\UMField;

class BaseField
{
    public function __construct()
    {
        add_filter( 'um_predefined_fields_hook', array( $this, 'register' ), 10, 1 );

        if (method_exists($this, 'render')) {
            add_filter(
                sprintf('um_%s_form_edit_field', static::NAME),
                array($this, 'render'),
                10,
            2);
        }
    }

    public function register($predefined_fields)
    {
        $predefined_fields[static::NAME] = static::getArgs();

        return $predefined_fields;
    }
}