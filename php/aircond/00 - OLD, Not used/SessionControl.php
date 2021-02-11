<?php

function registerAndInitialiseSessionData()
{
	// Register session variables for ALL of our input data.
	// Initialise all session variables.
	$_SESSION['lastName']           = '';
	$_SESSION['firstName']          = '';
	$_SESSION['accountID']          = '';
	$_SESSION['txtFromDateReqd']    = '';
	$_SESSION['txtFromDate']        = '';
	$_SESSION['txtToDateReqd']      = '';
	$_SESSION['txtToDate']          = '';
}

function displaySessionData()
{
	// Uncomment this next statement when going into Production:
	//return;

	echo "<div class='container-fluid'>";
	echo "<p>";
	echo "<table class='table table-striped'>";
	echo "<caption>Session Data:</caption>";
	echo "<tr><td>* lastName</td><td>"         . $_SESSION['lastName']         . "</td></tr>";
	echo "<tr><td>* firstName</td><td>"        . $_SESSION['firstName']        . "</td></tr>";
	echo "<tr><td>* accountID</td><td>"        . $_SESSION['accountID']        . "</td></tr>";
	echo "<tr><td>* txtFromDateReqd</td><td>"  . $_SESSION['txtFromDateReqd']  . "</td></tr>";
	echo "<tr><td>* txtFromDate</td><td>"      . $_SESSION['txtFromDate']      . "</td></tr>";
	echo "<tr><td>* txtToDateReqd</td><td>"    . $_SESSION['txtToDateReqd']    . "</td></tr>";
	echo "<tr><td>* txtFromDate</td><td>"      . $_SESSION['txtToDate']        . "</td></tr>";
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