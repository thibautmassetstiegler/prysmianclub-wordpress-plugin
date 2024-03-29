<?php

namespace PrysmianClub\Plugin\Taxonomy;

use PrysmianClub\Plugin\PostType\TrainingPostType;
use PrysmianClub\Plugin\Taxonomy\BaseTaxonomy;

class TrainingCategoryTaxonomy extends BaseTaxonomy
{
    public const NAME = 'training_category';

    public static $postTypeName = TrainingPostType::NAME;

    protected const ARGS = array(
        'label' => 'Catégories',
        'labels' => array(
            'name' => 'Catégories',
            'singular_name' => 'Catégorie',
            'search_items' => 'Rechercher des catégories',
            'popular_items' => 'Catégories populaires',
            'all_items' => 'Toutes les catégories',
            'edit_item' => 'Modifier la catégorie',
            'view_item' => 'Voir la catégorie',
            'update_item' => 'Modifier la catégorie',
            'add_new_item' => 'Ajouter une catégorie',
            'new_item_name' => 'Nom de la nouvelle catégorie',
            'separate_items_with_commas' => 'Séparez les catégories par des virgules',
            'add_or_remove_items' => 'Ajouter ou retirer des catégories',
            'choose_from_most_used' => 'Choisissez parmi les catégories les plus utilisées',
            'not_found' => 'Aucune catégorie trouvée.',
            'no_terms' => 'Aucune catégorie',
            'filter_by_item' => 'Filtrer par catégorie',
            'items_list_navigation' => 'Navigation de la liste des catégories',
            'items_list' => 'Liste des catégories',
            'most_used' => 'Plus utilisés',
            'back_to_items' => '← Aller aux catégories',
            'item_link' => 'Lien de catégorie',
            'item_link_description' => 'Un lien vers une catégorie.',
            'archives' => 'Toutes les catégories',
         ),
        'public' => true,
        'rest_base' => 'training_categories',
        'show_admin_column' => true,
        'show_in_rest' => true,
    );
}