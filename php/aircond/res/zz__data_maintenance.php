<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>


<?php

function executeQuery ($db, $sql, $displayDetails)
{
   if ($db->query($sql) === TRUE)
   {
       echo "<li>" . $displayDetails . " completed.</li>";
   }
   else
   {
       echo "<li>Error: " . $displayDetails . ": " . $conn->error . "</li>";
   }
}


$db  = new mysqli (Constants::SERVER_NAME,
                   Constants::USER_NAME,
                   Constants::USER_PASSWORD,
                   Constants::DATABASE_NAME);

if($db->connect_error)
{
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

echo "<h4>Updating Database:</h4>";
echo "<ol>";




//****************************************
// Sat, 23-Dec-2017
//****************************************
/*
// Add Shutdowns:
$sql_updateAC01 = "UPDATE aircond SET shutdown=1 WHERE id=22 ";
$sql_updateAC02 = "UPDATE aircond SET shutdown=1 WHERE id=17 ";
$sql_updateAC03 = "UPDATE aircond SET shutdown=1 WHERE id=12 ";
$sql_updateAC04 = "UPDATE aircond SET shutdown=1 WHERE id=8 ";
$sql_updateAC05 = "UPDATE aircond SET shutdown=1 WHERE id=5 ";


// Fix errors:
$sql_updateAC50 = "UPDATE aircond SET shutdown=0 WHERE id=11 ";


// Remove test data:
$sql_deleteAC01 = "DELETE FROM aircond WHERE id=19 ";

executeQuery ($db, $sql_updateAC01, "aircond - UPDATE");
executeQuery ($db, $sql_updateAC02, "aircond - UPDATE");
executeQuery ($db, $sql_updateAC03, "aircond - UPDATE");
executeQuery ($db, $sql_updateAC04, "aircond - UPDATE");
executeQuery ($db, $sql_updateAC05, "aircond - UPDATE");

executeQuery ($db, $sql_updateAC50, "aircond - UPDATE");

executeQuery ($db, $sql_deleteAC01, "aircond - DELETE");
*/



//****************************************
// Sun, 24-Dec-2017
//****************************************

// Remove test data for Apartment #0:
$sql_deleteAC_20171224_01 = "DELETE FROM aircond WHERE apartmentNum = 0 ";
executeQuery ($db, $sql_deleteAC_20171224_01, "aircond - DELETE");

$sql_updateAC_20171224_01 = "UPDATE aircond SET apartmentNum=6 WHERE id = 25 ";
executeQuery ($db, $sql_updateAC_20171224_01, "aircond - UPDATE");

$sql_updateAC_20171224_02 = "UPDATE aircond SET shutdown=1 WHERE id IN (26,38) ";
executeQuery ($db, $sql_updateAC_20171224_02, "aircond - UPDATE");


echo "</ol>";
echo "<h4>Database Operations Completed !</h4>";

$db->close();

?>

<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>