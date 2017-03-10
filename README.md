# Table Generator

This package will allow you to create a table once and export it in multiple 
formats. Right now this supports rendering Excel XML files as well as 
Bootstrap version 3 tables (in theory it will support version 4, but that is
not tested as of this writing)

## Quick Tutorial
In order to create your table, look at the following example:

```
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
```

This will store your table data, now you can render the table using the
following code:

```
// Renders Bootstrap v3
$rendered = $table->render(TwitterBootstrapV3::class, ['table-bordered' => true]);

// Renders Excel XML spreadheet
$rendered = $table->render(ExcelXML::class);
```

$rendered is just a string value so you can either output it anyway you want 
to or store it in a file