<?php

namespace Fusion\Field;

use Fusion\Field;

class Gallery extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'gallery',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'min' => '',
        'max' => '',
        'insert' => 'append',
        'library' => 'uploadedTo',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
    ];

    public static $type = 'field';

    public function setMin($value) {
        // Set the setting option value
        $this->settings['min'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setMax($value) {
        // Set the setting option value
        $this->settings['max'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setInsert($value) {
        // Set the setting option value
        $this->settings['insert'] = (string)$value;
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
        $this->settings['mime_types'] = (int)$value;
        // Return for chaining
        return $this;
    }

}