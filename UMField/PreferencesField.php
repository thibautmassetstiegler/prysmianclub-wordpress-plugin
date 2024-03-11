<?php

namespace PrysmianClub\Plugin\UMField;

use PrysmianClub\Plugin\Taxonomy\{ResourceCategoryTaxonomy, TrainingCategoryTaxonomy};

class PreferencesField extends BaseField
{
    protected const NAME = 'preferences';

    public static function getArgs()
    {
        return array(
            'title' => 'Préférences',
            'metakey' => self::NAME,
            'type' => 'checkbox',
            'label' => 'Vos préférences',
            'required' => 0,
            'public' => 1,
            'editable' => true,
            'options' => self::getOptions(),
        );
    }

    private static function getOptions()
    {
        $categories = get_categories();

        return array_map( function($category) {
            return $category->name;
        }, $categories );
    }

    public function render($output, $mode)
    {
        $post_categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ));

        $post_tags = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
        ));

        $resource_categories = get_terms(array(
            'taxonomy' => ResourceCategoryTaxonomy::NAME,
            'hide_empty' => false,
        ));

        $training_categories = get_terms(array(
            'taxonomy' => TrainingCategoryTaxonomy::NAME,
            'hide_empty' => false,
        ));

        echo '<pre>'; var_dump($_POST); echo '</pre>';

        ob_start();
        ?>
        <div class="row">
            <div class="col-3">
                Actus
                <?php
                foreach($post_categories as $term):
                    $attr_id = "preferences_category_" . $term->term_id;
                    ?>
                    <p class="form-check">
                        <input
                            class="form-check-input"
                            id="<?php echo esc_attr($attr_id); ?>"
                            type="checkbox"
                            name="preferences[]"
                            value="<?php echo $term->term_id; ?>"
                            <?php if (in_array($term->term_id, $_POST['preferences'])): ?>
                                checked
                            <?php endif; ?>
                        />
                        <label
                            class="form-check-label"
                            for="<?php echo esc_attr($attr_id); ?>"
                        ><?php echo $term->name; ?></label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="col-3">
                Centres d'intérêts
                <?php
                foreach($post_tags as $term):
                    $attr_id = "preferences_post_tag_" . $term->term_id;
                    ?>
                    <p class="form-check">
                        <input
                            class="form-check-input"
                            id="<?php echo esc_attr($attr_id); ?>"
                            type="checkbox"
                            name="preferences[]"
                            value="<?php echo $term->term_id; ?>"
                            <?php if (in_array($term->term_id, $_POST['preferences'])): ?>
                                checked
                            <?php endif; ?>
                        />
                        <label
                            class="form-check-label"
                            for="<?php echo esc_attr($attr_id); ?>"
                        ><?php echo $term->name; ?></label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="col-3">
                Ressources
                <?php
                foreach($resource_categories as $term):
                    $attr_id = "preferences_resource_category_" . $term->term_id;
                    ?>
                    <p class="form-check">
                        <input
                            class="form-check-input"
                            id="<?php echo esc_attr($attr_id); ?>"
                            type="checkbox"
                            name="preferences[]"
                            value="<?php echo $term->term_id; ?>"
                            <?php if (in_array($term->term_id, $_POST['preferences'])): ?>
                                checked
                            <?php endif; ?>
                        />
                        <label
                            class="form-check-label"
                            for="<?php echo esc_attr($attr_id); ?>"
                        ><?php echo $term->name; ?></label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="col-3">
                Formations
                <?php
                foreach($training_categories as $term):
                    $attr_id = "preferences_training_category_" . $term->term_id;
                    ?>
                    <p class="form-check">
                        <input
                            class="form-check-input"
                            id="<?php echo esc_attr($attr_id); ?>"
                            type="checkbox"
                            name="preferences[]"
                            value="<?php echo $term->term_id; ?>"
                            <?php if (in_array($term->term_id, $_POST['preferences'])): ?>
                                checked
                            <?php endif; ?>
                        />
                        <label
                            class="form-check-label"
                            for="<?php echo esc_attr($attr_id); ?>"
                        ><?php echo $term->name; ?></label>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}