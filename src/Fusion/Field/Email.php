<?php

namespace Fusion\Field;

use Fusion\Field;

class Email extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'email',
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
        'append' => ''
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

}