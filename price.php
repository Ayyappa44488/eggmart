<?php
$url = "https://www.commodityonline.com/egg-rate/andhra-pradesh";
$html = file_get_contents($url);
$dom = new DOMDocument();
@$dom->loadHTML($html);
$tableId = "main-table2";
$table = $dom->getElementById($tableId);
$tableRows = $table->getElementsByTagName('tr');
$row = $tableRows[2];
$tableCells = $row->getElementsByTagName('td');
$columnData = $tableCells[2]->textContent;
if (!empty($columnData)) {
    session_start();
    $price=substr($columnData, 4,4);
    $price = (float) $price;
    $_SESSION['price']=$price;
    header("Location:project.php");
}
?>