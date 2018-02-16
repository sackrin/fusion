<?php

namespace Fusion\Condition;

class Group {

    public $conditions = [];

    public function addCondition($field, $operator, $value) {
        // Add to the conditions
        $this->conditions[] = [
            'field' => $field,
            'operator' => $operator,
            'value' => $value,
        ];
        // Return for chaining
        return $this;
    }

    public function toArray() {
        // Return the stored conditions
        return $this->conditions;
    }

}