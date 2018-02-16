<?php

namespace Fusion\Field;

use Fusion\Field;

class Checkbox extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'checkbox',
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
        'allow_custom' => 0,
        'save_custom' => 0,
        'default_value' => [],
        'layout' => 'vertical',
        'toggle' => 0,
        'return_format' => 'value',
    ];

    public static $type = 'field';

    public function setChoices($choices) {
        // Set the available choices
        $this->settings['choices'] = $choices;
        // Return for chaining
        return $this;
    }

    public function setAllowCustom($value) {
        // Set the setting option value
        $this->settings['allow_custom'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setSaveCustom($value) {
        // Set the setting option value
        $this->settings['save_custom'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setLayout($value) {
        // Set the setting option value
        $this->settings['layout'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setToggle($value) {
        // Set the setting option value
        $this->settings['toggle'] = (int)$value;
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