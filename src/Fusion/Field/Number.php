<?php

namespace Fusion\Field;

use Fusion\Field;

class Number extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'number',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => '',
        'max' => '',
        'step' => ''
    ];

    public static $type = 'field';

    public function setMin($value) {
        // Set the setting option value
        $this->settings['min'] = (float)$value;
        // Return for chaining
        return $this;
    }

    public function setMax($value) {
        // Set the setting option value
        $this->settings['max'] = (float)$value;
        // Return for chaining
        return $this;
    }

    public function setStep($value) {
        // Set the setting option value
        $this->settings['step'] = (float)$value;
        // Return for chaining
        return $this;
    }

    public function setPrepend($value) {
        // Set the setting option value
        $this->settings['prepend'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setAppend($value) {
        // Set the setting option value
        $this->settings['append'] = (string)$value;
        // Return for chaining
        return $this;
    }

}