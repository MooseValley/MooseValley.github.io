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
                <td>v0.1</td>
                <td>Mon, 18-Dec-2017</td>
                <td>Moose</td>
                <td>Test release - basic functionality.</td>
            </tr>

            <tr>
                <td>v0.2</td>
                <td>Sat, 27-Oct-2018</td>
                <td>Moose</td>
                <td>Migrate to new web host.
                Fix some PHP issues.
                Bring code up-to-date with PHP v7.x.
                Add "Show All" button.
                </td>
            </tr>

            <tr>
                <td>v0.3000</td>
                <td>Sat, 11-Jan-2020</td>
                <td>Moose</td>
                <td>
                Fix / workaround some PHP issues - to do with Add -> shutdown checkbox.
                </td>
            </tr>

            <tr>
                <td>v0.3001</td>
                <td>Fri, 25-Sep-2020</td>
                <td>Moose</td>
                <td>
                Add script to re-load Airconditioner table from CSV.
                Reload / reinstate the latest database backup from the old web server.
                </td>
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
