<?php
session_start();

// Check if the user is not logged in, redirect them to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch additional user details from the database using the user_id
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Page</title>
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
                                Welcome, <?php echo $user_id; ?><img src="Images/user.png" alt="" id="UserIcon" style="filter: invert(100%);">
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


    <!-- section to select the area -->
    <section class="areaselction">
        <h2 id="titleOfsecAreaSelec">Select the area:</h2>
        <input type="text" id="searchInput" oninput="filterButtons()" placeholder="Search by Name... ">
        <div class="containerPg2" id="buttonContainer">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "surveydata";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT DISTINCT `Area` FROM `surveydtails`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<button class="btnSelectArea" onclick="displayDetails(\'' . $row["Area"] . '\')">' . $row["Area"] . '</button>';
                }
            } else {
                echo "No cities found in the database.";
            }

            ?>
        </div>
    </section>

    <hr>

    <!-- Container for logout button -->
    <div class="logCont" id="logoutContainer" style="display: none;">
        <button onclick="logout()">Logout</button>
    </div>

    <section class="detailView">
        <!-- Details container -->
        <div id="tableDisplay"></div>
        </div>
    </section>

    <footer id="ContactSection">
        <div class="footer-container">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p>Email: info@example.com</p>
                <p>Phone: +1 (123) 456-7890</p>
                <p>Address: 123 Main Street, Cityville</p>
            </div>
            <div class="social-icons">
                <h2>Follow Us on</h2>
                <a href="#" target="_blank"><img src="Images/facebook-icon.png" alt="Facebook"></a>
                <a href="#" target="_blank"><img src="Images/twitter-icon.png" alt="Twitter"></a>
                <a href="#" target="_blank"><img src="Images/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 Your Company. All Rights Reserved.</p>
            <p>Designed by Adarsh and Arun</p>
            <p>Programmed by Deon</p>
            <p>Project Submission Date: December 1, 2023</p>
            <p>This is a design for a college project work of St. Mary's College. Not to be used for any commertial purpose</p>
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
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Redirect to the login page after successful logout
                window.location.href = 'index.php';
            }
        };
        xmlhttp.open("GET", "logout.php", true);
        xmlhttp.send();
    }


    // filtering the buttons
    function filterButtons() {
        var input = document.getElementById('searchInput').value.toLowerCase();
        var container = document.getElementById('buttonContainer');
        var buttons = container.getElementsByClassName('btnSelectArea');

        for (var i = 0; i < buttons.length; i++) {
            var buttonText = buttons[i].innerText.toLowerCase();
            if (buttonText.includes(input)) {
                buttons[i].style.display = 'inline-block';
            } else {
                buttons[i].style.display = 'none';
            }
        }
    }

    // displaying the table
    function displayDetails(buttonName) {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('tableDisplay').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "fetch_data.php?button=" + buttonName, true);
        xmlhttp.send();
    }
</script>

</html>