<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 - Form 01 - Form</title>

<!-- CSS to control Body text foreground ad backgroud from params in the URL -->
<!-- This PHP *must* go in the HTML page header section. -->

<!--
<?php
echo <<<END
<style type="text/css">
label
{
	width: 120px;
	float: left;
}
</style>
END;

?>
-->

</head>


<body>


<form action="Week_07_01_action.php" method="POST">
	<p>
		<label for="email">E-mail address:</label>
		<input type="text" name="email" id="email" size="30" value="@centacare.net">
	</p>
	<p>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" size="30" maxlength="30">
	</p>

	<!-- Text Area -->
	<p>
		<textarea name="comments" id="comments" rows="6" cols="40"></textarea>
	</p>

	<!-- Radio Buttons / RadioButtons -->
	<p>Please select your credit card type:</p>
	<p>
		<input type="radio" name="creditcardtype" id="amex" value="American Express">
		<label for="amex">American Express</label>
		<br>
		<input type="radio" name="creditcardtype" id="mc" value="MasterCard">
		<label for="mc">MasterCard</label>
		<br>
		<input type="radio" name="creditcardtype" id="visa" value="Visa">
		<label for="visa">Visa</label>
	</p>

	<!-- Checkboxes -->
	<p>Places you have travelled:</p>
	<p>
		<input type="checkbox" name="locations[]" id="uk" value="uk">
		<label for="uk">UK (England, Scotland, Wales)</label>
		<br>
		<input type="checkbox" name="locations[]" id="se_asia" value="se_asia">
		<label for="se_asia">South East Asia</label>
		<br>
		<input type="checkbox" name="locations[]" id="n_america" value="n_america">
		<label for="n_america">USA / Canada</label>
	</p>


	<!-- Combobox \ Drop Down List - single selection -->
	<p>
		<label for="state">Select your state or territory.</label>
	</p>
	<select name="state" id="state">
		<option value="ACT">ACT</option>
		<option value="NSW">NSW</option>
		<option value="NT">NT</option>
		<option value="QLD" selected>QLD</option>
		<option value="SA">SA</option>
		<option value="TAS">TAS</option>
		<option value="VIC">VIC</option>
		<option value="WA">WA</option>
	</select>


	<!-- Combobox \ Drop Down List - multi selection -->
	<p>
		<label for="continents">Select the continents that you would LIKE to visit (multi-select).</label>
	</p>
	<select name="continents[]" id="continents" multiple size=7>
		<option value="Africa">Africa</option>
		<option value="Antarctica">Antarctica</option>
		<option value="Asia">Asia</option>
		<option value="Australia">Australia</option>
		<option value="Europe">Europe</option>
		<option value="North America">North America</option>
		<option value="South America">South America</option>
	</select>


	<!-- Combobox \ Drop Down List - multi selection -->
	<p>
		<label for="continents">Select the CONTINENT that you would LIKE to visit (single select).</label>
	</p>
	<select name="continent[]" id="continent" size=7>
		<option value="Africa">Africa</option>
		<option value="Antarctica">Antarctica</option>
		<option value="Asia">Asia</option>
		<option value="Australia">Australia</option>
		<option value="Europe">Europe</option>
		<option value="North America">North America</option>
		<option value="South America">South America</option>
	</select>

	<!-- HIDDEN -->
	<input type="hidden" name="free_gift" id="free_gift" value="T-Shirt">

	<p>
		<input type="submit" value="Submit/Login">
		<input type="reset"  value="Reset/Clear">
	</p>
</form>

<p><br></p>
<hr>

<form action="uploading.php" method="POST" enctype="multipart/form-data">
	<label for="data_file">File upload:</label>
	<input type="file" name="data_file" id="data_file" maxlength="40" size="20">
</form>

<p><br></p>

</body>

<?php
// Include Files
include ('footer.html');
?>

</html>
