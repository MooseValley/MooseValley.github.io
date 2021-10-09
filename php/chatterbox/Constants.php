<!-- Constants.php -->
<?php
//echo 'Setting up constants ...';

class Constants
{
   const APP_NAME                 = "ChatterBox";
   const APP_VERSION              = "v0.10";

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
   const DATABASE_NAME   = "moosedb";
   const USER_NAME       = "root";
   const USER_PASSWORD   = ""; // nbuser
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


 //const SQL_SET_TIME_ZONE        = 'SET time_zone = "+10:00" ';

	const SQL_COUNT_RECORDS        = 'SELECT COUNT(*) FROM personCheckIn ';

	const SQL_MOST_RECENT_RECORD   = 'SELECT DATE_FORMAT(MAX(checkinDateTime), "%a, %d-%b-%Y @ %l:%i:%s %p") FROM personCheckIn ';

	const SQL_SELECT_ROOT   =
      . ' SELECT '
      . '   pc.id as "Id" '
      . ' , pc.personName as "Person" '
      . ' , DATE_FORMAT(pc.checkinDateTime, "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
    //. ' , TIMESTAMPDIFF(DAY, NOW(), pc.checkinDateTime) as "Age (days)" '
    //. ' , FORMAT (TIMESTAMPDIFF(DAY,  pc.checkinDateTime, NOW() ), 1) as "Age (days)"  '
    //. ' , FORMAT (1 + TIMESTAMPDIFF(DAY,  pc.checkinDateTime, NOW() ) +  '
    //. ' , FORMAT (TIMESTAMPDIFF(HOUR, pc.checkinDateTime, NOW() ) / 24.0, 1) as "Age (days)" '
    //. ' , FORMAT(TIMESTAMPDIFF(MICROSECOND, NOW(), pc.checkinDateTime) / 1000.0 / 60.0 / 60.0, 1) as "Age (hours)" '
    //. ' , FORMAT ((NOW() - pc.checkinDateTime) / 60.0 / 60.0 / 24.0, 1) as "Age (days)" '
    //. ' , FORMAT (DATEFIFF(NOW(), pc.checkinDateTime), 1) as "Age (days)" '
    //. ' , FORMAT(TIMESTAMPDIFF(MICROSECOND, NOW(), pc.checkinDateTime) / 1000.0 / 60.0 / 60.0, 1) as "Age (hours)" '
      . ' , pc.comments as "Comments" '
      . ' FROM  personCheckIn pc ';

	// Most Recent record for each person.
   const SQL_MOST_RECENT_CHECKINS =
        Constants::SQL_SELECT_ROOT
      . ' WHERE pc.id = (SELECT MAX(pc2.id) FROM personCheckIn pc2 WHERE pc2.personName = pc.personName ) '
      . ' ORDER BY pc.personName ASC ';

   const SQL_SELECT_CHECKINS_TOP_N =
        Constants::SQL_SELECT_ROOT
      . ' ORDER BY checkinDateTime DESC '
      . ' LIMIT 50 '; // same as "SELECT TOP 50 ... " in SQL Server.

   const SQL_SELECT_CHECKINS_LAST_7_DAYS =
        Constants::SQL_SELECT_ROOT
      . ' WHERE TIMESTAMPDIFF(DAY, NOW(), pc.checkinDateTime) >= -7 '
      . ' ORDER BY checkinDateTime DESC ';


} // class Constants

//echo Constants::APP_NAME . " " . Constants::APP_VERSION;
?>