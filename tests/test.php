<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use OverlyCaffeinated\Table\Cell;
use OverlyCaffeinated\Table\Render\ExcelXML;
use OverlyCaffeinated\Table\Table;
use OverlyCaffeinated\Table\Render\TwitterBootstrapV3;

$table = new Table();

$row = $table->createRow();

$row->createCell(Cell::HEADER, "Manufacturer");
$row->createCell(Cell::HEADER, "Sales");

$row = $table->createRow();
$row->createCell(Cell::STRING, "Carhartt");
$row->createCell(Cell::CURRENCY, 13500);

for($i=1; $i<=5; $i++) {
    $row = $table->createRow();
    $row->createCell(Cell::STRING, "Manufacturer " . $i);
    $row->createCell(Cell::CURRENCY, rand(1, 2500));
}

$rendered = $table->render(TwitterBootstrapV3::class, ['table-bordered' => true]);
//echo $rendered;

$rendered = $table->render(ExcelXML::class);
echo $rendered;

