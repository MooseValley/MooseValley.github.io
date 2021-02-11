<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 07 - Form 01 - Action</title>
</head>


<body>

<?php

if ($_POST)
{
	$email          = $_POST ['email'];
	$password       = $_POST ['password'];
	$comments       = $_POST ['comments'];
	$free_gift      = $_POST ['free_gift'];
	$state          = $_POST ['state'];


	// Radio Buttons / RadioButtons
	if (isset($_POST['creditcardtype']))
	{
		$creditcardtype = $_POST ['creditcardtype'];
	}
	else
	{
		$creditcardtype = 'Not selected';
	}

	echo "<p>";
	echo "<br>Email: " . $email;
	echo "<br>Password: " . $password;
	echo "<br>Comments: " . $comments;
	echo "<br>Creit Card Type: " . $creditcardtype;
	echo "<br>Free Gift (hidden field): " . $free_gift;
	echo "</p>";

	// Checkboxes
	if (isset($_POST['locations']))
	{
		echo "<p>You have travelled to:";
		$locations_array = $_POST['locations'];

		echo "<ul>";
		foreach ($locations_array as $location)
		{
			echo "<li>$location</li>";
		}
		echo "</ul></p>";
	}
	else
	{
		echo "<p>You have not selected any travel locations.</p>";
	}

	echo "<p>Your state is: " . $state;

}

echo "<hr>";
?>


</body>

<?php
// Include Files
include ('footer.html');
?>

</html>
