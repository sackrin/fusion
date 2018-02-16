<?php

namespace Fusion\Field;

use Fusion\Field;

class User extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'user',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'role' => '',
        'allow_null' => 0,
        'multiple' => 0
    ];

    public static $type = 'field';

    public function setRole($value) {
        // Set the setting option value
        $this->settings['role'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setAllowNull($value) {
        // Set the setting option value
        $this->settings['allow_null'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMultiple($value) {
        // Set the setting option value
        $this->settings['multiple'] = (int)$value;
        // Return for chaining
        return $this;
    }

}