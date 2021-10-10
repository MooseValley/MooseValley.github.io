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

            <tr>
                <td>v0.07</td>
                <td>Tue, 05-Oct-2021</td>
                <td>Moose</td>
                <td>Rename to "ChatterBox", change logo, fix typo in code.</td>
            </tr>

            <tr>
                <td>v0.08</td>
                <td>Wed, 06-Oct-2021</td>
                <td>Moose</td>
                <td>Add "Refresh" button and display last refresh / reload date / time at top of main page.</td>
            </tr>

            <tr>
                <td>v0.09</td>
                <td>Wed, 06-Oct-2021</td>
                <td>Moose</td>
                <td>Add Age column, fix last 7 days query.</td>
            </tr>

            <tr>
                <td>v0.10</td>
                <td>Sat, 09-Oct-2021</td>
                <td>Moose</td>
                <td>Add Emoji Picker to input text fields ... sadly, does NOT work as advertised.
                </td>
            </tr>

            <tr>
                <td>v0.11</td>
                <td>Sat, 09-Oct-2021</td>
                <td>Moose</td>
                <td>Explore blocking of my app ... HTTP 500 Internal Server Error.  Crazy !
                </td>
            </tr>

            <tr>
                <td>v0.12</td>
                <td>Sun, 10-Oct-2021</td>
                <td>Moose</td>
                <td>Fix Age (days) calcs, recover from crazy HTTP 500 Internal Server Error.
                    <b>Warning:</b> do NOT attempt to change Time Zones on MySQL.
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
