<?php

namespace Fusion\Field;

use Fusion\Field;

class Message extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'message',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'message' => '',
        'new_lines' => 'wpautop',
        'esc_html' => 0
    ];

    public static $type = 'field';

    public function setMessage($value) {
        // Set the setting option value
        $this->settings['message'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setNewLines($value) {
        // Set the setting option value
        $this->settings['new_lines'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setEscHTML($value) {
        // Set the setting option value
        $this->settings['esc_html'] = (bool)$value;
        // Return for chaining
        return $this;
    }

}