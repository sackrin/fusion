<?php

namespace Fusion\Field;

use Fusion\Field;

class ButtonGroup extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'button_group',
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
        'layout' => 'horizontal',
        'return_format' => 'value'
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
        $this->settings['allow_null'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setLayout($value) {
        // Set the setting option value
        $this->settings['layout'] = (string)$value;
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