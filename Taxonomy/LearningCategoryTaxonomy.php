<?php

namespace PrysmianClub\Plugin\Taxonomy;

use PrysmianClub\Plugin\PostType\LearningPostType;
use PrysmianClub\Plugin\Taxonomy\BaseTaxonomy;

class LearningCategoryTaxonomy extends BaseTaxonomy
{
    public const NAME = 'learning_category';

    public static $postTypeName = LearningPostType::NAME;

    protected const ARGS = array(
        'label' => 'Catégorie',
        'public' => true,
        'show_in_rest' => true,
    );
}