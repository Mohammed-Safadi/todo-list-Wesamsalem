<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assginment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET['id'];

$sql = "UPDATE task SET complete='1' WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    header('Location: To dos list.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>