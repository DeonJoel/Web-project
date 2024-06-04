<?php
session_start();


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
                                Welcome, <?php echo $user_id; ?>
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
</script>

</html>