<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <?php echo "<title>" . Constants::APP_NAME . "</title>" ?>
   <meta name="viewport"  content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<meta http-equiv="refresh" content="10" > <!-- reload / refresh every 60 seconds -->

<?php
include ('res/stylesheet.css');
?>

<script type="text/javascript" src="res/Datepicker__IP_generalLib.js"></script>
<script type="text/javascript" src="res/printContent.js"></script>
</head>

<body>
<div class="panel-heading text-left">
    <IMG SRC = "res/Sherlock - silhouette - icon 01 - face to right.gif"  ALIGN=LEFT   WIDTH=50px HEIGHT=50px>
    <!--
      <IMG SRC = "res/CentacareCQ - logo with dignity, etc - adjacent.jpg"  ALIGN=RIGHT  WIDTH=170px HEIGHT=50px>
    -->
    <?php
        echo "<h1> " . Constants::APP_NAME . "</h1>";

    ?>
</div>