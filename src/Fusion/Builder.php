<?php

namespace Fusion;

use Underscore\Types\Arrays;

class Builder {

    public $fieldGroups = [];

    public function addFieldGroup($fieldGroupObj) {
        // Add to the fields collection
        $this->fieldGroups[] = $fieldGroupObj;
        // Return for chaining
        return $this;
    }

    public function getFieldGroup($path) {
        // Retrieve the fieldgroups
        return Arrays::get($this->fieldGroups, $path);
    }

    public function getFieldGroups() {
        // Retrieve the fieldgroups
        return $this->fieldGroups;
    }

    public function getFieldObject($path, $format='names') {
        // Convert the subfields to an array
        $fields = $this->toObjects($format);
        // Retrieve the field object
        $fieldObj = Arrays::get($fields, $path);
        // Return the field object
        return $fieldObj;
    }

    public function register() {
        // Loop through each of the field groups
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate with the populated field group
            acf_add_local_field_group($fieldGroupObj->toSettings());
        }
    }

    public function toObjects($format='key') {
        // Retrieve the field settings
        $index = new \stdClass();
        // The collection to add items to
        $index->collection = [];
        // Loop through each of the fields
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate the subfields with the to array results
            $fieldGroupObj->toObjects($index, $format);
        }
        // Filter the object
        apply_filters('fusion/builder/to_objects', $index, $this);
        // return the built settings
        return $index->collection;
    }

    public function toArray($format='key') {
        // The array to populate with filtered objects
        $fieldGroups = [];
        // Loop through each of the field groups
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate with the populated field group
            $fieldGroups[$fieldGroupObj->getCode()] = $fieldGroupObj->toArray($format);
        }
        // Return the settings array
        return apply_filters('fusion/builder/to_array', $fieldGroups, $this);
    }

    public function toSettings() {
        // The array to populate with filtered objects
        $fieldGroups = [];
        // Loop through each of the field groups
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate with the populated field group
            $fieldGroups[$fieldGroupObj->getCode()] = $fieldGroupObj->toSettings();
        }
        // Return the settings array
        return apply_filters('fusion/builder/to_settings', $fieldGroups, $this);
    }

    public function toKeys() {
        // The array to populate with filtered objects
        $fieldGroups = [];
        // Loop through each of the field groups
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate with the populated field group
            $fieldGroups = array_merge($fieldGroups, $fieldGroupObj->toKeys());
        }
        // Return the settings array
        return apply_filters('fusion/builder/to_keys', $fieldGroups, $this);
    }

    public function toNames() {
        // The array to populate with filtered objects
        $fieldGroups = [];
        // Loop through each of the field groups
        foreach ($this->fieldGroups as $k => $fieldGroupObj) {
            // Populate with the populated field group
            $fieldGroups = array_merge($fieldGroups, $fieldGroupObj->toNames());
        }
        // return the built settings
        return apply_filters('fusion/builder/to_names', $fieldGroups, $this);
    }

}