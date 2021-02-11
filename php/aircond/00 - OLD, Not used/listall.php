<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>

<?php
$db = new Database__MySQL();

$sql = ' SELECT * FROM aircond '
     . ' ORDER BY id DESC ';
   //. ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.

$sql = ' DELETE FROM aircond ';

//$results = $db->executeSQLQuery ($sql);

echo "<div>";
echo "<h3>Creating CSV:</h3>";

//$db->queryResultsToCSVFile ("aircond__01a.csv");
$db->cSVToTable ("aircond__02.csv", "aircond");

echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>