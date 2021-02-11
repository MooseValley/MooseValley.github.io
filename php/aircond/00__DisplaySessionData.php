<?php
@ob_start();
session_start();
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!-- 00__DisplaySessionData.php -->
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

registerAndInitialiseSessionData()
?>

<?php

displaySessionData();
?>

      <button type="button" class="btn btn-primary" onclick="window.location='index.php'">
         <span class="glyphicon glyphicon-home"></span> Home
      </button>


<?php
include_once ('res/footer.php');
?>