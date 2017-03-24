<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/18/16
 * Time: 7:28 PM
 */

namespace Table\Render\Excel;


class Table
{

    private $table;

    public function __construct(Worksheet $worksheet)
    {
        $this->table = $worksheet->getWorksheet()->addChild('ss:Table');
    }

    public function getTable() {
        return $this->table;
    }
}