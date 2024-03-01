<?php

namespace PrysmianClub\Plugin\Taxonomy;

use PrysmianClub\Plugin\PostType\ResourcePostType;
use PrysmianClub\Plugin\Taxonomy\BaseTaxonomy;

class ResourceCategoryTaxonomy extends BaseTaxonomy
{
    public const NAME = 'resource_category';

    public static $postTypeName = ResourcePostType::NAME;

    protected const ARGS = array(
        'label' => 'Catégorie',
        'public' => true,
        'show_in_rest' => true,
    );
}