<!-- erase_and_recreate.php -->
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

$sql = "DROP TABLE IF EXISTS `personCheckIn` ";
executeQuery ($db, $sql, "personCheckIn - DROP");


$sql = "CREATE TABLE personCheckIn
(
   id                    INT(11)        NOT NULL AUTO_INCREMENT,
   personName            VARCHAR(255)   NOT NULL,
   checkinDateTime       DATETIME       NOT NULL,
   comments              VARCHAR(50000) NOT NULL,
   PRIMARY KEY (id)
)";

executeQuery ($db, $sql, "personCheckIn - CREATE");

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