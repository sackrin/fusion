<?php

namespace Fusion\Field;

use Fusion\Field;

class oEmbed extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'oembed',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'width' => '',
        'height' => ''
    ];

    public static $type = 'field';

    public function setWidth($value) {
        // Set the setting option value
        $this->settings['width'] = (float)$value;
        // Return for chaining
        return $this;
    }

    public function setHeight($value) {
        // Set the setting option value
        $this->settings['height'] = (float)$value;
        // Return for chaining
        return $this;
    }
}