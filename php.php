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

$name=$_POST['name'];       //تحتوى على كل البيانات الى وصلتنى من الالبوست


$sql = "INSERT INTO task (name)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    header('Location: To dos list.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
