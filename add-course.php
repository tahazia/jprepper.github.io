<html>
<body>
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
echo "<h2>Connected successfully</h2>";

$sql = "INSERT INTO Course(CourseNumber, Name, TaughtBy) VALUES ('" . $_POST["CourseNumber"] . "','" . $_POST["CourseName"] . "'," . $_POST["Professor"] . ")";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "<p>New course created successfully. Course ID is: " . $last_id . "</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="maintenance.html">Home</a>
</body>
</html>

