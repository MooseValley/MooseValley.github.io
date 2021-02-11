<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Week 05</title>
</head>
<body>
<?php

echo "<hr>";
echo "<h1>Week 05</h1>";


echo "<hr>";
echo "<h2>IF Tests:</h2>";

$age = 30; // User`s age
echo "<p>Your age is: $age.  <br>You are ";
if ($age < 18)
{
	echo "not ";
}
echo "old enough to drink legally in Australia.</p>";

if (($age >= 18) && ($age >= 35))
{
	echo "<p>Your are between 18 and 35 years of age.</p>";
}


$result = 87;
echo "<p>Your exam result is: $result.";
if ($result < 50)
{
	echo "<br>Sorry, you failed.";
}
else
{
	echo "<br>Woo hoo, you passed !!";
}
echo "</p>";

echo "<p>Grade = ";
if ($result < 50)
{
	echo "'F'";
}
else if ($result < 65)
{
	echo "'P'";
}
else if ($result < 75)
{
	echo "'C'";
}
else if ($result < 85)
{
	echo "'D'";
}
else
{
	echo "'HD'";
}
echo "</p>";



echo "<hr>";
echo "<h2>Loops:</h2>";

$counter = 1;
echo "<p>While Loop: ";
while ($counter <= 10)
{
	echo $counter . ", ";
	$counter++;
}
echo "</p>";

echo "<p>For Loop: ";
for ($count = 1; $count <= 10; $count++)
{
	echo $count . ", ";
}
echo "</p>";

echo "<p>For Loop even numbers: ";
for ($count = 1; $count <= 10; $count++)
{
	if ($count % 2 == 0)
	{
		echo $count . ", ";
	}
}
echo "</p>";



echo "<hr>";
echo "<h2>Arrays and Associative Arrays - Part 2:</h2>";

$colours = array('black', 'white', 'red', 'green', 'blue');

// Add an item to the array
$colours[] = 'orange';

echo "<p>Colours - foreach loop: ";
foreach ($colours as $col)
{
	echo $col . ", ";
}
echo "</p>";

// sizeof just calls count behind the scenes.
// sizeof: "This function is an alias of: count(). "
echo "<br>colours array size - count: " . count($colours);
echo "<br>colours array size - sizeof: " . sizeof($colours);

echo "<p>Colours - for loop - counter controlled: ";
// Mike O: Added later (not part of course or course material):
// Use numeric index for array.
// Note: you must convert the array using array_values() to
// be able to use numeric indexes to look up values.
$coloursIndexed = array_values($colours);
for ($index = 0; $index <  count($coloursIndexed); $index++)
{
	echo "<br>" . $index . ": " . $coloursIndexed [$index];
}
echo "</p>";

// sizeof just calls count behind the scenes.
// sizeof: "This function is an alias of: count(). "
echo "<br>coloursIndexed array size - count: " . count($coloursIndexed);
echo "<br>coloursIndexed array size - sizeof: " . sizeof($coloursIndexed);



// Associative Arrays:


// How do I do arrays with > 1 row ???
/*
// This does NOT work.
$album = array(('Title' => '21',                 'Artist' => 'Adele',       'Album' => 'XL Recordings'),
               ('Title' => 'Station To Station', 'Artist' => 'David Bowie', 'Album' => 'Moose Records'));

// This does NOT work.
$album = array('Title' => 'Station To Station', 'Artist' => 'David Bowie', 'Album' => 'Moose Records');
$album[] = array('Title' => 'Station To Station', 'Artist' => 'David Bowie', 'Album' => 'Moose Records');

*/
$album = array('Title' => 'Station To Station', 'Artist' => 'David Bowie', 'Album' => 'Moose Records');

echo "<p>";
foreach ($album as $key => $value)
{
	echo "<br>" . $key . ": " . $value;
}
echo "</p>";




echo "<hr>";
?>
</body>
</html>
