<?php

namespace Fusion\Field;

use Fusion\Field;

class Text extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'text',
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
        'maxlength' => ''
    ];

    public static $type = 'field';

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

    public function setMaxLength($value) {
        // Set the setting option value
        $this->settings['maxlength'] = (int)$value;
        // Return for chaining
        return $this;
    }

}