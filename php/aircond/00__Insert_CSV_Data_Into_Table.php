<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');

date_default_timezone_set("Australia/Brisbane");
//echo date_default_timezone_get();
?>

<?php
$db = new Database__MySQL();

echo "<div class='container'>";

echo "<h3>Loading CSV --> MySQL table:</h3>";

$fileName = "Data CSVs/aircond__2020-01-11__12-46-00.csv";
$table  = "aircond";

echo "<p>File: '<b>" . $fileName . "</b>'.";
echo "<p>Table: '<b>" . $table . "</b>'.";

// CSV file -> Table:
$db->cSVToTable ($fileName, $table);

echo "<p>" . $table . " table data loaded from: '<b>" . $fileName . "</b>'.";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>