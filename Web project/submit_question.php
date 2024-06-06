<?php
session_start();
include 'connection.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = mysqli_real_escape_string($conn, $_POST['question']);

    // Insert the question into the faq table
    $sql = "INSERT INTO faq (question, status) VALUES ('$question', 'NA')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Question submitted successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error: ' . $sql . '<br>' . $conn->error.'); window.location.href = 'index.php';</script>";
    }

    $conn->close();
}
?>
