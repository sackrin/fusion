<?php

namespace Fusion;

class Field {

    public $code;

    public $label;

    public $settings = [];

    public $parent;

    public $conditions = [];

    public static $defaults = [];

    public static $type = 'field';

    public static $purpose = 'data';

    public function __construct($code, $label)
    {
        // Populate with the defaults for the field
        $this->settings = static::$defaults;
        // Set the code and label
        $this->code = $code;
        $this->label = $label;
        // Update the field settings values
        $this->settings['key'] = $this->getKey();
        $this->settings['name'] = $code;
        $this->settings['_name'] = $code;
        $this->settings['label'] = $label;
    }

    public function getCode() {
        // Return the provided code
        return apply_filters('fusion/field/code', $this->code, $this);
    }

    public function getKey() {
        // If a parent object was returned
        if ($this->parent) {
            // Merge with the parent's code
            $key = static::$type.'_'.$this->parent->getCode().'_'.$this->getCode();
        } // Otherwise return the standard key
        else { $key = static::$type.'_'.$this->getCode(); }
        // Return the filtered key
        return apply_filters('fusion/field/key', $key, $this);
    }

    public function setParent($parentObj) {
        // Save the parent for future use
        $this->parent = $parentObj;
        // Regenerate the key
        $this->settings['key'] = $this->getKey();
        // Return for chaining
        return $this;
    }

    public function setOptions($options) {
        // Update the settings with the options
        $this->settings = array_merge($this->settings, $options);
        // Return for chaining
        return $this;
    }

    public function setWrapper($width="100", $class="", $id="") {
        // Set the field wrapper
        $this->settings['wrapper'] = [
            'width' => $width,
            'class' => $class,
            'id' => $id,
        ];
        // Return for chaining
        return $this;
    }

    public function setInstructions($instructions) {
        // Set the setting option value
        $this->settings['instructions'] = $instructions;
        // Return for chaining
        return $this;
    }

    public function setRequired($required) {
        // Set the setting option value
        $this->settings['required'] = $required;
        // Return for chaining
        return $this;
    }

    public function setDefault($default) {
        // Set the setting option value
        $this->settings['default_value'] = $default;
        // Return for chaining
        return $this;
    }

    public function setPlaceholder($placeholder) {
        // Set the setting option value
        $this->settings['placeholder'] = $placeholder;
        // Return for chaining
        return $this;
    }

    public function toArray() {
        // Return the settings array
        return apply_filters('fusion/field/to_array', $this->settings, $this);
    }

    public function toSettings() {
        // Return the settings array
        return apply_filters('fusion/field/to_settings', $this->settings, $this);
    }

    public function toKeys() {
        // return the built settings
        $keys = static::$purpose == 'data' ? [$this->getKey() => ''] : [];
        // Return the settings array
        return apply_filters('fusion/field/to_keys', $keys, $this);
    }

    public function toIndex($index, $values, $keyPrefix='', $namePrefix='') {
        // Filter the values
        $indexKey = $keyPrefix.$this->getKey();
        $indexCode = $namePrefix.$this->getCode();
        // Set the field in the index collection
        $index->collection[$indexKey] = $indexCode;
    }

    public function toObjects($index, $format='key', $prefix='') {
        // Determine the
        $outKey = ($format === 'key' || $format === 'acf')  ? $this->getKey() : $this->getCode();
        // Filter the object
        $object = apply_filters('fusion/field/to_objects', $this, $this);
        // Set the field in the index collection
        $index->collection[$prefix.$outKey] = $object;
    }

    public function toNames() {
        // Determine the names to return
        $names = static::$purpose == 'data' ? [$this->getCode() => ''] : [];
        // return the built settings
        return apply_filters('fusion/field/to_names', $names, $this);
    }

    public function toValues($value, $valueFormat='key', $outFormat='key', $prefix='') {
        // Determine the keys we are going to look for
        $valueKey = ($valueFormat === 'key' || $valueFormat === 'acf') ? $this->getKey() : $this->getCode();
        $outKey = ($outFormat === 'key' || $outFormat === 'acf')  ? $this->getKey() : $this->getCode();
        // Filter the value
        $value = apply_filters('fusion/field/to_values', $value, $this);
        // return the built settings
        return static::$purpose == 'data' ? [$prefix.$outKey => $value] : [];
    }

    public function addConditions($conditionGroup) {
        // Add the condition group to the list of conditions
        $this->conditions[] = $conditionGroup;
        // The conditions array
        $conditions = [];
        // Loop through each of the stored conditions
        foreach ($this->conditions as $k => $conditionObj) {
            // Populate the conditions array
            $conditions[] = $conditionObj->toArray();
        }
        // Populate the conditional logic
        $this->settings['conditional_logic'] = $conditions;
        // Return for chaining
        return $this;
    }

}