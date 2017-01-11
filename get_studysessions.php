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
   $Name = $_GET['Name'];
   $MaxSize = $_GET['MaxSize'];
   $ModeratorID = $_GET['ModeratorID'];
   
   // Escape User Input to help prevent SQL Injection
   $Name = mysql_real_escape_string($Name);
   $MaxSize = mysql_real_escape_string($MaxSize);
   $ModeratorID = mysql_real_escape_string($ModeratorID);
   
   //build query
   $query = "SELECT StudySessionID, CourseNumber, Name, SubTopic, MaxSize, ModeratedByUserID FROM StudySession, Course WHERE Course.Name like '$Name%'";
   
   $query .= " OR (StudySession.MaxSize = $MaxSize";
   
   if(is_numeric($ModeratorID))
   $query .= " AND StudySession.ModeratedByUserID = $ModeratorID)";
   
   //Execute query
   $qry_result = mysql_query($query) or die(mysql_error());
   
   //Build Result String
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>StudySessionID</th>";
   $display_string .= "<th>Course Number</th>";
   $display_string .= "<th>Name</th>";
   $display_string .= "<th>SubTopic</th>";
   $display_string .= "<th>Max Size</th>";
   $display_string .= "<th>Moderator ID</th>";
   $display_string .= "</tr>";
   
   // Insert a new row in the table for each person returned
   while($row = mysql_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[StudySessionID]</td>";
      $display_string .= "<td>$row[CourseNumber]</td>";
      $display_string .= "<td>$row[Name]</td>";
      $display_string .= "<td>$row[SubTopic]</td>";
      $display_string .= "<td>$row[MaxSize]</td>";
      $display_string .= "<td>$row[ModeratedByUserID]</td>";
      $display_string .= "</tr>";
   }
   
   $display_string .= "</table>";
   echo $display_string;
?>