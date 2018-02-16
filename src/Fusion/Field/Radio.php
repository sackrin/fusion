<?php

namespace Fusion\Field;

use Fusion\Field;

class Radio extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'radio',
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
        'allow_null' => 0,
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
        'return_format' => 'value',
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

    public function setOtherChoice($value) {
        // Set the setting option value
        $this->settings['other_choice'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setSaveOtherChoice($value) {
        // Set the setting option value
        $this->settings['save_other_choice'] = (int)$value;
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