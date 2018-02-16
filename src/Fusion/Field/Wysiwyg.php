<?php

namespace Fusion\Field;

use Fusion\Field;

class Wysiwyg extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'wysiwyg',
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
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0
    ];

    public static $type = 'field';

    public function setTabs($value) {
        // Set the setting option value
        $this->settings['tabs'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setToolbar($value) {
        // Set the setting option value
        $this->settings['toolbar'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setMediaUpload($value) {
        // Set the setting option value
        $this->settings['media_upload'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setDelay($value) {
        // Set the setting option value
        $this->settings['delay'] = (int)$value;
        // Return for chaining
        return $this;
    }

}