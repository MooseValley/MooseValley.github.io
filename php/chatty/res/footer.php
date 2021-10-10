<!-- footer.php -->
</div>
</body>

<div id="footer">
<center>
<p>

<?php
$startYear         = 2021;
$version           = phpversion();
$currentYear       = date('Y');
$date              = date('D, j-M-Y, g:i:s A'); // e.g. Sun, 10-Oct-2021, 9:37:11 AM
$timezone          = date('e (T)');
$gmtDifference     = date('P');

echo "<hr>";
echo "<p><strong>" . Constants::APP_NAME . " " . Constants::APP_VERSION . ".</strong>  ";
echo "Copyright (C) ";
if ($startYear != $currentYear)
{
   echo $startYear . "-";
}
echo $currentYear . ". <strong>Unauthorised access strictly prohibited.</strong>  ";
echo "<br>For further information about this application, email ";
echo "<a href='" . Constants::EMAIL_WITH_SUBJECT . "'>" . Constants::EMAIL_PERSON_NAME . "</a>.";
echo " or see <a href='" .  Constants::CHANGE_LOG_FILE_NAME . "'>Change Log</a>.";

echo "<br>PHP v" . $version;
echo ".   Date: " . $date;
echo ".   Timezone: " . $timezone . ", GMT: " . $gmtDifference . ".";
?>

</p>
</center>
</div>

</html>