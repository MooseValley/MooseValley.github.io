<?php

function registerAndInitialiseSessionData()
{
	// Register session variables for ALL of our input data.
	// Initialise all session variables.

    // No $
	$_SESSION['apartmentNum']          = 0;
	$_SESSION['readingDateTime']       = 0;
	$_SESSION['mainDoorOpenAmt']       = 0;
	$_SESSION['kitchenWindowOpenAmt']  = 0;
	$_SESSION['bathroomWindowOpenAmt'] = 0;
	$_SESSION['bedroomDoorOpenAmt']    = 0;
	$_SESSION['bedroomWindowOpenAmt']  = 0;
	$_SESSION['shutdownFlag']          = 'no';

    // $
	$_SESSION['$apartmentNum']          = 0;
	$_SESSION['$readingDateTime']       = 0;
	$_SESSION['$mainDoorOpenAmt']       = 0;
	$_SESSION['$kitchenWindowOpenAmt']  = 0;
	$_SESSION['$bathroomWindowOpenAmt'] = 0;
	$_SESSION['$bedroomDoorOpenAmt']    = 0;
	$_SESSION['$bedroomWindowOpenAmt']  = 0;
	$_SESSION['$shutdownFlag']          = 'no';
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
	echo "<tr><td>* apartmentNum</td><td>"          . $_SESSION['apartmentNum']          . "</td></tr>";
	echo "<tr><td>* readingDateTime</td><td>"       . $_SESSION['readingDateTime']       . "</td></tr>";
	echo "<tr><td>* mainDoorOpenAmt</td><td>"       . $_SESSION['mainDoorOpenAmt']       . "</td></tr>";
	echo "<tr><td>* kitchenWindowOpenAmt</td><td>"  . $_SESSION['kitchenWindowOpenAmt']  . "</td></tr>";
	echo "<tr><td>* bathroomWindowOpenAmt</td><td>" . $_SESSION['bathroomWindowOpenAmt'] . "</td></tr>";
	echo "<tr><td>* bedroomDoorOpenAmt</td><td>"    . $_SESSION['bedroomDoorOpenAmt']    . "</td></tr>";
	echo "<tr><td>* bedroomWindowOpenAmt</td><td>"  . $_SESSION['bedroomWindowOpenAmt']  . "</td></tr>";
	echo "<tr><td>* shutdownFlag</td><td>"          . $_SESSION['shutdownFlag']          . "</td></tr>";

    // $
	echo "<tr><td>* apartmentNum</td><td>"          . $_SESSION['$apartmentNum']          . "</td></tr>";
	echo "<tr><td>* readingDateTime</td><td>"       . $_SESSION['$readingDateTime']       . "</td></tr>";
	echo "<tr><td>* mainDoorOpenAmt</td><td>"       . $_SESSION['$mainDoorOpenAmt']       . "</td></tr>";
	echo "<tr><td>* kitchenWindowOpenAmt</td><td>"  . $_SESSION['$kitchenWindowOpenAmt']  . "</td></tr>";
	echo "<tr><td>* bathroomWindowOpenAmt</td><td>" . $_SESSION['$bathroomWindowOpenAmt'] . "</td></tr>";
	echo "<tr><td>* bedroomDoorOpenAmt</td><td>"    . $_SESSION['$bedroomDoorOpenAmt']    . "</td></tr>";
	echo "<tr><td>* bedroomWindowOpenAmt</td><td>"  . $_SESSION['$bedroomWindowOpenAmt']  . "</td></tr>";
	echo "<tr><td>* shutdownFlag</td><td>"          . $_SESSION['$shutdownFlag']          . "</td></tr>";

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