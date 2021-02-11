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

echo "<h4>Creating Database:</h4>";
echo "<ol>";

$sql = "DROP TABLE IF EXISTS `windowstatus` ";
executeQuery ($db, $sql, "windowstatus - DROP");

$sql = "DROP TABLE IF EXISTS `aircond` ";
executeQuery ($db, $sql, "aircond - DROP");

$sql = "CREATE TABLE windowstatus
(
   id                    INT(11) NOT NULL AUTO_INCREMENT,
   amt                   INT(2)  NOT NULL,
   description           VARCHAR(255) NOT NULL,

   PRIMARY KEY (id)
)";

executeQuery ($db, $sql, "windowstatus - CREATE");


$sql = "CREATE TABLE aircond
(
   id                    INT(11) NOT NULL AUTO_INCREMENT,
   apartmentNum          INT(2),
   readingDateTime       DATETIME NOT NULL,
   mainDoorOpenAmt       INT(1) NOT NULL,
   kitchenWindowOpenAmt  INT(1) NOT NULL,
   bathroomWindowOpenAmt INT(1) NOT NULL,
   bedroomDoorOpenAmt    INT(1) NOT NULL,
   bedroomWindowOpenAmt  INT(1) NOT NULL,
   shutdown              BOOLEAN NOT NULL,
   PRIMARY KEY (id)
)";

executeQuery ($db, $sql, "aircond - CREATE");


$sql_insert01 = "INSERT INTO `windowstatus` VALUES (NULL, -1,   'n/a') ";
$sql_insert02 = "INSERT INTO `windowstatus` VALUES (NULL, 0,    'closed') ";
$sql_insert03 = "INSERT INTO `windowstatus` VALUES (NULL, 1,    'slightly open') ";
$sql_insert04 = "INSERT INTO `windowstatus` VALUES (NULL, 2,    'half open') ";
$sql_insert05 = "INSERT INTO `windowstatus` VALUES (NULL, 3,    'fully open') ";

executeQuery ($db, $sql_insert01, "windowstatus - INSERT");
executeQuery ($db, $sql_insert02, "windowstatus - INSERT");
executeQuery ($db, $sql_insert03, "windowstatus - INSERT");
executeQuery ($db, $sql_insert04, "windowstatus - INSERT");
executeQuery ($db, $sql_insert05, "windowstatus - INSERT");


$sql_insertAC01 = "INSERT INTO aircond VALUES (NULL, 9, '2017-12-17 10:30', 2, 2, 3, -1, -1, false) ";
$sql_insertAC02 = "INSERT INTO aircond VALUES (NULL, 9, '2017-12-17 11:55', 2, 2, 3, -1, -1, true) ";
$sql_insertAC03 = "INSERT INTO aircond VALUES (NULL, 9, '2017-12-18 01:30', 2, 2, 3, -1, -1, false) ";
$sql_insertAC04 = "INSERT INTO aircond VALUES (NULL, 9, '2017-12-18 02:30', 2, 2, 3, -1, -1, false) ";
$sql_insertAC05 = "INSERT INTO aircond VALUES (NULL, 9, '2017-12-18 03:35', 2, 2, 3, -1, -1, true) ";
$sql_insertAC06 = "INSERT INTO aircond VALUES (NULL, 8, '2017-12-18 15:35', 0, 2, 0, -1, -1, false) ";
$sql_insertAC07 = "INSERT INTO aircond VALUES (NULL, 8, '2017-12-18 16:35', 0, 2, 0, -1, -1, false) ";
$sql_insertAC08 = "INSERT INTO aircond VALUES (NULL, 8, '2017-12-18 17:10', 0, 2, 0, -1, -1, true) ";

executeQuery ($db, $sql_insertAC01, "aircond - INSERT");
executeQuery ($db, $sql_insertAC02, "aircond - INSERT");
executeQuery ($db, $sql_insertAC03, "aircond - INSERT");
executeQuery ($db, $sql_insertAC04, "aircond - INSERT");
executeQuery ($db, $sql_insertAC05, "aircond - INSERT");
executeQuery ($db, $sql_insertAC06, "aircond - INSERT");
executeQuery ($db, $sql_insertAC07, "aircond - INSERT");
executeQuery ($db, $sql_insertAC08, "aircond - INSERT");

echo "</ol>";
echo "<h4>Database Setup Completed !</h4>";

$db->close();

?>

<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>