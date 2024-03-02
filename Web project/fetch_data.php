<?php
// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "surveydata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the button name from the GET request
if (isset($_GET['button'])) {
    $buttonName = $_GET['button'];


    $sql = "SELECT * FROM surveydtails WHERE Area ='$buttonName'";
    $result = $conn->query($sql);

    // Display the fetched data in a table
    echo "
    <table>
        <thead>
            <tr>
                <th id='titleDtail' colspan='7'>$buttonName</th>
            </tr>
            <tr>
                <th>Sl.No</th>
                <th>Sub Area</th>
                <th>Total population</th>
                <th>No.of people with Bank account</th>
                <th>No. Of People with Credit card</th>
                <th>No. Of People with Debit card</th>
                <th>Chart..</th>
            </tr>
        </thead>";
        $sno=0;
    while ($row = $result->fetch_assoc()) {
        $sno=$sno+1;
        echo "<tbody id='tbody'>
        <tr>
                <td>" . $sno . "</td>
                <td>" . $row['SubArea'] . "</td>
                <td>" . $row['TotalPopulation'] . "</td>
                <td>" . $row['NoOfAcc'] . "</td>
                <td>" . $row['NoOfCredit'] . "</td>
                <td>" . $row['NoOfDebit'] . "</td>
            </tr>
            </tbody>";
    }

    echo "</table>";
} else {
    echo "Invalid request";
}

$conn->close();
