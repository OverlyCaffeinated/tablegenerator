<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/18/16
 * Time: 7:26 PM
 */

namespace Table\Render\Excel;


class Worksheet
{

    private $worksheet;

    public function __construct(Document &$document, $name)
    {
        $this->worksheet = $document->getDocument()->addChild('ss:Worksheet');
        $this->worksheet->addAttribute('xmlns:ss:Name', $name);
    }

    public function getWorksheet() {
        return $this->worksheet;
    }


    public function createTable() {
        return new Table($this);
    }
}