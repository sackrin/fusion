<?php

namespace Fusion\Field;

use Fusion\Field;

class Taxonomy extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'taxonomy',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'taxonomy' => 'access',
        'field_type' => 'multi_select',
        'allow_null' => 0,
        'add_term' => 1,
        'save_terms' => 1,
        'load_terms' => 1,
        'return_format' => 'id',
        'multiple' => 0
    ];

    public static $type = 'field';

    public function setTaxonomy($value) {
        // Set the setting option value
        $this->settings['taxonomy'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setFieldType($value) {
        // Set the setting option value
        $this->settings['field_type'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setAllowNull($value) {
        // Set the setting option value
        $this->settings['allow_null'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setAddTerm($value) {
        // Set the setting option value
        $this->settings['add_term'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setSaveTerms($value) {
        // Set the setting option value
        $this->settings['save_terms'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setLoadTerms($value) {
        // Set the setting option value
        $this->settings['load_terms'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setReturnFormat($value) {
        // Set the setting option value
        $this->settings['return_format'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setMultiple($value) {
        // Set the setting option value
        $this->settings['multiple'] = (bool)$value;
        // Return for chaining
        return $this;
    }

}