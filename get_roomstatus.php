<!DOCTYPE html>
<head>
<link href= "css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
$servername = "localhost";
$username = "tzia";
$password = "tzia1";
$dbname = "jprepper";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM Room WHERE Room.Status like '".$_GET['Status']."%'";
$result = $conn->query($sql);

if ($result->num_rows >0){
    echo "<table>
    <tr>
    <th>RoomNo</th>
    <th>ID</th>
    <th>Status</th>
    <th>MaxSize</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['RoomNo'] . "</td>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td>" . $row['MaxSize'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "No Room with given status.";
}
mysqli_close($con);
?>
</body>
</html>