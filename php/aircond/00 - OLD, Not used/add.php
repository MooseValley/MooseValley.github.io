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
// Start/resume the current session.
session_start();

registerAndInitialiseSessionData()
?>

<?php

if ($_POST)
{
   //$db = new Database__MySQL();

   foreach ($_POST as $key => $value)
   {
      $value = trim($value);
      ${$key} = $value;
   }
   echo "<p>Shutdown: " . $shutdown . "<p>";


   $db  = new mysqli (Constants::SERVER_NAME,
                      Constants::USER_NAME,
                      Constants::USER_PASSWORD,
                      Constants::DATABASE_NAME);

   if($db->connect_error)
   {
       die('Connect Error (' . $mysqli->connect_errno . ') '
           . $mysqli->connect_error);
   }



   //$insertSQL = "INSERT INTO aircond "
   //           . "        ( apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  bathroomWindowOpenAmt,  bedroomDoorOpenAmt,  bedroomWindowOpenAmt) "
   //           . " VALUES (:apartmentNum, :readingDateTime, :mainDoorOpenAmt, :kitchenWindowOpenAmt, :bathroomWindowOpenAmt, :bedroomDoorOpenAmt, :bedroomWindowOpenAmt) ";

   //$insertSQL->bindParam(':apartmentNum',          $apartmentNum);
   //$insertSQL->bindParam(':readingDateTime',       date());
   //$insertSQL->bindParam(':mainDoorOpenAmt',       $mainDoorOpenAmt);
   //$insertSQL->bindParam(':kitchenWindowOpenAmt',  $kitchenWindowOpenAmt);
   //$insertSQL->bindParam(':bathroomWindowOpenAmt', $bathroomWindowOpenAmt);
   //$insertSQL->bindParam(':bedroomDoorOpenAmt',    $bedroomDoorOpenAmt);

   $insertSQL = "INSERT INTO aircond "
              . "        (          apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES (          ?, ?, ?, ?, ?, ?, ?, ?) ";

   $readingDateTime = date('Y-m-d H:i:s'); //

   $statement = $db->prepare ($insertSQL);
   if ($shutdown === "shutdown")
   {
      $shutdownFlag = 1; // true
   }
   else
   {
      $shutdownFlag = 0; // false
   }

   $statement->bind_param("isiiiiii", $apartmentNum, $readingDateTime, $mainDoorOpenAmt, $kitchenWindowOpenAmt, $bathroomWindowOpenAmt, $bedroomDoorOpenAmt, $bedroomWindowOpenAmt, $shutdownFlag);

   $statement->execute();

   $statement->close();
   $db->close();

   echo "<p><b>SUCCESS:</b> Record added for apartment: " . $apartmentNum . "</p>";
   echo "<p>Shutdown: " . $shutdownFlag . "<p>";


}
?>

      <button type="button" class="btn btn-primary" onclick="window.location='index.php'">
         <span class="glyphicon glyphicon-home"></span> Home
      </button>


<?php
include_once ('res/footer.php');
?>