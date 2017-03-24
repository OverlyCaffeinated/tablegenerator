<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/18/16
 * Time: 7:31 PM
 */

namespace Table\Render\Excel;


class Row
{
    private $row;

    public function __construct(Table &$table)
    {
        $this->row = $table->getTable()->addChild('ss:Row');
    }

    public function getRow() {
        return $this->row;
    }

}