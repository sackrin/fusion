<?php

namespace Fusion\Field;

use Fusion\Field;

class GoogleMap extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'google_map',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'center_lat' => '',
        'center_lng' => '',
        'zoom' => '',
        'height' => ''
    ];

    public static $type = 'field';

    public function setCenterLat($value) {
        // Set the setting option value
        $this->settings['center_lat'] = $value;
        // Return for chaining
        return $this;
    }

    public function setCenterLng($value) {
        // Set the setting option value
        $this->settings['center_lng'] = $value;
        // Return for chaining
        return $this;
    }

    public function setZoom($value) {
        // Set the setting option value
        $this->settings['zoom'] = $value;
        // Return for chaining
        return $this;
    }

    public function setHeight($value) {
        // Set the setting option value
        $this->settings['height'] = $value;
        // Return for chaining
        return $this;
    }

}