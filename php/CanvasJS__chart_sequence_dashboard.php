<!--
TO DO:
Load data from database for each chart.
Store the data in $_SESSION
Each time the page is loaded, retrieve the data from $_SESSION
Every 60 mins, re-load the data from database.

-->
<!DOCTYPE html>
<html>
<head>
	<title>Multi-Chart / Chart Sequence Dashboard</title>
	<meta http-equiv="refresh" content="3">
</head>

<?php
// Start/resume the current session.
session_start ();

$pathStr = "http://localhost/mmst12009/Charts/";
$pathStr = "";

$chartPHPFileNames = array();

// Add Chart PHP files to the array
$chartPHPFileNames[] = 'CanvasJS__column_chart.php';
$chartPHPFileNames[] = 'CanvasJS__pie_chart.php';
$chartPHPFileNames[] = 'CanvasJS__performance_demo.php';
$chartPHPFileNames[] = 'CanvasJS__multiple_charts_on_one_page.html';

$chartPHPFileNamesIndexed = array_values($chartPHPFileNames);

/*
$index = 0;
$fileName = "";
for ($index = 0; $index < count ($chartPHPFileNamesIndexed); $index++)
{
	$fileName = $pathStr . $chartPHPFileNamesIndexed[$index];
}
*/

$index = 0;

if (isset ($_SESSION['index']) === false)
{
	$_SESSION['index'] = 0;
}
else
{
	$index = $_SESSION['index'];

	$index++;

	if ($index >= count ($chartPHPFileNamesIndexed))
	{
	   $index = 0;
	}

	$_SESSION['index'] = $index;
}

//$index = random_int (0, count ($chartPHPFileNamesIndexed) - 1);
$fileName = $pathStr . $chartPHPFileNamesIndexed[$index];
//echo "<br>" . $index . ": " . $fileName;

include ($fileName);

?>

</body>
</html>
