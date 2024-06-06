<?php
include 'connection.php';

$sl_no = $_POST['sl_no'];

$sql = "DELETE FROM surveior WHERE `sl.no`=$sl_no";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: surveyorsmanage.php");
exit;
?>
