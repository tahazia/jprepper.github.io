<!DOCTYPE html>
<html>
<head>
<link href= "css/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Jprepper</title>
</head>

<body>

<ul class="header">
    <img class="logo" src="images/J_logo.png"/>
    <li class = "header"><a class="active header" href="imprint.html">Imprint Page</a></li>
    <li class = "header"><a class = "header" href="contact.html">Contact</a></li>
    <li class = "header"><a class = "header"  href="about.html">About</a></li>
 </ul>

<div class = "clearfix">

    <nav>
      <ul class="sidebar">
        <li><a class="sidebar" href="index.html">Home</a></li>
        <li><a class="sidebar" href="search.html">Search Study Groups</a></li>
        <li><a class="sidebar" href="input_ss.html">Create Study Group</a></li>
        <li><a class="sidebar" href="Homework.html"> DBWA Homework</a></li>
      </ul>
    </nav>
  <div class ="mainarea">
    <?php
      $servername = "localhost";
      $username = "tzia";
      $password = "tzia1";
      $dbname = "jprepper";

      // Create connection
      $conn = mysql_connect($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      mysql_select_db($dbname) or die(mysql_error());

      $query = "SELECT * FROM StudySession";
      $qry_result = mysql_query($query) or die(mysql_error());
   
       //Build Result String
       $display_string = "<table>";
       $display_string .= "<tr>";
       $display_string .= "<th>StudySessionID</th>";
       $display_string .= "<th>SubTopic</th>";
       $display_string .= "<th>Max Size</th>";
      $display_string .= "<th>Course ID</th>";
       $display_string .= "<th>Moderator ID</th>";
       $display_string .= "</tr>";
       
   // Insert a new row in the table for each person returned
       while($row = mysql_fetch_array($qry_result)) {
          $display_string .= "<tr>";
          $display_string .= "<td>$row[StudySessionID]</td>";
          $display_string .= "<td>$row[SubTopic]</td>";
          $display_string .= "<td>$row[MaxSize]</td>";
          $display_string .= "<td>$row[CourseID]</td>";
          $display_string .= "<td>$row[ModeratedByUserID]</td>";
          $display_string .= "</tr>";
       }
   
       $display_string .= "</table>";
       echo $display_string;
    ?>
										
  </div>
</div>
</body>
<div id="footer-wrapper">
	<footer id="footer"><footcolor>© Tayyab Mateen, Taha Zia, David Gjorgoski</footcolor></footer>
</div>


</html>