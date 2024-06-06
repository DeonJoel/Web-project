<?php
include 'connection.php';

$sl_no = $_POST['sl_no'];
$servName = $_POST['servName'];
$password = $_POST['password'];
$phone = $_POST['phone'];

if ($sl_no) {
    // Edit record
    $sql = "UPDATE surveior SET ServName='$servName', Password='$password', phone='$phone' WHERE `sl.no`=$sl_no";
} else {
    // Add new record
    $sql = "INSERT INTO surveior (ServName, Password, phone) VALUES ('$servName', '$password', '$phone')";
}

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: surveyorsmanage.php");
exit;
?>
