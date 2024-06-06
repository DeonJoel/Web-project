<?php 
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action == "insert") {
            $area = $_POST['area'];
            $subArea = $_POST['subArea'];
            $totalPopulation = $_POST['totalPopulation'];
            $noOfAcc = $_POST['noOfAcc'];
            $noOfCredit = $_POST['noOfCredit'];
            $noOfDebit = $_POST['noOfDebit'];
            $surveyorName = $_POST['surveyorName'];
    
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO surveydtails (Area, SubArea, TotalPopulation, NoOfAcc, NoOfCredit, NoOfDebit, SurveyorName) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiiiii", $area, $subArea, $totalPopulation, $noOfAcc, $noOfCredit, $noOfDebit, $surveyorName);
    
            // Execute the query
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
            header("Location: adminSurvey.php");
        } elseif ($action == "delete") {
            $id = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM surveydtails WHERE `sl.no` = ?");
            $stmt->bind_param("i", $id);
    
            // Execute the query
            if ($stmt->execute()) {
                echo "Record deleted successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
        } elseif ($action == "edit") {
            $id = $_POST['id'];
            $area = $_POST['area'];
            $subArea = $_POST['subArea'];
            $totalPopulation = $_POST['totalPopulation'];
            $noOfAcc = $_POST['noOfAcc'];
            $noOfCredit = $_POST['noOfCredit'];
            $noOfDebit = $_POST['noOfDebit'];
            $surveyorName = $_POST['surveyorName'];
    
            $stmt = $conn->prepare("UPDATE surveydtails SET Area = ?, SubArea = ?, TotalPopulation = ?, NoOfAcc = ?, NoOfCredit = ?, NoOfDebit = ?, SurveyorName = ? WHERE `sl.no` = ?");
            $stmt->bind_param("ssiiiiii", $area, $subArea, $totalPopulation, $noOfAcc, $noOfCredit, $noOfDebit, $surveyorName, $id);
    
            // Execute the query
            if ($stmt->execute()) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
        }
    }
?>