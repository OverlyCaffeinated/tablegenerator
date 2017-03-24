<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/18/16
 * Time: 7:31 PM
 */

namespace Table\Render\Excel;


class Cell
{
    private $cell;

    public function __construct(Row &$row, \Table\Cell $cell)
    {
        $this->cell = $row->getRow()->addChild('ss:Cell');

        $data = $this->cell->addChild('ss:Data', htmlentities($cell->getValue()));

        switch ($cell->getType()) {
            case \Table\Cell::NUMERIC:
                $data->addAttribute('xmlns:ss:Type', 'Number');
                break;
            case \Table\Cell::CURRENCY:
                $data->addAttribute('xmlns:ss:Type', 'Number');
                $this->cell->addAttribute('xmlns:ss:StyleID', 'ocaff_currency');
                break;
            case \Table\Cell::STRING:
                $data->addAttribute('xmlns:ss:Type', 'String');
                break;

            case \Table\Cell::HEADER:
                $data->addAttribute('xmlns:ss:Type', 'String');
                $this->cell->addAttribute('xmlns:ss:StyleID', 'ocaff_header');
                break;

            default:
                $data->addAttribute('xmlns:ss:Type', 'String');
                break;
        }
    }
}