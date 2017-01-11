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

$sql="SELECT * FROM College WHERE College.Name like '".$_GET['Name']."%'";
$result = $conn->query($sql);

if ($result->num_rows >0){
    echo "<table>
    <tr>
    <th>Name</th>
    <th>ID</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "No College with this Name.";
}
mysqli_close($con);
?>
</body>
</html>