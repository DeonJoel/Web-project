<?php
include "connection.php";
// Fetch all records
$result = $conn->query("SELECT * FROM surveydtails");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Surveyor Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Images\logo.png" type="image/png">
</head>
<body>
<div style="margin-top: 5%;left:0%;">
<button onclick="window.location.href='Dashboard.php'" style="width: fit-content;">Go back to Dashboard</button>
        <h2>Survey Details Form</h2>
        <form name="surveyForm" action="" method="post" onsubmit="return validateForm()" style="width: 40%;margin: auto;padding: 2%;background-color: #b43ce049;color: black;border: #ccc 2px solid;border-radius: 5px;">
            <input type="hidden" name="id">
            <input type="hidden" name="action" value="insert">
            Area: <input type="text" name="area" required><br><br>
            Sub Area: <input type="text" name="subArea" required><br><br>
            Total Population: <input type="text" name="totalPopulation" required><br><br>
            Number of Accounts: <input type="text" name="noOfAcc" required><br><br>
            Number of Credits: <input type="text" name="noOfCredit" required><br><br>
            Number of Debits: <input type="text" name="noOfDebit" required><br><br>
            Surveyor Name: <input type="text" name="surveyorName" required><br><br>
            <input type="submit" value="Submit" style="background-color: deepskyblue;">
        </form><br><br>

        <h2>Survey Details Table</h2>
        <table border="1" style="margin-left:0%;">
            <tr>
                <th>Sl. No</th>
                <th>Area</th>
                <th>Sub Area</th>
                <th>Total Population</th>
                <th>No. of Accounts</th>
                <th>No. of Credits</th>
                <th>No. of Debits</th>
                <th>Surveyor Name</th>
                <th>Actions</th>
            </tr>
            <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['sl.no']}</td>
                    <td>{$row['Area']}</td>
                    <td>{$row['SubArea']}</td>
                    <td>{$row['TotalPopulation']}</td>
                    <td>{$row['NoOfAcc']}</td>
                    <td>{$row['NoOfCredit']}</td>
                    <td>{$row['NoOfDebit']}</td>
                    <td>{$row['SurveyorName']}</td>
                    <td>
                        <form action='adminSurveyManage.php' method='post' style='display:inline-block;'>
                            <input type='hidden' name='id' value='{$row['sl.no']}'>
                            <input type='hidden' name='action' value='delete'>
                            <input type='submit' value='Delete'>
                        </form>
                        <button onclick=\"editRecord(
                            '{$row['sl.no']}', 
                            '{$row['Area']}', 
                            '{$row['SubArea']}', 
                            '{$row['TotalPopulation']}', 
                            '{$row['NoOfAcc']}', 
                            '{$row['NoOfCredit']}', 
                            '{$row['NoOfDebit']}', 
                            '{$row['SurveyorName']}'
                        )\">Edit</button>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No records found</td></tr>";
    }
    ?>
        </table>
    </div>
</body>
<script>
    function validateForm() {
        const totalPopulation = document.forms["surveyForm"]["totalPopulation"].value;
        const noOfAcc = document.forms["surveyForm"]["noOfAcc"].value;
        const noOfCredit = document.forms["surveyForm"]["noOfCredit"].value;
        const noOfDebit = document.forms["surveyForm"]["noOfDebit"].value;
        if (isNaN(totalPopulation) || isNaN(noOfAcc) || isNaN(noOfCredit) || isNaN(noOfDebit)) {
            alert("Please enter valid numbers for population, no of accounts, credits, and debits.");
            return false;
        }
        return true;
    }

    function editRecord(id, area, subArea, totalPopulation, noOfAcc, noOfCredit, noOfDebit, surveyorName) {
        document.forms["surveyForm"]["id"].value = id;
        document.forms["surveyForm"]["area"].value = area;
        document.forms["surveyForm"]["subArea"].value = subArea;
        document.forms["surveyForm"]["totalPopulation"].value = totalPopulation;
        document.forms["surveyForm"]["noOfAcc"].value = noOfAcc;
        document.forms["surveyForm"]["noOfCredit"].value = noOfCredit;
        document.forms["surveyForm"]["noOfDebit"].value = noOfDebit;
        document.forms["surveyForm"]["surveyorName"].value = surveyorName;
        document.forms["surveyForm"]["action"].value = "edit";
    }
</script>
</html>