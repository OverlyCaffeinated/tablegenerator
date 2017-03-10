<?php

namespace OverlyCaffeinated\Table;

class Table {

    private $contents;

    public function __construct()
    {
        $this->contents = [];
    }

    public function createRow() {
        $row = new Row();
        $this->contents[] = &$row;
        return $row;
    }

    public function getTableContents() {
        return $this->contents;
    }

    public function render($class, $options=null) {
        return $class::render($this->contents, $options);
    }

}