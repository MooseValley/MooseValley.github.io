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
?>

<?php
$date              = date('D, j-M-Y, g:i:s A');
echo "<div class='container'>";
echo "<ul>";
?>

<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
	<span class="glyphicon glyphicon-home"></span> Refresh
</button>

<?php
echo " Page last refreshed: <b>" . $date . "</b>";
echo "</ul>";
echo "</div>";
?>



<!--
<p><br></p>
-->
<hr>

<div class="container">

<h2>Add Chat:</h2>
<form class="form-horizontal" name="add-checkin-record-form" action="add.php" method="POST">

   <div class="form-group">
		<!-- <label class="form-label" for="personName">Person Name:</label> -->
      <label class="control-label col-sm-2" for="personName">Person Name:</label>
		<div class="col-sm-10">
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
   </div>

	<div class="form-group">
		<!--
		<label class="form-label" for="comments">Comments:</label>
		<input type="text" class="form-control" name="comments" id="comments" value="All OK">
		-->
		<label class="control-label col-sm-2" for="comments">Comments:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="comments" id="comments" value="All OK">
			<!-- placeholder="All OK" -->
		</div>
	</div>
<!--
   <div class="form-group">
      <label for="comments">Comments:</label>
      <br>
      <input type="text" name="comments" size="150" value="All OK">
   </div>
-->

   <button type="reset" class="btn btn-primary">
      <span class="glyphicon glyphicon-erase"></span> Reset/Clear
   </button>

   <button type="button" class="btn btn-primary" onClick="document.forms['add-checkin-record-form'].submit();">
      <span class="glyphicon glyphicon-plus"></span> Add
   </button>

</form>

</div>




<?php

// Remove WHERE_CLAUSE
$sql = str_replace ("WHERE_CLAUSE", "", Constants::SQL_MOST_RECENT_CHECKINS);

$results = $db->executeSQLQuery ($sql);
echo '<p><br></p><hr>';
echo '<div class="container">';
echo '<h2>Most Recent Chats for each Person:</h2>';
$db->queryResultsToHTMLTable ("Most Recent Check-ins for each Person:", true, true, false);
echo '</div>';


// Remove WHERE_CLAUSE
$sql = str_replace ("WHERE_CLAUSE", "", Constants::SQL_SELECT_CHECKINS_TOP_N);
echo '<p><br></p><hr>';
echo '<div class="container">';
echo '<h2>Chat History (last 7 days):</h2>';
$results = $db->executeSQLQuery ($sql);
$db->queryResultsToHTMLTable ("", true, true, false);
echo '</div>';
?>

<?php
echo '<p><br></p><hr>';

$results = $db->executeSQLQuery (Constants::SQL_COUNT_RECORDS);
$row = $results->fetch_array();
echo "<div class='container'>";
echo "<ul>";
echo "<li> Records in database: " . $row[0] . "</li>";

$results = $db->executeSQLQuery (Constants::SQL_MOST_RECENT_RECORD);
$row = $results->fetch_array();
echo "<li> Most recently added: " . $row[0] . "</li>";
echo "</ul>";
echo "</div>";
//echo "<hr>";
?>

<?php
include_once ('res/footer.php');
?>