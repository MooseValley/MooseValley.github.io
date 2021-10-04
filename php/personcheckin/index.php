<?php
@ob_start();
session_start();
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>

<?php
// Start/resume the current session.
//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
//session_start();

registerAndInitialiseSessionData()
?>

<?php

date_default_timezone_set("Australia/Brisbane");
//echo date_default_timezone_get();

$db = new Database__MySQL();

$countSQL = 'SELECT COUNT(*) FROM personCheckIn ';
$results = $db->executeSQLQuery ($countSQL);
$row = $results->fetch_array();
echo "<div class='container'>";
echo "<ul>";
echo "<li> Records in database: " . $row[0] . "</li>";

$latestRecordSQL = 'SELECT DATE_FORMAT(MAX(checkinDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") FROM personCheckIn ';
$results = $db->executeSQLQuery ($latestRecordSQL);
$row = $results->fetch_array();
echo "<li> Most recently added: " . $row[0] . "</li>";
echo "</ul>";
echo "</div>";
//echo "<hr>";
?>


<!--
<p><br></p>
-->
<hr>

<div class="container">

<h2>Add New Record:</h2>
<form name="add-apartment-record-form" action="add.php" method="POST">

   <div class="form-group">
      <label for="personName">Person Name:</label>
      <select class="form-control" name="personName" id="personName">
         <option value="Margaret">Margaret</option>
         <option value="Francis">Francis</option>
         <option value="Henry">Henry</option>
         <option value="Mary">Mary</option>
         <option value="Mike">Mike</option>
         <option value="Murray">Murray</option>
         <option value="Peter">Peter</option>
         <option value="Scott">Scott</option>
         <option value="Other">Other</option>
      </select>
   </div>

   <div class="form-group">
      <label for="comments">Comments:</label>
      <br>
      <input type="text" name="comments" size="150" value="All OK">
      <!-- placeholder = default value -->
   </div>

   <button type="reset" class="btn btn-primary">
      <span class="glyphicon glyphicon-erase"></span> Reset/Clear
   </button>

   <button type="button" class="btn btn-primary" onClick="document.forms['add-apartment-record-form'].submit();">
      <span class="glyphicon glyphicon-plus"></span> Add
   </button>

</form>

</div>




<?php

// Remove WHERE_CLAUSE
$sql = str_replace ("WHERE_CLAUSE", "", Constants::SQL_MOST_RECENT_CHECKINS);

$results = $db->executeSQLQuery ($sql);
echo '<p><br></p><hr>';
$db->queryResultsToHTMLTable ("Most Recently Person Check-ins:", true, true, false);



// Remove WHERE_CLAUSE
$sql = str_replace ("WHERE_CLAUSE", "", Constants::SQL_SELECT_CHECKINS_TOP_N);
echo '<p><br></p><hr>';
$results = $db->executeSQLQuery ($sql);
$db->queryResultsToHTMLTable ("Most Recently Added Person Check-ins:", true, true, false);

?>



<?php
include_once ('res/footer.php');
?>