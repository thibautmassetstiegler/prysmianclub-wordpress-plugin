<?php
/**
 * Plugin Name: Prysmian Club
 * Author: Thibaut Masset Stiegler
 * Author URI: https://github.com/thibautmassetstiegler
 */

if (!defined('WPINC')) {
    exit;
}

define('PRYSMIANCLUB_PLUGIN_PATH', plugin_dir_path(__FILE__));

require PRYSMIANCLUB_PLUGIN_PATH . 'autoload.php';

use PrysmianClub\Plugin\PostType\{EventPostType, ResourcePostType, TrainingPostType,};
use PrysmianClub\Plugin\Taxonomy\{ResourceCategoryTaxonomy, TrainingCategoryTaxonomy};
use PrysmianClub\Plugin\FieldGroup\{CategoryFieldGroup, EventFieldGroup, ResourceFieldGroup};

// Post Types
$event_post_type = new EventPostType;
$training_post_type = new TrainingPostType;
$resource_post_type = new ResourcePostType;

// Taxonomies
$resource_category_taxonomy = new ResourceCategoryTaxonomy;
$training_category_taxonomy = new TrainingCategoryTaxonomy;

// Field groups
new CategoryFieldGroup;
new EventFieldGroup;
new ResourceFieldGroup;

register_activation_hook(PRYSMIANCLUB_PLUGIN_PATH, function() use (
    $event_post_type,
    $resource_post_type,
    $training_post_type,
    $resource_category_taxonomy,
    $training_category_taxonomy,
) {
    $event_post_type->register();
    $resource_post_type->register();
    $training_post_type->register();

    $resource_category_taxonomy->register();
    $training_category_taxonomy->register();

    flush_rewrite_rules();
});

register_deactivation_hook(PRYSMIANCLUB_PLUGIN_PATH, function() use (
    $event_post_type,
    $resource_post_type,
    $training_post_type,
    $resource_category_taxonomy,
    $training_category_taxonomy,
) {
    $event_post_type->unregister();
    $resource_post_type->unregister();
    $training_post_type->unregister();

    $resource_category_taxonomy->unregister();
    $training_category_taxonomy->unregister();

    flush_rewrite_rules();
});