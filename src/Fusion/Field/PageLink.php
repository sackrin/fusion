<?php

namespace Fusion\Field;

use Fusion\Field;

class PageLink extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'page_link',
        'label' => '',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'post_type' => [],
        'taxonomy' => [],
        'allow_null' => 0,
        'allow_archives' => 1,
        'multiple' => 0
    ];

    public static $type = 'field';

    public function setPostType($value) {
        // Set the setting option value
        $this->settings['post_type'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setTaxonomy($value) {
        // Set the setting option value
        $this->settings['taxonomy'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function setAllowNull($value) {
        // Set the setting option value
        $this->settings['allow_null'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setAllowArchives($value) {
        // Set the setting option value
        $this->settings['allow_archives'] = (bool)$value;
        // Return for chaining
        return $this;
    }

    public function setMultiple($value) {
        // Set the setting option value
        $this->settings['multiple'] = (bool)$value;
        // Return for chaining
        return $this;
    }

}