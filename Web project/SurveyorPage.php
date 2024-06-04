<?php
session_start();

// Check if the user is not logged in, redirect them to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch additional user details from the database using the user_id
$user_id = $_SESSION['user_id'];

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

// Fetch all records
$result = $conn->query("SELECT * FROM surveydtails");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surveyor Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- background of the whole page fixed-->
    <img src="Images/79.png" alt="Bank" class="backGroundImg">

    <!-- header and navigation bar -->
    <header class="headM">
        <div id="main_head">
            <h1 id="main_heading_text">
                Rural Bank Accounting Survey
            </h1>
            <h6 id="main_heading_abr">(RuBAS)</h6>
        </div>
        <diV class="navOut">
            <nav class="navbar">
                <ul>
                    <li><a href="index.php#HomeSection" id="homeSec">Main Page</a></li>
                    <li><a id="SurvBtn">Survey Details</a></li>
                    <li id="log"><a id="logDetail" onclick="toggleLogoutContainer()">
                            <?php if (isset($user_id)) : ?>
                            Welcome,
                            <?php echo $user_id; ?>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </diV>
    </header>

    <!-- used simply for spacing -->
    <div class="Spacetop">
        <ul class="marquee">
            <li><img src="" alt=""></li>
        </ul>
    </div>

    <div style="margin-top: 5%;">
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
            <input type="submit" value="Submit">
        </form>

        <h2>Survey Details Table</h2>
        <table border="1">
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
                        <form action='' method='post' style='display:inline-block;'>
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




    <!-- Container for logout button -->
    <div class="logCont" id="logoutContainer" style="display: none;">
        <button onclick="logout()">Logout</button>
    </div>


    <footer id="ContactSection">
        <div class="footer-container">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p>Email: info@example.com</p>
                <p>Phone: +1 (123) 456-7890</p>
                <p>Address: 123 Main Street, Cityville</p>
            </div>
            <div class="social-icons">
                <h2>Follow Us</h2>
                <a href="#" target="_blank"><img src="path/to/facebook-icon.png" alt="Facebook"></a>
                <a href="#" target="_blank"><img src="path/to/twitter-icon.png" alt="Twitter"></a>
                <a href="#" target="_blank"><img src="path/to/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 Your Company. All Rights Reserved.</p>
            <p>Designed by Adarsh and Arun</p>
            <p>Programmed by Deon</p>
            <p>Project Submission Date: December 1, 2023</p>
            <p>This is a design for a college project work of St. Mary's College. Not to be used for any commertial
                purpose</p>
        </div>
    </footer>
</body>


<script>
    // logout n detail of log
    function toggleLogoutContainer() {
        var container = document.getElementById('logoutContainer');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }

    function logout() {
        // Make an AJAX request to logout.php
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Redirect to the login page after successful logout
                window.location.href = 'index.php';
            }
        };
        xmlhttp.open("GET", "logout.php", true);
        xmlhttp.send();
    }

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
</script>------------------------------------------------------------


<body>



</body>

</html>

<?php
$conn->close();
?>