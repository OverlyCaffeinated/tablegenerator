<?php

namespace Table;


class Cell
{

    const NUMERIC = 1;
    const STRING = 2;
    const CURRENCY = 3;
    const HEADER = 4;

    private $type;
    private $value;

    public function __construct($type = Cell::STRING, $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getType() {
        return $this->type;
    }

    public function getValue() {
        return $this->value;
    }

}