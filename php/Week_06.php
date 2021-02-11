<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 06</title>


<!-- CSS to control Body text foreground ad backgroud from params in the URL -->
<!-- This PHP *must* go in the HTML page header section. -->
<?php

// Set the text colour
if (isset($_GET['text']))
{
	$text_colour = $_GET['text'];
}
else {
	$text_colour = "black";
}
// Set the background colour
if (isset($_GET['background']))
{
	$background_colour = $_GET['background'];
}
else
{
	$background_colour = "white";
}

echo <<<END
<style type="text/css">
body
{
	color: $text_colour;
	background-color: $background_colour;
}
</style>
END;

?>

</head>


<body>
<?php
include_once('php_generalfunctions.php');

echo "<hr>";
echo "<h1>Week 06</h1>";


//********************************************
echo "<hr>";
echo "<h2>Predefined variables:</h2>";

$php_script = $_SERVER['PHP_SELF'];
echo "<p>PHP script file: " . $php_script . "</p>";

$browser = $_SERVER['HTTP_USER_AGENT'];
echo "<p>Web Browser: " . $browser . "</p>";

$server_name = $_SERVER['SERVER_NAME'];
echo "<p>Server: " . $server_name . "</p>";

/*
The address of the page (if any) which referred the user agent to the
current page. This is set by the user agent. Not all user agents will set
this, and some provide the ability to modify HTTP_REFERER as a feature.
In short, it cannot really be trusted.
*/
if(isset($_SERVER['HTTP_REFERER']))
{
	$referer_url = $_SERVER['HTTP_REFERER'];
	echo "<p>Referring url: " . $referer_url . "</p>";
}

$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo "<p>Language: " . $language . "</p>";

if (($language == "en") || ($language == "en-AU") || ($language == "en-GB") || ($language == "en-US"))
{
	echo "Hello";
}
elseif (($language == "fr") || ($language == "fr-FR"))
{
	echo "Bonjour";
}
elseif (($language == "it") || ($language == "it-IT"))
{
	echo "Ciao";
}
else
{
	echo "I don't know where you are from, but welcome anyway.";
}
echo "</p>";



//********************************************
echo "<hr>";
echo "<h2>Extracting information from the URL:</h2>";

$game = $_GET['game'];
$score = $_GET['score'];
echo "<p>";
echo "FROM THE URL: The high score for <b>$game</b> is <b>$score</b>.";
echo "</p>";

echo <<<END
<p><b>Why query strings are useful ??</b>
</p>
<p>Why do we need query strings and the predefined \$_GET array? The Web is a
stateless environment, which means that a new connection must be established
every time a browser sends a request to a server. The connection is open just
long enough for the browser to send the request and for the server to return the
required files. Once the browser receives the files, the connection is closed.
Consequently, variables that are created during one processed request are not
available during the next processed request.
</p>
<p>To get around this problem, web developers use a variety of techniques to share
variables between sessions. Passing information via a query string in a URL is
one such technique. This approach is sometimes called the GET method. We
will learn about another approach called the POST method later in this unit.
</p>
END;



//********************************************
echo "<hr>";
echo "<h2>Include Files:</h2>";

echo "<p>Competition results</p>";
include ('Week_06__results.php');
echo "<p>Today's winner is $winner and today's loser is
$loser.</p>";



//********************************************
echo "<hr>";
echo "<h2>Functions - pre-defined:</h2>";

$day = date('l'); // lower case L
echo "<br>Today is: $day";

// A = AM/PM, a = am/pm
// g = hour 1-12 no leading zero.  h = hour 01-12 (has leading zero).
// e = timezone.
$date = date('D, j-M-Y, g:i:s A');
$timezone = date('e (T)');
$gmtDifference = date('P');
echo "<br>Today is: " . $date;
echo "<br>Timezone: " . $timezone . ", GMT: " . $gmtDifference;



//********************************************
echo "<hr>";
echo "<h2>Functions - user defined:</h2>";

//function say_hello()
//{
//	echo "Hello.  ";
//}


function show_area($length, $width)
{
	$area = $length * $width;
	echo "The area is $area sqm.";
}


function show_team($team)
{
	//echo "The four team members are $team[0], $team[1], $team[2] and $team[3].";
	$max = sizeof ($team);
	echo "The " . $max . " team members are ";
	for ($i = 0; $i < $max; $i++)
	{
	    echo $team[$i] . ", ";
	}

	// OR:
	//foreach ($team as $member)
	//{
	//    echo $member . ", ";
	//}
}

function calculate_gst($amount)
{
	$gst = $amount * 10 / 100;
	return $gst;
}

$ninjas = array("Leonardo", "Raphael", "Donatello", "Michelangelo");

echo "<br>";
say_hello();

echo "<br>";
show_area(50, 21);

echo "<br>";
show_team($ninjas);

echo "<br>";
$price = 90;
$tax = calculate_gst($price);
echo "The GST payable on this product is $" . $tax;


echo "<br>";

// Exercise 6.5
function show_wages($hours, $rate)
{
	$wages = $hours * $rate;
	echo "$" . $wages;
	return $wages;
}

$hours_worked = 30;
$hourly_rate_of_pay = 35.00;
echo "The amount of wages earned is ";
show_wages($hours_worked, $hourly_rate_of_pay);


?>
</body>

<?php
// Include Files
include ('footer.html');
?>

</html>
