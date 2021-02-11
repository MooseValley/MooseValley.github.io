<!--
CanvasJS - Beautiful Charts for your PHP Applications
https://canvasjs.com/php-charts/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Top Categories of New Year Resolution</title>
	<meta http-equiv="refresh" content="3">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<?php
	$chartTitle = "Top Categories of New Year's Resolution";

	$dataPoints = array(
		array("y" => 35, "name" => "Health", "exploded" => true),
		array("y" => 20, "name" => "Finance"),
		array("y" => 18, "name" => "Career"),
		array("y" => 15, "name" => "Education"),
		array("y" => 5, "name" => "Family"),
		array("y" => 7, "name" => "Real Estate")
	);
?>

<body>

<div id="chartContainer"></div>

<!--
Mike O: changed the code so that I can set the hart title from PHP:

In the javascript below, change:
		text: "Top Categories of New Year's Resolution"
to:
		text: "<?php echo $chartTitle; ?>"
-->
<script type="text/javascript">
$(function () {
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "theme2",
	title:{
		text: "<?php echo $chartTitle; ?>"
	},
	exportFileName: "New Year Resolutions",
	exportEnabled: true,
	animationEnabled: true,
	data: [
	{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} {y}%",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
});
</script>
</body>

</html>
