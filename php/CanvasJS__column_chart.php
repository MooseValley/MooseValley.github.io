<!DOCTYPE html>
<!--
CanvasJS - Beautiful Charts for your PHP Applications
https://canvasjs.com/php-charts/
-->
<html>
<head>
<title>Title of the document</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<?php
	$dataPoints = array(
	array("y" => 6, "label" => "Apple"),
	array("y" => 4, "label" => "Mango"),
	array("y" => 5, "label" => "Orange"),
	array("y" => 7, "label" => "Banana"),
	array("y" => 4, "label" => "Pineapple"),
	array("y" => 6, "label" => "Pears"),
	array("y" => 7, "label" => "Grapes"),
	array("y" => 5, "label" => "Lychee"),
	array("y" => 4, "label" => "Jackfruit")
	);
?>

<body>
<div id="chartContainer"></div>

<script type="text/javascript">

$(function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Basic Column Chart using CanvasJS"
	},
	data: [
	{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}
	]
});
chart.render();
});
</script>
</body>

</html>