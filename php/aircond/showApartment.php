<?php
@ob_start();
session_start();
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!-- showApartment.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>


<?php
// Start/resume the current session.
//session_start();

registerAndInitialiseSessionData()
?>

<?php
if ($_POST)
{
   foreach ($_POST as $key => $value)
   {
      $value = trim($value);
      ${$key} = $value;
   }

   $db = new Database__MySQL();

   $sql = str_replace ("WHERE_CLAUSE", " WHERE apartmentNum = " . $apartmentNum, Constants::SQL_SELECT_APARTMENTS);

   $results = $db->executeSQLQuery ($sql);

   echo "<div id='printThis'>";
   echo "<h3>All Apartment All Records:</h3>";

   $db->queryResultsToHTMLTable ("All records:", true, true, false);
   echo "</div>";

}
?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>

<button type="button" class="btn btn-primary" onClick="printContent('printThis');">
   <span class="glyphicon glyphicon-print"></span> Print
</button>


<?php
include_once ('res/footer.php');
?>