<?php

namespace Fusion\Field;

use Fusion\Field;

class Image extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'image',
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
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
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

    public function setPreviewSize($value) {
        // Set the setting option value
        $this->settings['preview_size'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setLibrary($value) {
        // Set the setting option value
        $this->settings['library'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setMinWidth($value) {
        // Set the setting option value
        $this->settings['min_width'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMinHeight($value) {
        // Set the setting option value
        $this->settings['min_height'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMinSize($value) {
        // Set the setting option value
        $this->settings['min_size'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMaxWidth($value) {
        // Set the setting option value
        $this->settings['max_width'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMaxHeight($value) {
        // Set the setting option value
        $this->settings['max_height'] = (int)$value;
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
        $this->settings['mime_types'] = $value;
        // Return for chaining
        return $this;
    }

}