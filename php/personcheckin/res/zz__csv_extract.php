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

$sql = ' SELECT * FROM aircond '
     . ' ORDER BY id DESC ';
   //. ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.

//$sql = ' DELETE FROM aircond ';

$results = $db->executeSQLQuery ($sql);

echo "<div class='container'>";
echo "<h3>Creating CSV:</h3>";

$date = date('Y-m-d__H-i-s');
$fileName = "aircond__" . $date . ".csv";

// Table -> CSV file:
$db->queryResultsToCSVFile ($fileName);


// CSV file -> Table:
//$db->cSVToTable ("aircond__2017_12-23.csv", "aircond");

echo "<p>AirCond table data written to: '<b>" . $fileName . "</b>'.";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>