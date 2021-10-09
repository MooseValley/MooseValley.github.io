<?php
@ob_start();
session_start();
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();


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

   $insertSQL = "INSERT INTO personCheckIn "
              . "        (personName,  checkinDateTime, comments) "
              . " VALUES (?, ?, ?) ";

   $checkinDateTime = date('Y-m-d H:i:s'); // Current Date/time

   $statement = $db->prepare ($insertSQL);

   //$statement->bind_param("isiiiiii", $apartmentNum, $readingDateTime, $mainDoorOpenAmt, $kitchenWindowOpenAmt,
   //                       $bathroomWindowOpenAmt, $bedroomDoorOpenAmt, $bedroomWindowOpenAmt, $shutdownInteger);

   $statement->bind_param("sss", $personName, $checkinDateTime, $comments);

   $statement->execute();

   $statement->close();
   $db->close();

	/*
	echo "<p>Check-in added for: </p>";
	echo "<p><ul>";
	echo "<li> Person: "    . $personName      . "</li>";
	echo "<li> Date/Time: " . $checkinDateTime . "</li>";
	echo "<li> Comment: "   . $comments        . "</li>";
	echo "</ul></p>";
	*/

	echo "<p><table><ul>";
	echo "<tr><td> Person: </td><td>"    . $personName      . "</td>";
	echo "<tr><td> Date/Time: </td><td>" . $checkinDateTime . "</td>";
	echo "<tr><td> Comment: </td><td>"   . $comments        . "</td>";
	echo "</ul></table></p>";


	// Redirect to index.php
	// NONE of the methods work so far - typical Stack Overflow, PHP, etc.
	// REF: https://stackoverflow.com/questions/33080226/how-to-open-a-url-using-php

	//redirect("index.php");
	//echo "<a href='index.php'>index.php</a>";

	//function open_window($url){
	//   echo '<script>window.open ("'.$url.'", "mywindow","status=0,toolbar=0")</script>;
	//}';
	//
	//open_window('index.php');

	//$page = fopen('index.php');
	//or $page = file_get_contents('http://www.example.com/filename.html');
	//echo $page;

}
?>

      <button type="button" class="btn btn-primary" onclick="window.location='index.php'">
         <span class="glyphicon glyphicon-home"></span> Home
      </button>


<?php
include_once ('res/footer.php');
?>