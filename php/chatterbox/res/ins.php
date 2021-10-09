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


$sql_insertAC01 = "INSERT INTO aircond VALUES (NULL, 8, '2017-12-19 19:41', 2, 0, 0, -1, -1) ";
$sql_insertAC02 = "INSERT INTO aircond VALUES (NULL, 8, '2017-12-19 20:07', 2, 0, 0, -1, -1) ";

//executeQuery ($db, $sql_insertAC01, "aircond - INSERT");
//executeQuery ($db, $sql_insertAC02, "aircond - INSERT");

$sql_deleteAC01 = "DELETE FROM aircond WHERE id IN (14, 15, 18) ";
$sql_deleteAC01 = "DELETE FROM aircond ";
//executeQuery ($db, $sql_deleteAC01, "aircond - DELETE");


$sql_alterAC01 = "ALTER TABLE `aircond` ADD COLUMN shutdown BOOLEAN NOT NULL ";
executeQuery ($db, $sql_alterAC01, "aircond - ALTER");



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