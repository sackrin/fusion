<?php

namespace Fusion;

use Underscore\Types\Arrays;

class FieldGroup extends Field {

    public static $defaults = [
        'key' => '',
        'title' => '',
        'fields' => [],
        'location' => [],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ];

    public static $type = 'group';

    public $fields = [];

    public function __construct($code, $label) {
        // Call the parent first to set all the standard field values
        parent::__construct($code, $label);
        // Set the title value, this is unique to core groups
        $this->settings['title'] = $label;
    }

    public function addLocation($param, $value, $operator='==') {

        $this->settings['location'][] = [
            [
                'param' => $param,
                'operator' => $operator,
                'value' => $value,
            ]
        ];
        // Return for chaining
        return $this;
    }

    public function setMenuOrder($value) {
        // Set the updated value
        $this->settings['menu_order'] = (int)$value;
        // Return for chaining
        return $this;
    }

    public function setPosition($value) {
        // Set the updated value
        $this->settings['position'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setStyle($value) {
        // Set the updated value
        $this->settings['style'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setInstructionPlacement($value) {
        // Set the updated value
        $this->settings['instruction_placement'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setHideOnScreen($value) {
        // Set the updated value
        $this->settings['hide_on_screen'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setLabelPlacement($value) {
        // Set the updated value
        $this->settings['label_placement'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setLocation($value) {
        // Set the updated value
        $this->settings['location'] = (array)$value;
        // Return for chaining
        return $this;
    }

    public function addField($fieldObj) {
        // Set the parent for future use
        $fieldObj->setParent($this);
        // Add to the fields collection
        $this->fields[] = $fieldObj;
        // Return for chaining
        return $this;
    }

    public function addFieldset($fieldset, $prefix='') {
        // Set the parent for future use
        $fieldset->fields($this, $prefix);
        // Return for chaining
        return $this;
    }

    public function toArray($format='key') {
        // Retrieve the field settings
        $settings = $this->settings;
        // Retrieve the out key
        $outPrefix = ($format === 'key')  ? $this->getKey() :$this->getCode();
        // Loop through each of the fields
        foreach ($this->fields as $k => $field) {
            // Populate the subfields with the to array results
            $settings['fields'][$outPrefix] = $field->toArray($format);
        }
        // Return the settings array
        return apply_filters('fusion/group/to_array', $settings, $this);
    }

    public function toSettings() {
        // Retrieve the field settings
        $settings = $this->settings;
        // Loop through each of the fields
        foreach ($this->fields as $k => $field) {
            // Populate the subfields with the to array results
            $settings['fields'][] = $field->toSettings();
        }
        // Return the settings array
        return apply_filters('fusion/group/to_settings', $settings, $this);
    }

    public function toObjects($index, $format='key', $prefix='') {
        // Retrieve the field settings
        $objects = [];
        // Loop through each of the fields
        foreach ($this->fields as $_k => $fieldObj) {
            // Populate the subfields with the to array results
            $fieldObj->toObjects($index, $format, '');
        }
        // Filter the object
        $objects = apply_filters('fusion/group/to_objects', $objects, $this);
        // return the built settings
        return $objects;
    }

    public function toKeys() {
        // Retrieve the field settings
        $keys = [];
        // Loop through each of the fields
        foreach ($this->fields as $k => $field) {
            // Populate the subfields with the to array results
            $keys = array_merge($keys, $field->toKeys());
        }
        // Return the settings array
        return apply_filters('fusion/group/to_keys', $keys, $this);
    }

    public function toNames() {
        // Retrieve the field settings
        $names = [];
        // Loop through each of the fields
        foreach ($this->fields as $k => $field) {
            // Populate the subfields with the to array results
            $names = array_merge($names, $field->toNames());
        }
        // return the built settings
        return apply_filters('fusion/group/to_names', $names, $this);
    }

    public function getIndex($values) {
        // Retrieve the field settings
        $index = new \stdClass();
        // The collection to add items to
        $index->collection = [];
        // Loop through each of the fields
        foreach ($this->fields as $k => $fieldObj) {
            // Retrieve the value
            $value = isset($values[$fieldObj->getKey()]) ? $values[$fieldObj->getKey()] : false ;
            // Populate the subfields with the to array results
            $fieldObj->toIndex($index, $value);
        }
        // return the built settings
        return $index->collection;
    }

    public function toValues($values, $valueFormat='key', $outFormat='key', $prefix='') {
        // Retrieve the field settings
        $output = [];
        // If the values are coming from acf
        if ($valueFormat === 'acf') {
            // The filtered array
            $filtered = [];
            // Loop through each of the fields
            foreach ($this->fields as $k => $fieldObj) {
                // If the value does not exist for that field object
                if (!isset($values[$fieldObj->getCode()])) { continue; }
                // Set the filtered array
                $filtered[$fieldObj->getKey()] = $values[$fieldObj->getCode()];
            }
            // Replace the values array
            $values = $filtered;
        }
        // Loop through each of the fields
        foreach ($this->fields as $k => $fieldObj) {
            // Determine the keys we are going to look for
            $valueKey = ($valueFormat === 'key' || $valueFormat === 'acf') ? $fieldObj->getKey() : $fieldObj->getCode();
            // If no value has been set
            if (!isset($values[$valueKey])) { continue; }
            // Populate the subfields with the to array results
            $output = array_merge($output, $fieldObj->toValues($values[$valueKey], $valueFormat, $outFormat));
        }
        // Filter the value
        $output = apply_filters('fusion/group/to_values', $output, $this);
        // return the built settings
        return $output;
    }


}