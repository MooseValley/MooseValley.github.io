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

$sql = ' UPDATE personCheckIn '
 . ' SET comments = '
 . ' "Clayton Rd and Hawke St going on the market. Both of these properties are being sold. Motel house also going to be sold as soon as Murray finishes moving out. Pretty soon all I will own is my farm.  My Rates bill will go from $42K+ pa. down to about $4K.  No more will rates be ""bleeding me dry"", as stupid, greedy, incompetent local councils keep jacking up rates like there is no tomorrow, even when property prices are falling." '
 . ' WHERE id = 186 ';



$results = $db->executeSQLQuery ($sql);

echo "<div class='container'>";
echo "<h3>Delete / Cleanup Mistakes:</h3>";
echo "* DONE !";
echo "</div>";

?>


<button type="button" class="btn btn-primary" onclick="window.location='index.php'">
   <span class="glyphicon glyphicon-home"></span> Home
</button>


<?php
include_once ('res/footer.php');
?>