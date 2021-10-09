<?php

function registerAndInitialiseSessionData()
{
	// Register session variables for ALL of our input data.
	// Initialise all session variables.

    // No $
	$_SESSION['personName']             = 'unknown';
	$_SESSION['checkinDateTime']        = 0;
	$_SESSION['comments']               = '';

    // $
	$_SESSION['$personName']            = 'unknown';
	$_SESSION['$checkinDateTime']       = 0;
	$_SESSION['$comments']              = '';
}

function displaySessionData()
{
	// Uncomment this next statement when going into Production:
	//return;

	echo "<div class='container-fluid'>";
	echo "<p>";
	echo "<table class='table table-striped'>";
	echo "<caption>Session Data:</caption>";

    // No $
	echo "<tr><td>* personName</td><td>"            . $_SESSION['personName']        . "</td></tr>";
	echo "<tr><td>* checkinDateTime</td><td>"       . $_SESSION['checkinDateTime']   . "</td></tr>";
	echo "<tr><td>* comments</td><td>"              . $_SESSION['comments']          . "</td></tr>";

    // $
	echo "<tr><td>* personName</td><td>"            . $_SESSION['$personName']       . "</td></tr>";
	echo "<tr><td>* checkinDateTime</td><td>"       . $_SESSION['$checkinDateTime']  . "</td></tr>";
	echo "<tr><td>* comments</td><td>"              . $_SESSION['$comments']         . "</td></tr>";

   //foreach ($_POST as $key => $value)
   //{
   //   echo "<tr><td>* " . ${$key} . "</td><td>" . $value . "</td></tr>";
   //}

   echo "</table>";
	echo "</p>";
	echo "</div>";
}


function validateClientSearchFormParams ()
{
	$errorLines = "";
	$errorCount = 0;

    // txtFromDate is required for this query.
    if ($_SESSION['lastName'] == "")
    {
        $errorLines .= "<br>* ERROR: 'Last Name' cannot be blank.";
    }

	if ($errorLines != "")
	{
		$errorLines = 	"<p>The following " . $errorCount . " errors were encountered:" .
						$errorLines .
						"</p><p>Please click the <b>Back</b> button and try again.</p>";
	}

	return $errorLines;
}

?>