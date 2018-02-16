<?php

namespace Fusion\Field;

use Fusion\Field;

class TimePicker extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'time_picker',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'display_format' => "g:i a",
        'return_format' => "g:i a"
    ];

    public static $type = 'field';

    public function setDisplayFormat($value) {
        // Set the setting option value
        $this->settings['display_format'] = (string)$value;
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