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

$sql = "INSERT INTO User(FirstName, LastName, EMail) VALUES ('" . $_POST["FirstName"] . "','" . $_POST["LastName"] . "','" . $_POST["EMail"] . "')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $sqlCP = "INSERT INTO Professor(UserID) VALUES (" . $last_id . ")";
    if($conn->query($sqlCP) === TRUE)
    {
    	$last_idP = $conn->insert_id;
    	echo "<p>New professor created successfully. User ID is: " . $last_idP . "</p>";
    }
    else
    {
    	echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="maintenance.html">Home</a>
</body>
</html>

