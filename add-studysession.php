html>
<body>
<?php
$servername = "localhost";
$username = "tzia";
$password = "tzia1";
$dbname = "jprepper";

$Cid = $_POST["ID"];
$Subtop = $_POST["Stopic"];
$MSize = $_POST["MaxParticipants"];
$ModID = $_POST["ModeratedBy"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h2>Connected successfully</h2>";

$sql = "INSERT INTO StudySession(SubTopic, MaxSize, CourseID, ModeratedByUserID) VALUES ('$Subtop', $MSize, $Cid, $ModID)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "<p>New Study Session created successfully. SutdySession ID is: " . $last_id . "</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="maintenance.html">Home</a>
</body>
</html>