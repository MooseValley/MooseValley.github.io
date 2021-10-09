<!-- Constants.php -->
<?php
class Constants
{
   const APP_NAME                 = "Kinka Palms Air Conditioner Status";
   const APP_VERSION              = "v0.3001";

   //const EMAIL_PERSON_URL       = "mailto:MichaelO@centacare.net";
   //const EMAIL_PERSON_NAME      = "Mike O";
   const EMAIL_PERSON_URL         = "mailto:Moose_Software@yahoo.com.au";
   const EMAIL_PERSON_NAME        = "Moose";

   const EMAIL_WITH_SUBJECT       = Constants::EMAIL_PERSON_URL . "?subject=" . Constants::APP_NAME . " " . Constants::APP_VERSION;
   //const EMAIL_WITH_SUBJECT       = "mailto:Moose_Software@yahoo.com.au?subject=Kinka Palms Air Conditioner Status";
   const CHANGE_LOG_FILE_NAME     = "changelog.php";

   const CREATED_BY_WEB_SITE_URL  = "https://rebrand.ly/MoosesSoftware";
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


   const SQL_SELECT_APARTMENTS =
        ' SELECT id, apartmentNum as "Apt" '
      . ' , DATE_FORMAT(readingDateTime, "%a, %d-%b-%Y @ %l:%i:%s %p") as "Date/Time" '
      . ' , (SELECT description FROM windowstatus WHERE amt = mainDoorOpenAmt)       as "Main Door" '
      . ' , (SELECT description FROM windowstatus WHERE amt = kitchenWindowOpenAmt)  as "Kitchen Window" '
      . ' , (SELECT description FROM windowstatus WHERE amt = bathroomWindowOpenAmt) as "Bathroom Window" '
      . ' , (SELECT description FROM windowstatus WHERE amt = bedroomDoorOpenAmt)    as "Bedroom Door" '
      . ' , (SELECT description FROM windowstatus WHERE amt = bedroomWindowOpenAmt)  as "Bedroom Window" '
      . ' , IF(ShutDown=1, "<b>Yes</b>", "") as "Shutdown" '
      . ' FROM aircond '
      . ' WHERE_CLAUSE ' // This needs to be replaced by blank or a proper where clause.
      . ' ORDER BY readingDateTime DESC ';

   const SQL_SELECT_APARTMENTS_TOP_N =
        Constants::SQL_SELECT_APARTMENTS
      . ' LIMIT 5 '; // same as "SELECT TOP 5 ... " in SQL Server.

} // class Constants

?>