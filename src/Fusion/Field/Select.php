<?php

namespace Fusion\Field;

use Fusion\Field;

class Select extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'select',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'choices' => [],
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'return_format' => 'value',
        'placeholder' => ''
    ];

    public static $type = 'field';

    public function setChoices($choices) {
        // Set the available choices
        $this->settings['choices'] = $choices;
        // Return for chaining
        return $this;
    }

    public function setAllowNull($value) {
        // Set the setting option value
        $this->settings['allow_null'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setMultiple($value) {
        // Set the setting option value
        $this->settings['multiple'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setUI($value) {
        // Set the setting option value
        $this->settings['ui'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setAJAX($value) {
        // Set the setting option value
        $this->settings['ajax'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setReturnFormat($value) {
        // Set the setting option value
        $this->settings['return_format'] = (string)$value;
        // Return for chaining
        return $this;
    }

}