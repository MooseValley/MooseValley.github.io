<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 - Form 02 - Data Entry Form</title>

<!-- CSS to control Body text foreground ad backgroud from params in the URL -->
<!-- This PHP *must* go in the HTML page header section. -->

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

</head>


<body>


<form action="Week_07_02_action.php" method="POST">
	<p>
		<label for="first_name">First Name:</label>
		<input type="text" name="first_name" id="first_name" size="30" maxlength="30" value="">
	</p>
	<p>
		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" id="last_name" size="30" maxlength="30" value="">
	</p>

	<p>
		<label for="age">Age:</label>
		<input type="text" name="age" id="age" size="5" maxlength="3" value="">
	</p>

	<p>
		<input type="submit" value="Submit/Login">
		<input type="reset"  value="Reset/Clear">
	</p>
</form>


<p><br></p>

</body>

<?php
// Include Files
include ('footer.html');
?>

</html>
