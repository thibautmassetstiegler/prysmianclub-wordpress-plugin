<?php

namespace PrysmianClub\Plugin\FieldGroup;

use PrysmianClub\Plugin\FieldGroup\BaseFieldGroup;

use PrysmianClub\Plugin\Taxonomy\LearningCategoryTaxonomy;
use PrysmianClub\Plugin\Taxonomy\ResourceCategoryTaxonomy;

class CategoryCssIconFieldGroup extends BaseFieldGroup
{
    protected const ARGS = array(
        'key' => 'group_65e3083d10014',
        'title' => 'Catégorie',
        'fields' => array(
            array(
                'key' => 'field_65e3083d4c2b7',
                'label' => 'Classe CSS d\'icone',
                'name' => 'icon_css_class',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
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
    );

    protected function getLocation()
    {
        return array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => LearningCategoryTaxonomy::NAME,
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => ResourceCategoryTaxonomy::NAME,
                ),
            ),
        );
    }
}