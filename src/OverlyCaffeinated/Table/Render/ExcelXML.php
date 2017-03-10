<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/15/16
 * Time: 9:20 PM
 */

namespace OverlyCaffeinated\Table\Render;


use OverlyCaffeinated\Table\Cell;
use OverlyCaffeinated\Table\Render\Excel\Document;
use OverlyCaffeinated\Table\Render\Excel\Row;

class ExcelXML implements Renderer
{

    public static function render($table, $options)
    {
        $excel_document = new Document();
        $excel_document->loadDefaultStyles();
        $excel_worksheet = $excel_document->createWorksheet('Name');
        $excel_table = $excel_worksheet->createTable();

        foreach($table as $row) {
            $excel_row = new Row($excel_table);

            foreach($row->getRowContents() as $cell) {
                new \OverlyCaffeinated\Table\Render\Excel\Cell($excel_row, $cell);
            }
        }

        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($excel_document->asXML());
        $dom->formatOutput = TRUE;
        return $dom->saveXml();
    }
}