<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 - Form 01 - Action</title>
</head>


<body>

<?php
$MIN_AGE = 1;
$MAX_AGE = 120;

if ($_POST)
{
	foreach ($_POST as $key => $value)
	{
		$value = trim($value);
		${$key} = $value;
	}

	// Initialise the error message to an empty string
	$errors = "";

	// *** Validate First Name
	if ($first_name == "")
	{
		$errors .= "* Please enter your first name.<br>";
	}
	else if (ctype_alpha($first_name) == false)
	{
		$errors .= "* First name can only contain letters.<br>";
	}


	// *** Validate Last Name
	if ($last_name == "")
	{
		$errors .= "* Please enter your last name.<br>";
	}
	else if (ctype_alpha($last_name) == false)
	{
		$errors .= "* Last name can only contain letters.<br>";
	}

	// *** Validate Age
	if (is_numeric($age) == FALSE)
	{
		$errors .= "* Please enter a valid age (numbers only).<br>";
	}
	else if (($age < $MIN_AGE) || ($age > $MAX_AGE))
	{
		$errors .= "* Age must be in range " . $MIN_AGE . "-" . $MAX_AGE . ".<br>";
	}




	// Inform the user about any missing details
	if ($errors != "")
	{
		echo "<p>Some of the required information has not been supplied.<br>";
		echo $errors;
		echo "Please click the browser's Back button to try again.</p>";
	}
	else
	{
		echo "<p>All inputs verified / correct.  :)</p>";
	}


}

echo "<hr>";
?>


</body>

<?php
// Include Files
include ('footer.html');
?>

</html>
