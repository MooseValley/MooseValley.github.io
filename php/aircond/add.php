<?php
@ob_start();
session_start();
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();


// It took me a LOT of messing around to fix the shutdownFlag / $shutdownFlag issues below.
// Still not 100% sure what was wrong ...  if the checkbox was not checked, it was undefined
// even when I tried to see if it was set and redefine it.
// Maybe need $signs in more places - when defined, etc ???

?>
<!-- add.php -->
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
//session_start();

//registerAndInitialiseSessionData()
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

	//if (isset($_SESSION['shutdownFlag']) === false)
	//{
	//	$_SESSION['shutdownFlag'] = 'no';
	//}
	//echo "<p>shutdownFlag: " . $shutdownFlag . "<p>";

	//displaySessionData();


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
              . "        (apartmentNum,  readingDateTime,  mainDoorOpenAmt,  kitchenWindowOpenAmt,  "
              . "         bathroomWindowOpenAmt,  bedroomDoorOpenAmt, bedroomWindowOpenAmt, shutdown) "
              . " VALUES (?, ?, ?, ?, ?, ?, ?, ?) ";

   $readingDateTime = date('Y-m-d H:i:s'); //

   $statement = $db->prepare ($insertSQL);
   //if ($shutdownFlag === "shutdown")
   $shutdownInteger = 0; // false
   //if ($_SESSION['shutdownFlag'] === "shutdown")
   //if (isset($_SESSION['shutdownFlag']) === true)
   if (isset($shutdownFlag) === true)
   {
      // ERROR: Notice: Undefined variable: shutdownFlag in /storage/ssd2/494/2258494/public_html/php/aircond/add.php on line 83
      //if ($_SESSION['shutdownFlag'] === "shutdown")
      if ($shutdownFlag === "shutdown")
      {
         $shutdownInteger = 1; // true
      }
   }

   $statement->bind_param("isiiiiii", $apartmentNum, $readingDateTime, $mainDoorOpenAmt, $kitchenWindowOpenAmt,
                          $bathroomWindowOpenAmt, $bedroomDoorOpenAmt, $bedroomWindowOpenAmt, $shutdownInteger);

   $statement->execute();

   $statement->close();
   $db->close();

   echo "<p><b>SUCCESS:</b> Record added for apartment: " . $apartmentNum . "</p>";
   //echo "<p>Shutdown 1: " . $shutdownFlag . "</p>";
   //echo "<p>Shutdown 2: " . $_SESSION['shutdownFlag'] . "</p>";
   //echo "<p>shutdownInteger: " . $shutdownInteger . "</p>";

   if ($shutdownInteger === 0)
   {
      echo "<p>Shutdown: " . "<b>NO</b>" . "</p>";
   }
   else
   {
      echo "<p>Shutdown: " . "<b>YES</b>" . "</p>";
   }

}
?>

      <button type="button" class="btn btn-primary" onclick="window.location='index.php'">
         <span class="glyphicon glyphicon-home"></span> Home
      </button>


<?php
include_once ('res/footer.php');
?>