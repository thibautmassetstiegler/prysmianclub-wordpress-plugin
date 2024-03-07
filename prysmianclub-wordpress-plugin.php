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

use PrysmianClub\Plugin\PostType\{EventPostType, LearningPostType, ResourcePostType};
use PrysmianClub\Plugin\Taxonomy\{LearningCategoryTaxonomy, ResourceCategoryTaxonomy};
use PrysmianClub\Plugin\FieldGroup\{CategoryFieldGroup, EventFieldGroup, ResourceFieldGroup};

// Post Types
$event_post_type = new EventPostType;
$learning_post_type = new LearningPostType;
$resource_post_type = new ResourcePostType;

// Taxonomies
$learning_category_taxonomy = new LearningCategoryTaxonomy;
$resource_category_taxonomy = new ResourceCategoryTaxonomy;

// Field groups
new CategoryFieldGroup;
new EventFieldGroup;
new ResourceFieldGroup;

register_activation_hook(PRYSMIANCLUB_PLUGIN_PATH, function() use ($event_post_type, $learning_post_type, $resource_post_type) {
    $event_post_type->register();
    $learning_post_type->register();
    $resource_post_type->register();

    $learning_category_taxonomy->register();
    $resource_category_taxonomy->register();

    flush_rewrite_rules();
});

register_deactivation_hook(PRYSMIANCLUB_PLUGIN_PATH, function() use ($learning_post_type, $resource_post_type) {
    $event_post_type->unregister();
    $learning_post_type->unregister();
    $resource_post_type->unregister();

    $learning_category_taxonomy->unregister();
    $resource_category_taxonomy->unregister();

    flush_rewrite_rules();
});