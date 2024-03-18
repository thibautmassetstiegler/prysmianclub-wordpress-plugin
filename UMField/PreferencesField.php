<?php

namespace PrysmianClub\Plugin\UMField;

use PrysmianClub\Plugin\Taxonomy\{ResourceCategoryTaxonomy, TrainingCategoryTaxonomy};

class PreferencesField extends BaseField
{
    protected const NAME = 'preferences';

    public function __construct()
    {
        parent::__construct();
    }

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

    protected static function getOptions()
    {
        return array_merge(
            array_keys(self::getTerms('category')),
            array_keys(self::getTerms('post_tag')),
            array_keys(self::getTerms(ResourceCategoryTaxonomy::NAME)),
            array_keys(self::getTerms(TrainingCategoryTaxonomy::NAME)),
        );
    }

    protected static function getTerms($taxonomy)
    {
        return get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'fields' => 'id=>name',
        ));
    }

    public function render($output, $mode)
    {
        $post_categories = self::getTerms('category');
        $post_tags = self::getTerms('post_tag');
        $resource_categories = self::getTerms(ResourceCategoryTaxonomy::NAME);
        $training_categories = self::getTerms(TrainingCategoryTaxonomy::NAME);

        $selected_ids = $this->getSelectedIds($mode);

        ob_start();
        ?>
        <div class="row preferences mt-5">
            <div class="col-12">
                <p class="title-1">Vos <span class="fw-bold">préférences</span></p>
                <p><span class="fw-bold">Cochez les sujets qui vous intéressent</span> afin d&apos;avoir accès à des contenus sélectionnés selon vos préférences.</p>
            </div>
            <div class="col-3">
                <span class="preferences__title">Actus</span>
                <?php $this->renderCheckboxes($post_categories, $selected_ids); ?>
            </div>
            <div class="col-3">
                <span class="preferences__title">Centres d'intérêts</span>
                <?php $this->renderCheckboxes($post_tags, $selected_ids); ?>
            </div>
            <div class="col-3">
                <span class="preferences__title">Centres d'intérêts</span>
                <?php $this->renderCheckboxes($resource_categories, $selected_ids); ?>
            </div>
            <div class="col-3">
                <span class="preferences__title">Formations</span>
                <?php $this->renderCheckboxes($training_categories, $selected_ids); ?>
            </div>
        </div>
        <?php

        return ob_get_clean();
    }

    private function renderCheckboxes($terms, $selected_ids)
    {
        foreach($terms as $id => $name):
            $attr_id = "preferences_" . $id;
            ?>
            <p class="form-check mb-2 fw-medium">
                <input
                    class="form-check-input"
                    id="<?php echo esc_attr($attr_id); ?>"
                    type="checkbox"
                    name="<?php echo esc_attr(static::NAME); ?>[]"
                    value="<?php echo $id; ?>"
                    <?php if (in_array($id, $selected_ids)): ?>
                        checked
                    <?php endif; ?>
                />
                <label
                    class="form-check-label"
                    for="<?php echo esc_attr($attr_id); ?>"
                ><?php echo $name; ?></label>
            </p>
        <?php
        endforeach;
    }

    private function getSelectedIds($mode)
    {
        $selected_ids = array();

        if ($mode === 'register' && ! empty($_POST[static::NAME])) {
            $selected_ids = $_POST[static::NAME];
        } else if ($mode === 'profile') {
            if (! empty($_POST[static::NAME])) {
                $selected_ids = $_POST[static::NAME];
            } else {
                $selected_ids = get_user_meta(wp_get_current_user()->ID, static::NAME, true);
            }
        }

        if (! is_array($selected_ids)) {
            $selected_ids = array();
        }

        return $selected_ids;
    }
}