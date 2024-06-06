<?php
include 'connection.php';

$sl_no = $_POST['sl_no'];

$sql = "UPDATE faq SET approval='not-approved', status='UA' WHERE `sl.no`=$sl_no";

if ($conn->query($sql) === TRUE) {
    echo "FAQ deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
