<?php
/*
   File: Database__MySQL.php

18-Dec-2017 Mike O   Created from my prior work in MySQL and SQL Server.

*/

class Database__MySQL
{
   private $dbConnection;
   private $queryResults;

   public function __construct() // Constructor
   {
      $this->dbConnection = new mysqli (Constants::SERVER_NAME,
                                        Constants::USER_NAME,
                                        Constants::USER_PASSWORD,
                                        Constants::DATABASE_NAME);

      if($this->dbConnection->connect_error)
      {
          die('Connect Error (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
      }

      $this->queryResults = null;

      return $this->dbConnection; // Just in case caller needs it.
   }

   public function __destruct() // Destructor
   {
      // TODO: Destructor cleanup: is this sufficient ???
      if ($this->queryResults !== null);
      {
          //$this->queryResults->free_result();
          $this->queryResults = null;
      }

      $this->dbConnection->close ();
   }


   // DANGER:    NEVER execute queries based on unsanitised user inputs.
   // RECOMMEND: Use Prepared Statements for queries based on user inputs.
   function executeSQLQuery ($querySQL)
   {
      // Run the query and store the result
      //$this->queryResults = $this->dbConnection->prepare($querySQL);
      //$this->queryResults->execute();
      $this->queryResults = mysqli_query ($this->dbConnection, $querySQL);

      if($this->queryResults === false) // You MUST use === (triple equals).
      {
          echo "<p>ERROR: MySQL Query ERROR</p>";
          die('Error : ' . mysqli_error($this->dbConnection));
      }

      return $this->queryResults;  // Just in case caller needs it.
   }

   function queryResultsToHTMLTable ($tableCaption, $showRowColumnCounts, $showValidAtDateTime, $checkboxFirstColumn, $addEditButton)
   {
      // Assign each record in the results to an array
      $rowCount = 0;
      $colCount = 0;

      // style='text-align:center'
      // text-center

      echo "<div class='container'>";
      echo "<table class='table table-striped table-hover text-center'>";

      if ($tableCaption != "")
      {
         echo "<caption>" . $tableCaption . "</caption>";
      }

      while ($row = $this->queryResults->fetch_assoc())
      //while ($row = mysqli_fetch_all ($this->queryResults, MYSQLI_ASSOC))
      {
         $values = $row;
         if ($rowCount == 0)
         {
            echo "<tr>";
            foreach($values as $key => $value)
            {
               // CSS to center vertically.
               echo "<th style='vertical-align:middle'>" . $key . "</th>";
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
                  // CSS to center vertically.
                  echo "<td style='vertical-align:middle'>" . $value . "</td>";
               }
            }
            $colCount++;
         }

         if ($addEditButton === true)
         {
            echo "<td><a href='edit.php?edit=$row[id]'>Edit</a></td>";
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

   // REF: http://www.kodingmadesimple.com/2015/05/export-data-mysql-to-csv-file-php.html
   function queryResultsToCSVFile ($fileName)
   {
      $fp = fopen($fileName, 'w');

      //fputcsv($fp, array('column heading 1', 'column heading 2'));

      while($row = $this->queryResults->fetch_assoc())
      {
         fputcsv($fp, $row);
      }

      fclose($fp);
   }

   // REF: http://www.kodingmadesimple.com/2015/07/import-csv-file-into-mysql-database-php-script.html
   // Recommend changing this to prepared statements, see:
   //   https://phppot.com/php/import-csv-file-into-mysql-using-php/
   //   Code from article copied here:  00 - OLD, Not used\INSERT CSV to Table using prepared statements.txt
   function cSVToTable ($fileName, $table)
   {
      // open the csv file
      $fp = fopen($fileName, "r");

      //parse the csv file row by row
      // "500" specifies the maximum length of the rows in the csv file and "," specifies the delimiter.
      while(($row = fgetcsv($fp, "500",",")) != FALSE)
      {
         //insert csv data into mysql table
         //$sql = "INSERT INTO aircond (name, author, isbn) VALUES('" . implode("','",$row) . "')";
         $sql = "INSERT INTO " . $table . " VALUES('" . implode("','",$row) . "')";

         //if(!mysqli_query($db, $sql))
         if ($this->executeSQLQuery ($sql) === false)
         {
            die('Error : ' . mysqli_error($this->dbConnection));
         }
      }

      fclose($fp);
   }

} // class Database

?>