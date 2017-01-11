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
		<form method="POST" action="add-course.php">
			<h2>New Course</h2> <br>
 			Course Name: <input type="text" name="CourseName">
			<br>
			Course Number: <input type="text" name="CourseNumber">
 			<br>
			Professor: <input type="number" name="Professor">
			<a href="javascript:alert('
			<?php
			$servername = "localhost";
			$username = "tzia";
			$password = "tzia1";
			$dbname = "jprepper";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			echo "Available Professors:";
			$sql = "SELECT ProfID, FirstName, LastName FROM Professor,User WHERE Professor.UserID = User.UserID";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "\\n" . $row["ProfID"] . " - " . $row["FirstName"] . " " . $row["LastName"];
			    }
			} else {
			    echo "No Professors";
			}
			$conn->close();
			?>
			')"> ... </a>
			<br>
			<input type="submit" value="Create Course">
			</form>
										
  </div>
</div>
</body>
<div id="footer-wrapper">
	<footer id="footer"><footcolor>© Tayyab Mateen, Taha Zia, David Gjorgoski</footcolor></footer>
</div>


</html>