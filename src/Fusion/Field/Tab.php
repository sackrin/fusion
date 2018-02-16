<?php

namespace Fusion\Field;

use Fusion\Field;

class Tab extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'placement' => 'left',
        'endpoint' => ''
    ];

    public static $type = 'tab';

    public static $purpose = 'display';

    public function setPlacement($value) {
        // Set the setting option value
        $this->settings['placement'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setEndpoint($value) {
        // Set the setting option value
        $this->settings['endpoint'] = (bool)$value;
        // Return for chaining
        return $this;
    }

}