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

echo "<h3>Inserting Data into AirCond table:</h3>";


/*
Sample Data (from CSV):
apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt, bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown
9,"2020-01-11 10:14:31",-1,2,-1,-1,-1,0

From index.php:
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
*/




//------------------------------------------------------------------------
// Unit 8 - 23-Sep-2020
//------------------------------------------------------------------------
/*
$sql_deleteAC01 = "DELETE FROM aircond WHERE id>143 ";
$db->executeSQLQuery ($sql_deleteAC01);

$insertSQL = "INSERT INTO aircond "
              . "        (apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  "
              . "         bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES ('8', '2020-09-23 19:37:43', 3, 3, 2, -1, -1, 1) ";
$db->executeSQLQuery ($insertSQL);
*/


//------------------------------------------------------------------------
// Unit 9 - 25-Sep-2020
//------------------------------------------------------------------------
/*
$insertSQL = "INSERT INTO aircond "
              . "        (apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  "
              . "         bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES ('9', '2020-09-25 19:37:43', 1, 2, 1, -1, -1, 0) ";
$db->executeSQLQuery ($insertSQL);

$insertSQL = "INSERT INTO aircond "
              . "        (apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  "
              . "         bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES ('9', '2020-09-25 20:18:27', 1, 2, 1, -1, -1, 0) ";
$db->executeSQLQuery ($insertSQL);

$insertSQL = "INSERT INTO aircond "
              . "        (apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  "
              . "         bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES ('9', '2020-09-25 21:04:51', 1, 2, 1, -1, -1, 1) ";
$db->executeSQLQuery ($insertSQL);
*/






echo "<p>AirCond table data inserted successfully.";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>