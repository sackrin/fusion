<?php

namespace Fusion\Field;

use Fusion\Field;

class PostObject extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'post_object',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'post_type' => [],
        'taxonomy' => [],
        'allow_null' => 0,
        'multiple' => 0,
        'return_format' => 'object',
        'ui' => 1
    ];

    public static $type = 'field';

    public function setPostType($value) {
        // Set the setting option value
        $this->settings['post_type'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setTaxonomy($value) {
        // Set the setting option value
        $this->settings['taxonomy'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setAllowNull($value) {
        // Set the setting option value
        $this->settings['multiple'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setMultiple($value) {
        // Set the setting option value
        $this->settings['taxonomy'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setReturnFormat($value) {
        // Set the setting option value
        $this->settings['return_format'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setUI($value) {
        // Set the setting option value
        $this->settings['ui'] = (bool)$value;
        // Return for chaining
        return $this;
    }

}