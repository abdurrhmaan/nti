<?php  
//Database connection details
$servername = "localhost";
$username = "Abdurrhman";
$password = "nti";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
?>
