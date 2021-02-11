<!-- 00__Erase_All_aircond_and_load_data_from_CSV.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>

<h3>00__Erase_All_aircond_and_load_data_from_CSV</h3>

<?php
$db = new Database__MySQL();

$sql = ' SELECT * FROM aircond '
     . ' ORDER BY id DESC ';
   //. ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.


// Delete ALL data in the aircond table.
$sql = ' DELETE FROM aircond ';

$results = $db->executeSQLQuery ($sql);

// Write All aircond table data to CSV.
//echo "<div>";
//echo "<h3>Creating CSV:</h3>";
//$db->queryResultsToCSVFile ("old_data.csv");

// Load data into aircond table from CSV.
$csvName = "new_data.csv";
//$date = date('Y-m-d__H-i-s');
//$csvName = "aircond__" . $date . ".csv";

echo "<div>";
echo "<h3>Loading CSV: '" . $csvName . "'</h3>";
$db->cSVToTable ($csvName, "aircond");

echo "</div>";


$countSQL = 'SELECT COUNT(*) FROM aircond ';
$results = $db->executeSQLQuery ($countSQL);
$row = $results->fetch_array();
echo "<div class='container'>";
echo "<ul>";
echo "<li> Records in database: " . $row[0] . "</li>";

$latestRecordSQL = 'SELECT DATE_FORMAT(MAX(readingDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") FROM aircond ';
$results = $db->executeSQLQuery ($latestRecordSQL);
$row = $results->fetch_array();
echo "<li> Most recently added: " . $row[0] . "</li>";
echo "</ul>";
echo "</div>";


?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>