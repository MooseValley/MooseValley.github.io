<!-- index.php -->
<?php
include_once ('Constants.php');
include_once ('res/header.php');
include_once ('Database__MySQL.php');
include_once ('SessionControl.php');

date_default_timezone_set("Australia/Brisbane");
//echo date_default_timezone_get();
?>

<?php
$db = new Database__MySQL();

//$sql = ' SELECT * FROM personCheckIn '
//     . ' ORDER BY id DESC ';
   //. ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.

//$sql = ' DELETE FROM personCheckIn WHERE id = 141 ';

//$sql = ' UPDATE personCheckIn '
// . ' SET comments = '
// . ' "Been watching some George Harrison interviews (and music) ....  While My Guitar Gently Weeps, My Sweet Lord, tribute videos, ....  in one interview, Ringo tells the story of seeing George for the last time. George was terribly ill and in the hospital in Switzerland, bedridden. Ringo says to George, ""You know I love you, but I`ve got to go to Boston. My Daughter`s having surgery for a brain tumor.""  George replied, ""Do you want me to go with you?""  Humble, thoughtful, and always ready to put other people`s needs ahead of his own.  What a fucking top bloke !!!  The world needs more people like George.  Now more than ever.   Ref: <a target=_blank href=""https://www.youtube.com/watch?v=0LBJoj4Vyb0"">  George Harrison`s last words with Ringo Starr</a>" '
// . ' WHERE id = 176 ';

//$sql = ' UPDATE personCheckIn '
// . ' SET comments = '
// . ' "Clayton Rd and Hawke St going on the market. Both of these properties are being sold. Motel house also going to be sold as soon as Murray finishes moving out. Pretty soon all I will own is my farm.  My Rates bill will go from $42K+ pa. down to about $4K.  No more will rates be ""bleeding me dry"", as stupid, greedy, incompetent local councils keep jacking up rates like there is no tomorrow, even when property prices are falling." '
// . ' WHERE id = 186 ';

$sql = ' UPDATE personCheckIn '
 . ' SET comments = '
 . ' "Very hot day here today. Emptied most stuff out of Garden Shed #1 and took it out to Farm. No shed for it to go into. The brand new shed I had out there was destroyed in a storm about 5-6 weeks ago when I found the wreckage strewn across the yards and paddock. So, everything is sitting in a carport on some old roofing iron (to keep it out of any water that might flow through in a storm).<br>Get stuck into doing more changes of address, phone, email, etc. In the good old days you could do a mail merge in Word and send letters out to banks, etc, but they now want everything done using their on-line web portals / apps - so I have to login to each, find out how / where to change details, change details, and double check. Most web portals / apps are pretty easy, but some, like CQUni`s are very convoluted and strange. Some web portals / apps I don`t have access to, so I need to arrange access (logins). For others, I need to physically go into the bank branch and fill out forms (because internet banking is <b>not</b> turned on or available by default if you only have a term deposit). Fiddly work that soaks up hours. Oh yes, I also need Murray to be around for some of this (those sites that insist on sending SMS security codes and don`t support safer alternatives like Authy) so that I can update the SMS security code mobile phone from his phone to mine.  Swim in the pool on dark, with a few Bourbons and Coke. Nice end to a very hot day." '
 . ' WHERE id = 260 ';



$results = $db->executeSQLQuery ($sql);

echo "<div class='container'>";
echo "<h3>Delete / Cleanup Mistakes:</h3>";
echo "<p>* SQL: " . $sql . "<p>";
echo "<p>* Result: " . $results . "<p>";
echo "<p>* DONE !<p>";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>