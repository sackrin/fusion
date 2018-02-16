<?php

namespace Fusion\Field;

use Fusion\Field;

class Textarea extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'textarea',
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
        'maxlength' => '',
        'rows' => 3,
        'new_lines' => ''
    ];

    public static $type = 'field';

    public function setRows($value) {
        // Set the setting option value
        $this->settings['rows'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMaxLength($value) {
        // Set the setting option value
        $this->settings['maxlength'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setNewLines($value) {
        // Set the setting option value
        $this->settings['new_lines'] = (string)$value;
        // Return for chaining
        return $this;
    }

}