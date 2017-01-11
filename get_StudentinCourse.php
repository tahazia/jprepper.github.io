<!DOCTYPE html>
<head>
<link href= "css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
   
   $dbhost = "localhost";
   $dbuser = "tzia";
   $dbpass = "tzia1";
   $dbname = "jprepper";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
   
   // Retrieve data from Query String
   $CourseNumber = $_GET['CourseNumber'];
   $MatID = $_GET['MatID'];
   
   // Escape User Input to help prevent SQL Injection
   $CourseNumber = mysql_real_escape_string($CourseNumber);
   $MatID = mysql_real_escape_string($MatID);
   
   //build query
   $query = "SELECT DISTINCT CourseNumber, MatID, Batch_Major FROM Student, TakenBy WHERE TakenBy.CourseNumber like '$CourseNumber%'";
   
   $query .= " AND Student.MatID like '$MatID%'";
   
   //Execute query
   $qry_result = mysql_query($query) or die(mysql_error());
   
   //Build Result String
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>CourseNumber</th>";
   $display_string .= "<th>MatID</th>";
   $display_string .= "<th>Major</th>";
   $display_string .= "</tr>";
   
   // Insert a new row in the table for each person returned
   while($row = mysql_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[CourseNumber]</td>";
      $display_string .= "<td>$row[MatID]</td>";
      $display_string .= "<td>$row[Batch_Major]</td>";
      $display_string .= "</tr>";
   }
   
   $display_string .= "</table>";
   echo $display_string;
?>