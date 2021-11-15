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

//$sql = ' SELECT * FROM personCheckIn '
//     . ' ORDER BY id DESC ';
   //. ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.

$sql = ' DELETE FROM personCheckIn WHERE id = 141 ';

$results = $db->executeSQLQuery ($sql);

echo "<div class='container'>";
echo "<h3>Delete / Cleanup Mistakes:</h3>";
echo "* DONE !";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>