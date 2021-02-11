<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 04</title>
</head>
<body>
<?php

echo "<hr>";
echo "<h1>Week 04</h1>";

echo "<hr>";
echo "<h2>IF Tests:</h2>";

$version = phpversion();

echo "<p>We are using PHP version ";
echo $version;
echo "</p>";

echo "<p>year as an int: ";
$year = 2017;
echo $year;
echo "</p>";

echo "<p>year is now a float: ";
$year = 5.4;
echo $year;
echo "</p>";

if (($year >= 5.0) && ($year <= 6.0))
{
	echo "<p>year is in range 5-6</p>";
}
else
{
	echo "<p>year is NOT in range 5-6</p>";
}

echo "<p>year is now a string: ";
$year = "Fish Face !!!";
echo $year;
echo "</p>";

echo "<p>year is now a boolean: ";
$year = true;
echo $year;
echo "</p>";

if ($year == 1)
	echo "<p>true</p>";
else
	echo "<p>false</p>";


//***********************************

echo "<hr>";
echo "<h2>Handling Quotes:</h2>";

echo 'Why is "abbreviation" such a long word?';

echo "<br>";
echo "Why is 'abbreviation' such a long word?";

echo "<br>";
echo "Why is \"abbreviation\" such a long word?";

echo "<br>Escape Sequences:";
echo "<br>Need double quoted strings !!";
echo "<br>*** ERROR: these are not working ????";
echo "\r\nDollar sign: \$ \\n \t tab \n new line";

echo "<br>";


//***********************************
echo "<hr>";
echo "<h2>PHP Heredoc:</h2>";

	$wife_name = 'Jane';
	echo <<<END
	<p>Last night, my wife $wife_name and I were sitting in the
	living room and I said to her, "I never want to live in a
	vegetative state, dependent on some machine and fluids from a
	bottle. If that ever happens, just pull the plug".</p>
	<p>So she got up, unplugged the TV, and threw out my beer.</p>
END;



//***********************************
echo "<hr>";
echo "<h2>More Variables:</h2>";

// Store the customer's name, address and phone number
// in variables
$first_name = 'Homer';
$last_name = 'Simpson';
$street = '742 Evergreen Terrace';
$suburb = 'Springfield';
$phone = '555 6528';

// The \n's affect the HTML generated by the PHP code.
// They have NO effect on what the user sees - just the HTML code.

// Display the customer's name, address and phone number

/*
The below code (with \n's) produces this HTML:
<p>Leonardo<br>
Donatello<br>
Raphael<br>
Michelangelo</p>
*/
echo "<p>The customer's name is $first_name $last_name<br>\n";
echo "The customer's address is $street, $suburb<br>\n";
echo "The customer's phone number is $phone</p>\n";

// VS
echo "<p>The customer's name is " . $first_name . " " . $last_name . "<br>\n";


/*
The below code (without \n's) produces this HTML:
<p>Leonardo<br>Donatello<br>Raphael<br>Michelangelo</p>
*/
echo "<p>The customer's name is $first_name $last_name<br>";
echo "The customer's address is $street, $suburb<br>";
echo "The customer's phone number is $phone</p>";


//***********************************
echo "<hr>";
echo "<h2>Maths / Calculations:</h2>";

$subtotal = 85;   // Excludes GST.
$subtotal++;
$subtotal = $subtotal + 4;

$gst = $subtotal * 0.10;
$total = $subtotal + $gst;

echo "Total (excl GST): \$ $subtotal";
echo "<br>+GST: \$ $gst";
echo "<br>------------------";
echo "<br>Total: \$ $total";
echo "<br>------------------";



//***********************************
echo "<hr>";
echo "<h2>String Concatenation: (Hint: use '.')</h2>";

$firstname = "Mike";
$lastname = "O'Malley";

// . = concatenate.
$fullname1 = $firstname . " " . $lastname;

$fullname2 = "$firstname $lastname";

$fullname3 = $firstname;
$fullname3 .= " ";
$fullname3 .= $lastname;

echo "$fullname1";
echo "<br>$fullname2";
echo "<br>$fullname3";


//***********************************
echo "<hr>";
echo "<h2>Arrays and Associative Arrays - Part 1:</h2>";

$colours = array('black', 'white', 'red', 'green', 'blue');

// Add an item to the array
$colours[] = 'orange';


// Associative Arrays:

$customer['first_name'] = 'Otto';
$customer['last_name'] = 'Mann';
$customer['age'] = 44;
$customer['phone'] = '5559 4237';


$album = array('title' => '21', 'artist' => 'Adele', 'label'
=> 'XL Recordings');
echo "<p>Title Id: " . $album['title'] . "<br>";
echo "Artist: " . $album['artist'] . "<br>";
echo "Album: " . $album['label'] . "</p>";

echo "<table border=1 width = 50%>";
echo "<tr> <td>Id</td> <td>Artist</td> <td>Album</td> </tr>";
echo "<tr> <td>" . $album['title'] .
	"</td> <td>" . $album['artist'] .
	"</td> <td>" . $album['label'] . "</td> </tr>";
echo "</table>";


echo "<hr>";
?>
</body>
</html>
