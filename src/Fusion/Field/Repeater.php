<?php

namespace Fusion\Field;

use Fusion\Field;

class Repeater extends Field {

    public static $defaults = [
        'key' => '',
        'name' => '',
        'type' => 'repeater',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => '',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'block',
        'button_label' => 'Add Item',
        'sub_fields' => []
    ];

    public static $type = 'field';

    public $subFields = [];

    public function setCollapsed($value) {
        // Set the setting option value
        $this->settings['collapsed'] = (string)$value;
        // Return for chaining
        return $this;
    }

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

    public function setLayout($value) {
        // Set the setting option value
        $this->settings['layout'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function setButtonLabel($value) {
        // Set the setting option value
        $this->settings['button_label'] = (string)$value;
        // Return for chaining
        return $this;
    }

    public function addField($fieldObj) {
        // Set the parent for future use
        $fieldObj->setParent($this);
        // Add to the fields collection
        $this->subFields[] = $fieldObj;
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
        // Loop through each of the sub fields
        foreach ($this->subFields as $k => $field) {
            // Populate the subfields with the to array results
            $settings['sub_fields'][$outPrefix] = $field->toArray($format);
        }
        // Return the settings array
        return apply_filters('fusion/field/to_array', $settings, $this);
    }

    public function toSettings() {
        // Retrieve the field settings
        $settings = $this->settings;
        // Loop through each of the sub fields
        foreach ($this->subFields as $k => $field) {
            // Populate the subfields with the to array results
            $settings['sub_fields'][] = $field->toSettings();
        }
        // Return the settings array
        return apply_filters('fusion/field/to_settings', $settings, $this);
    }

    public function toKeys() {
        // Retrieve the field settings
        $keys = [];
        // Loop through each of the fields
        foreach ($this->subFields as $k => $field) {
            // Populate the subfields with the to array results
            $keys = array_merge($keys, $field->toKeys());
        }
        // Return the settings array
        return apply_filters('fusion/field/to_keys', [$this->getKey() => $keys], $this);
    }

    public function toObjects($index, $format='key', $prefix='') {
        // Retrieve the field settings
        $objects = [];
        // Retrieve the out key
        $outPrefix = ($format === 'key')  ? $prefix.$this->getKey() : $prefix.$this->getCode();
        // Set the field in the index collection
        $index->collection[$outPrefix] = $this;
        // Loop through each of the fields
        foreach ($this->subFields as $_k => $fieldObj) {
            // Populate the subfields with the to array results
            $fieldObj->toObjects($index, $format, $outPrefix.'.');
        }
        // Filter the object
        return apply_filters('fusion/field/to_objects', $objects, $this);
    }

    public function toIndex($index, $values, $keyPrefix='', $namePrefix='') {
        // Set the field in the index collection
        $index->collection[$keyPrefix.$this->getKey()] = $namePrefix.$this->getCode();
        // If no values were passed then just return out
        if (!is_array($values)) { return false; }
        // Loop through the values
        foreach ($values as $k => $value) {
            // Create the new key prefix
            $repeaterKeyPrefix = $keyPrefix.$this->getKey().'.'.$k.'.';
            $repeaterNamePrefix = $namePrefix.$this->getCode().'.'.$k.'.';
            // Loop through each of the fields
            foreach ($this->subFields as $_k => $fieldObj) {
                // Retrieve the value
                $_value = isset($value[$fieldObj->getKey()]) ? $value[$fieldObj->getKey()] : false ;
                // Populate the subfields with the to array results
                $fieldObj->toIndex($index, $_value, $repeaterKeyPrefix, $repeaterNamePrefix);
            }
        }
    }

    public function toNames() {
        // Retrieve the field settings
        $names = [];
        // Loop through each of the fields
        foreach ($this->subFields as $k => $field) {
            // Populate the subfields with the to array results
            $names = array_merge($names, $field->toNames());
        }
        // return the built settings
        $names = [$this->getCode() => $names];
        // return the built settings
        return apply_filters('fusion/field/to_names', $names, $this);
    }

    public function toValues($values, $valueFormat='key', $outFormat='key', $prefix='') {
        // Retrieve the field settings
        $output = [];
        // If no values were passed then just return out
        if (!is_array($values)) { return []; }
        // Determine the keys we are going to look for
        $valueKey = ($valueFormat === 'key' || $valueFormat === 'acf') ? $this->getKey() : $this->getCode();
        $outKey = ($outFormat === 'key' || $outFormat === 'acf') ? $this->getKey() : $this->getCode();
        // Loop through the values
        foreach ($values as $k => $fieldValue) {

            $fieldOutput = [];
            // Loop through each of the fields
            foreach ($this->subFields as $_k => $fieldObj) {
                // Determine the keys we are going to look for
                $fieldValueKey = ($valueFormat === 'key' || $valueFormat === 'acf') ? $fieldObj->getKey() : $fieldObj->getCode();
                $fieldOutKey = ($outFormat === 'key' || $outFormat === 'acf') ? $fieldObj->getKey() : $fieldObj->getCode();
                // If the field value has this subfield value
                if (!isset($fieldValue[$fieldValueKey])) { continue; }
                // Populate the subfields with the to array results
                $fieldOutput = array_merge($fieldOutput, $fieldObj->toValues($fieldValue[$fieldValueKey], $valueFormat, $outFormat));
            }
            // Add to the output
            $output[] = $fieldOutput;
        }
        // Filter the value
        return apply_filters('fusion/field/to_values', [$outKey => $output], $this);
    }

}