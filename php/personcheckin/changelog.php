<!doctype html>
<html>
<?php
include_once ('Constants.php');
include_once ('res/header.php');
?>

<div class="container">
    <div id='printThis'>
        <!-- <h4>Change Log:</h4> -->

        <table class='table table-striped'>
            <caption>Change Log:</caption>
            <tr>
                <th>Version</th>
                <th>Date</th>
                <th>Author</th>
                <th>Details / Changes</th>
            </tr>

            <tr>
                <td>v0.06</td>
                <td>Mon, 04-Oct-2021</td>
                <td>Moose</td>
                <td>Created - basic functionality.  Release.</td>
            </tr>

        </table>

    </div>
</div>
<p><br></p>

<button type="button" class="btn btn-primary" onClick="history.back();">
   <span class="glyphicon glyphicon-backward"></span> Back
</button>

<button type="button" class="btn btn-primary" onClick="printContent('printThis');">
   <span class="glyphicon glyphicon-print"></span> Print
</button>

<!--
<button type="button" onclick="history.back();">Back</button>
<button onClick="printContent('printThis')">Print</button>
-->

</body>

<?php
include ('res/footer.php');
?>

</html>
