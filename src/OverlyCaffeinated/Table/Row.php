<?php

namespace OverlyCaffeinated\Table;


class Row
{

    private $contents;

    public function __construct()
    {
        $this->contents = [];
    }

    public function createCell($type = Cell::STRING, $value = null) {
        $cell = new Cell($type, $value);
        $this->contents[] = &$cell;
        return $cell;
    }

    public function getRowContents() {
        return $this->contents;
    }

}