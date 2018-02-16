<?php

namespace Fusion\Field;

use Fusion\Field;

class File extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'file',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'return_format' => 'array',
        'library' => 'uploadedTo',
        'min_size' => '',
        'max_size' => '',
        'mime_types' => ''
    ];

    public static $type = 'field';

    public function setReturnFormat($value) {
        // Set the setting option value
        $this->settings['return_format'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setLibrary($value) {
        // Set the setting option value
        $this->settings['library'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setMinSize($value) {
        // Set the setting option value
        $this->settings['min_size'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMaxSize($value) {
        // Set the setting option value
        $this->settings['max_size'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMimeTypes($value) {
        // Set the setting option value
        $this->settings['mime_types'] = (int)$value;
        // Return for chaining
        return $this;
    }

}