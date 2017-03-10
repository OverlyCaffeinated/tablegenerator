<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/15/16
 * Time: 9:24 PM
 */

namespace OverlyCaffeinated\Table\Render\Excel;


class Document
{
    private $document;
    private $styles;

    public function __construct()
    {
        $this->document = new \SimpleXMLElement('<ss:Workbook xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" />');
        $this->styles = $this->document->addChild('ss:Styles');

    }

    public function loadDefaultStyles() {
        $this->createStyle('ocaff_currency', [
            'number_format' => 'Currency'
        ]);

        $this->createStyle('ocaff_number', [
            'number_format' => 'General Number'
        ]);

        $this->createStyle('ocaff_percent', [
            'number_format' => 'Percent'
        ]);

        $this->createStyle('ocaff_header', [
            'font' => [
                'bold' => true,
                'alignment' => [
                    'horizontal' => 'Center'
                ]
            ]
        ]);

        $this->createStyle('ocaff_bold', [
            'font' => [
                'bold' => true,
                'alignment' => [
                    'horizontal' => 'Left'
                ]
            ]
        ]);

        $this->createStyle('ocaff_even', [
            'interior' => [
                'color' => '#D0D0D0',
                'pattern' => 'Solid'
            ]
        ]);

        $this->createStyle('ocaff_odd', []);
    }

    public function createStyle($id, $options) {
        return new Style($this->styles, $id, $options);
    }

    public function createWorksheet($name) {
        return new Worksheet($this, $name);
    }

    public function getDocument() {
        return $this->document;
    }

    public function asXML() {
        return $this->document->asXML();
    }

}