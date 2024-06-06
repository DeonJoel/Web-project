<?php
include 'connection.php';

$sl_no = $_POST['sl_no'];
$answer = $_POST['answer'];

$sql = "UPDATE faq SET answer='$answer', approval='approved', status='A' WHERE `sl.no`=$sl_no";

if ($conn->query($sql) === TRUE) {
    echo "FAQ approved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
