<?php

namespace Fusion\Field;

use Fusion\Field;

class Relationship extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'relationship',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'post_type' => ['page'],
        'taxonomy' => ['category:uncategorized'],
        'filters' => ['search', 'post_type', 'taxonomy'],
        'elements' => '',
        'min' => '',
        'max' => '',
        'return_format' => 'object'
    ];

    public static $type = 'field';


    public function setPostTypes($types) {
        // Set the available choices
        $this->settings['post_type'] = (array)$types;
        // Return for chaining
        return $this;
    }

    public function setTaxonomy($value) {
        // Set the setting option value
        $this->settings['taxonomy'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setFilters($value) {
        // Set the setting option value
        $this->settings['filters'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setElements($value) {
        // Set the setting option value
        $this->settings['elements'] = $value;
        // Return for chaining
        return $this;
    }

    public function setMin($value) {
        // Set the setting option value
        $this->settings['min'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMax($value) {
        // Set the setting option value
        $this->settings['max'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setReturnValue($value) {
        // Set the setting option value
        $this->settings['return_format'] = (string)$value;
        // Return for chaining
        return $this;
    }
}