<?php

namespace Fusion\Field;

use Fusion\Field;

class ColorPicker extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'color_picker',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'default_value' => ''
    ];

    public static $type = 'field';

}