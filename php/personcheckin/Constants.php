<!-- Constants.php -->
<?php
//echo 'Setting up constants ...';

class Constants
{
   const APP_NAME                 = "Person Check-in App";
   const APP_VERSION              = "v0.06";

   //const EMAIL_PERSON_URL       = "mailto:MichaelO@centacare.net";
   //const EMAIL_PERSON_NAME      = "Mike O";
   const EMAIL_PERSON_URL         = "mailto:Moose_Software@yahoo.com.au";
   const EMAIL_PERSON_NAME        = "Moose";

 //const EMAIL_WITH_SUBJECT       = "mailto:Moose_Software@yahoo.com.au?subject=Kinka Palms Air Conditioner Status";
   const EMAIL_WITH_SUBJECT       = Constants::EMAIL_PERSON_URL . "?subject=" . Constants::APP_NAME . " " . Constants::APP_VERSION;
   const CHANGE_LOG_FILE_NAME     = "changelog.php";

   const CREATED_BY_WEB_SITE_URL  = "https://moosevalley.github.io/";
   const CREATED_BY_WEB_SITE_NAME = "Moose's Software Valley";

   // *** Databases:

   // MySQL - local database
   /*
   const SERVER_NAME     = "localhost"; // serverName\instanceName
   const DATABASE_NAME   = "kinkapalms";
   const USER_NAME       = "root";
   const USER_PASSWORD   = "nbuser";
   */

   // *** OLD:  MySQL - http://moosesoftware.16mb.com
   //const SERVER_NAME     = "mysql.hostinger.com"; // serverName\instanceName
   //const DATABASE_NAME   = "u800723387_modb";
   //const USER_NAME       = "u800723387_giues";

   // MySQL - http://moosesoftware.netau.net/
   // REF: https://www.000webhost.com/forum/t/how-to-connect-to-database-using-php/42093
   //const SERVER_NAME     = "moose-software.000webhostapp.com";
   //const SERVER_NAME     = "databases.000webhost.com";
   //const SERVER_NAME     = "localhost";
   //const DATABASE_NAME   = "id2258494_u800723387_modb";
   //const USER_NAME       = "id2258494_u800723387_giues";
   //const USER_PASSWORD   = "KCHevRkc4NUT3T1iAVj"; // Max 20 chars !

   // *** MySQL - http://MoosesSoftware.epizy.com/
   const SERVER_NAME     = "sql313.epizy.com"; // serverName\instanceName
   const DATABASE_NAME   = "epiz_25227820_aircond";
   const USER_NAME       = "epiz_25227820";
   const USER_PASSWORD   = "YfHFYmXnKjOP";


   const SQL_MOST_RECENT_CHECKINS =
   /*
        ' SELECT '
      . '   personName as "Person" '
      . ' , DATE_FORMAT(MAX(checkinDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
      . ' , comments as "Comments" '
      . ' FROM personCheckIn '
    //. ' WHERE checkinDateTime = MAX(checkinDateTime) '
      . ' Group By personName '
      . ' ORDER BY personName ASC, checkinDateTime DESC;
	*/
        ' SELECT DISTINCT '
      . '   pc1.personName as "Person" '
      . ' , DATE_FORMAT(MAX(pc1.checkinDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
      . ' , (SELECT pc2.comments FROM personCheckIn pc2 WHERE pc2.personName = pc1.personName  AND pc2.checkinDateTime = MAX(pc1.checkinDateTime) )  as "Comments" '
      . ' FROM personCheckIn pc1 '
      . ' GROUP BY pc1.personName '
      . ' ORDER BY pc1.personName ASC, pc1.checkinDateTime DESC ';

   const SQL_SELECT_CHECKINS =
        ' SELECT '
      . '   id    as "Id" '
      . ' , personName as "Person" '
      . ' , DATE_FORMAT(checkinDateTime, "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
      . ' , comments as "Comments" '
      . ' FROM personCheckIn '
      . ' ORDER BY checkinDateTime DESC ';

   const SQL_SELECT_CHECKINS_TOP_N =
        Constants::SQL_SELECT_CHECKINS
      . ' LIMIT 50 '; // same as "SELECT TOP 50 ... " in SQL Server.

   const SQL_SELECT_CHECKINS_LAST_7_DAYS =
        ' SELECT '
      . '   id    as "Id" '
      . ' , personName as "Person" '
      . ' , DATE_FORMAT(checkinDateTime, "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
      . ' , comments as "Comments" '
      . ' FROM personCheckIn '
      . ' WHERE checkinDateTime >= (NOW() - 7) '
      . ' ORDER BY checkinDateTime DESC ';


} // class Constants

//echo Constants::APP_NAME . " " . Constants::APP_VERSION;
?>