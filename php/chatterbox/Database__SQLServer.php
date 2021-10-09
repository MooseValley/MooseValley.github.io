<?php
/*
   File: Database__SQLServer.php

18-Dec-2017 Mike O   Add $checkboxFirstColumn parameter to queryResultsToHTMLTable.
*/

class Database__SQLServer
{
   // *** BriSQL1
   //private $serverName     = "BriSQL1";
   //private $connectionInfo = array( "Database"=>"CC_Extras", "UID"=>"AdminRO", "PWD"=>"AdminRO");

   // *** Localhost
   //private $serverName   = "EME-LPT07\SQLEXPRESS"; // serverName\instanceName
   private $serverName     = "localhost\SQLEXPRESS"; // serverName\instanceName
   private $connectionInfo = array( "Database"=>"CC_Extras", "UID"=>"AdminRO", "PWD"=>"AdminRO");


   private $dbConnection;
   private $queryResults;

   public function __construct() // Constructor
   {
      $this->dbConnection = sqlsrv_connect ($this->serverName, $this->connectionInfo);

      if($this->dbConnection === false) // You MUST use === (triple equals).
      {
         echo "<p>ERROR: SQL Server Connection error: cannot connect to '" . $this->serverName . "'.</p>";
         die( print_r( sqlsrv_errors(), true));
      };

      $this->queryResults = null;

      return $this->dbConnection; // Just in case caller needs it.
   }

   public function __destruct() // Destructor
   {
      // TODO: Destructor cleanup: is this sufficient ???
      if ($this->queryResults !== null);
      {
         sqlsrv_free_stmt ($this->$queryResults);
      }

      sqlsrv_close ($this->$dbConnection);
   }


   // DANGER:    NEVER execute queries based on unsanitised user inputs.
   // RECOMMEND: Use Prepared Statements for queries based on user inputs.
   function executeSQLQuery ($querySQL)
   {
      // Run the query and store the result
      $this->queryResults = sqlsrv_query ($this->dbConnection, $querySQL);

      if($this->queryResults === false) // You MUST use === (triple equals).
      {
          echo "<p>ERROR: SQL Server Query ERROR</p>";
          die( print_r( sqlsrv_errors(), true));
      }

      return $this->queryResults;  // Just in case caller needs it.
   }

   function queryResultsToHTMLTable ($tableCaption, $showRowColumnCounts, $showValidAtDateTime, $checkboxFirstColumn)
   {
      // Assign each record in the results to an array
      $rowCount = 0;
      $colCount = 0;

      echo "<div class='container'>";
      echo "<table class='table table-striped'>";

      if ($tableCaption != "")
      {
         echo "<caption>" . $tableCaption . "</caption>";
      }

      while ($row = sqlsrv_fetch_array($this->queryResults, SQLSRV_FETCH_ASSOC))
      {
         $values = $row;
         if ($rowCount == 0)
         {
            echo "<tr>";
            foreach($values as $key => $value)
            {
               echo "<th>" . $key . "</th>";
               $colCount++;
            }
            echo "</tr>";
         }

         echo "<tr>";
         $colCount = 0;
         foreach($values as $value)
         {
            if (($checkboxFirstColumn == true) && ($colCount == 0))
            {
               echo '<td><input type="checkbox" value="<' . $value . '>"></td>';
            }
            else
            {
               if (strpos($value, '.jpg'))
               {
                  // <img src="pics/laptop.jpg" class="img-thumbnail" alt="laptop" width="50" height="50">
                  echo '<td><img src="pics/' . $value . '" class="img-thumbnail" alt="" width="50" height="50"></td>';
               }
               else
               {
                  echo "<td>" . $value . "</td>";
               }
            }
            $colCount++;
         }
         echo "</tr>";
         $rowCount++;
      }

      echo "</table>";

      if (($showValidAtDateTime === true) || ($showRowColumnCounts === true))
      {
         echo "<p>";
         if ($showValidAtDateTime === true)
         {
            $date             = date('D, j-M-Y, g:i:s A');
            echo "Valid at: " . $date . ".  ";
         }

         if ($showRowColumnCounts === true)
         {
            echo "Table size: " . $rowCount . " rows x  " . $colCount . " columns.  ";
         }
         echo "</p>";
      }
      echo "</div>";
    }


} // class Database

?>