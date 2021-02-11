<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');
?>


<?php
// Start/resume the current session.
session_start();

registerAndInitialiseSessionData()
?>

<?php

date_default_timezone_set("Australia/Brisbane");
//echo date_default_timezone_get();

$db = new Database__MySQL();

$countSQL = 'SELECT COUNT(*) FROM aircond ';
$results = $db->executeSQLQuery ($countSQL);
$row = $results->fetch_array();
echo "<div class='container'>";
echo "<ul>";
echo "<li> Records in database: " . $row[0] . "</li>";

$latestRecordSQL = 'SELECT DATE_FORMAT(MAX(readingDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") FROM aircond ';
$results = $db->executeSQLQuery ($latestRecordSQL);
$row = $results->fetch_array();
echo "<li> Most recently added: " . $row[0] . "</li>";
echo "</ul>";
echo "</div>";

// Remove WHERE_CLAUSE
$sql = str_replace ("WHERE_CLAUSE", "", Constants::SQL_SELECT_APARTMENTS_TOP_N);

$results = $db->executeSQLQuery ($sql);
$db->queryResultsToHTMLTable ("Most Recently Added records:", true, true, false);

?>


<div class="container">

<p><br></p>
<hr>
<h1>Show most recent records for an Apartment:</h1>

<form name="show-apartment-records-form" action="show.php" method="POST">

   <div class="form-group">
      <label for="apartmentNum">Apartment:</label>
      <select class="form-control" name="apartmentNum" id="apartmentNum">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
      </select>
   </div>

      <button type="button" class="btn btn-primary" onClick="document.forms['show-apartment-records-form'].submit();">
         <span class="glyphicon glyphicon-search"></span> Show
      </button>
   <!--
   <p>
      <input type="submit" value="Show">
   </p>
   -->
</form>

</div>


<div class="container">

<p><br></p>
<hr>
<h1>Add New Record:</h1>
<form name="add-apartment-record-form" action="add.php" method="POST">

   <div class="form-group">
      <label for="apartmentNum">Apartment:</label>
      <select class="form-control" name="apartmentNum" id="apartmentNum">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
      </select>
   </div>

   <div class="form-group">
      <label for="mainDoorOpenAmt">Main Glass Door:</label>
      <select class="form-control" name="mainDoorOpenAmt" id="mainDoorOpenAmt">
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
      </select>
   </div>

   <div class="form-group">
      <label for="kitchenWindowOpenAmt">Kitchen Window:</label>
      <select class="form-control" name="kitchenWindowOpenAmt" id="kitchenWindowOpenAmt">
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
      </select>
   </div>

   <div class="form-group">
      <label for="bathroomWindowOpenAmt">Bathroom Window:</label>
      <select class="form-control" name="bathroomWindowOpenAmt" id="bathroomWindowOpenAmt">
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
      </select>
   </div>

   <div class="form-group">
      <label for="bedroomDoorOpenAmt">Bedroom Door:</label>
      <select class="form-control" name="bedroomDoorOpenAmt" id="bedroomDoorOpenAmt">
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
      </select>
   </div>

   <div class="form-group">
      <label for="bedroomWindowOpenAmt">Bedroom Window:</label>
      <select class="form-control" name="bedroomWindowOpenAmt" id="bedroomWindowOpenAmt">
         <option value="-1">n/a</option>
         <option value="0">closed</option>
         <option value="1">slightly open</option>
         <option value="2">half open</option>
         <option value="3">fully open</option>
      </select>
   </div>

   <!--
   <div class="form-check">
      <label class="form-check-label">
         <input class="form-check-input" value="" type="checkbox" name="shutdown" id="shutdown">
         Shutdown (Airconditioner Shutdown)
      </label>
   </div>
   -->

   <div class="checkbox">
      <label>
         <input type="checkbox" name="shutdown" id="shutdown" value="shutdown">
         Shutdown Airconditioner
      </label>
   </div>

   <button type="reset" class="btn btn-primary">
      <span class="glyphicon glyphicon-erase"></span> Reset/Clear
   </button>

   <button type="button" class="btn btn-primary" onClick="document.forms['add-apartment-record-form'].submit();">
      <span class="glyphicon glyphicon-plus"></span> Add
   </button>

<!--

<a href="#" class="btn btn-info" role="button">Link Button</a>
<button type="button" class="btn btn-info">Button</button>
<input type="button" class="btn btn-info" value="Input Button">
<input type="submit" class="btn btn-info" value="Submit Button">

      <p>
         <input type="submit" value="Add">
         <input type="reset"  value="Reset/Clear">
      </p>
-->

</form>

</div>



<?php
include_once ('res/footer.php');
?>