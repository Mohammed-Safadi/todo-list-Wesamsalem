<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assginment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);    //جملة فحص الاتصال بقاعدة البيانات تعمل الداي على الايقاف وطباعه الرسالة
}

$id=$_GET['id'];

// sql to delete a record
$sql = "DELETE FROM task WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    header('Location: To dos list.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>