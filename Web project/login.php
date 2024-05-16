<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include "connection.php";

$NextPg = "Survey.php";
$user_id = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["uname"];
    $pass = $_POST["psw"];

    $sql = "SELECT * FROM users WHERE UserName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['Password'];

        if ($pass == $storedPassword) {
            $_SESSION['user_id'] = $user; // Store user ID or other relevant information
            header("Location: " . $NextPg);
            exit();
        } else {
            echo "<script>
            alert('Incorrect Password');
            </script>";
            $errorMessage = "Incorrect password. Please try again.";
        }
    } else {
        echo "<script>
            alert('Incorrect User Name');
            </script>";
        $errorMessage = "Incorrect User Name. Please try again.";
    }
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

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
                    <li><a href="#HomeSection" id="homeSec">Home</a></li>
                    <li><a href="#AboutSection" id="AboutSec">About</a></li>
                    <li><a href="#FaqSection" id="FaqSec">FaQ</a></li>
                    <li><a onclick="login()">Survey Details</a></li>
                    <li><a href="#ContactSection" id="ContactSec">Contact Us</a></li>
                    <li><a id="logDetail" onclick="toggleLogoutContainer()">
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
    <img src="Images/79.png" alt="Bank" class="backGroundImg">


    <!-- <div>
        <button onclick="document.getElementById('id01').style.display='block'">LOGIN</button>
    </div> -->



    <!-- marquee type image -->
    <div class="marImg">
        <div class="carousel">
            <img src="Images/1.jpg" alt="Image 1">
            <img src="Images/2.jpg" alt="Image 2">
            <img src="Images/3.jpg" alt="Image 3">
            <img src="Images/4.jpg" alt="Image 2">
            <img src="Images/5.jpg" alt="Image 3">
        </div>
    </div>


    <section id="HomeSection">
        <div style="height: 40px;"></div>
        <!-- home page details -->
        <div class="detailsHome">
            <h3>The Art is not in making money, but in keeping it:</h3>
            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We must prioritise saving money instead of spending it, and only plan our
                expenses from the balance that is
                left after saving.It's not easy saving when we're faced with a rising cost of living or when our
                expenses
                eat up most (or all) of our income. Review your expenses - particularly the big ones like mortgage or
                rent
                and food - to see if there are any costs that could be reduced and redirected into a savings fund.</p>
            <span> "Do not save what is left after spending, but spend what is left after saving." - Warren
                Buffett</span>
            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When the fourth wealthiest person in the world talks about money, it
                makes sense to listen. Known for
                living simply despite
                his means, we couldn't agree more with this bit of advice from Warren Buffett. If you don't make putting
                money away for the future a priority, you'll never get around to doing it. And when you need it, it
                won't be
                there. Starting and sticking to a savings plan is &nbsp something you'll never regret.
            </p>
        </div>
    </section>


    <section id="AboutSection">
        <!-- <div style="height: 40px;"></div> -->
        <h1>About:</h1>
        <div id="Abt1" class="Abtbox">
            <h3>What is this web?</h3>
            <p>This web is for all the Banks to get detailed idea on the number of pepole havinga account in specific
                Village/Town/City. This will help banks too reach out to people to help them get started with their new
                bank account.
            </p>
        </div>
        <div id="Abt2" class="Abtbox">
            <h3>What are we?</h3>
            <p>We are the students of BCA final year trying to help out banks reach to the needed people in backward
                areas. This web is still just a project idea and is not been published. We are trying to give a good
                user experience</p>
        </div>
        <div id="Abt3" class="Abtbox">
            <h3>Aim:</h3>
            <p>Make it posible for everyone in the socity to have a bank account. Help the county to reach the rank of
                developed. </p>
        </div>
    </section>


    <section id="FaqSection">
        <div id="FaqContent">
            <div><img src="Images/faq.png" alt="FaQ" id="FaqImg">
            </div>
            <div class="faqQuestions">
                <div></div>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
                <h3>1. What service are you providing?</h3>
                <p>
                    We provide the servay details of the banking and non banking people in different areas o fthe
                    country.
                </p>
                <hr>
            </div>
        </div>
        <div class="FaqMoreBtn">
            <button id="btnClickMore">More &#x2193; </button>
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


    <!-- Container for logout button -->
    <div class="logCont" id="logoutContainer" style="display: none;">
        <button onclick="logout()">Logout</button>
    </div>


    <!--login sheet-->
    <div id="id01" class="modal">
        <form id="loginForm" class="modal-content animate" action="index.php" method="post">
            <div class="container">
                <img src="Images\b233c1612a5f8e1ce5500c3bd4c66fbe.jpg" alt="Login Sheet">

                <input class="loInput" type="text" placeholder=" " name="uname" required onclick="clickIn()">
                <label class="logLab" for="uname" id="useed"><b>Username</b></label>
                <span class="error" id="uname-error"></span>

                <input class="loInput" type="password" placeholder=" " name="psw" required id="passWd" onclick="clickIn()">
                <label class="logLab" for="psw" id="pass"><b>Password</b></label>
                <button type="button" id="togglePassword" onclick="togglePasswordField()">Show Password</button>
                <span class="error" id="psw-error"></span>
                <?php if (isset($errorMessage)) : ?>
                    <p id="ErrMsg" style="color: red;"><?php echo $errorMessage; ?></p>
                <?php endif; ?>

                <button id="LogSubmit" type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>


</body>


<script>
    // Get the modal
    var modal = document.getElementById('id01');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    //show password
    function togglePasswordField() {
        const passwordField = document.getElementById("passWd");
        var p1 = passwordField.textContent;
        const togglePasswordButton = document.getElementById("togglePassword");
        if (passwordField.type == "password") {
            passwordField.type = "text";
            passwordField.textContent = "";
            togglePasswordButton.textContent = "Hide Password";
        } else {
            passwordField.type = "password";
            togglePasswordButton.textContent = "Show Password";
        }
    }

    function login() {
        <?php
        if ($user_id == NULL) {
            echo "document.getElementById('id01').style.display = 'block';";
        } else {
            echo "window.location.href = 'Survey.php';";
        }
        ?>
    }

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

    // smooth scrool
    document.querySelectorAll('a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 150,
                    behavior: 'smooth'
                });
            }
        });
    });



    //change color on scroll
    const homeSec = document.getElementById("HomeSection");
    const aboutSec = document.getElementById("AboutSection");
    const faqSec = document.getElementById("FaqSection");
    const contactSec = document.getElementById("ContactSection");

    const homeNavItem = document.getElementById("homeSec");
    const aboutNavItem = document.getElementById("AboutSec");
    const faqNavItem = document.getElementById("FaqSec");
    const contactNavItem = document.getElementById("ContactSec");

    function changeBackgroundOnScroll(section, menuItem) {
        const sectionRect = section.getBoundingClientRect();
        if (section == contactSec && sectionRect.top <= 500 && sectionRect.bottom >= 0) {
            // The section is in the viewport
            menuItem.style.backgroundColor = "#eff8f5";
            menuItem.style.color = "#5f0282";
        } else {
            if (section == faqSec && sectionRect.top <= 250 && sectionRect.bottom >= 400) {
                // The section is in the viewport
                menuItem.style.backgroundColor = "#eff8f5";
                menuItem.style.color = "#5f0282";
            } else {
                if (section != faqSec && sectionRect.top <= 250 && sectionRect.bottom >= 150) {
                    // The section is in the viewport
                    menuItem.style.backgroundColor = "#eff8f5";
                    menuItem.style.color = "#5f0282";
                } else {
                    // The section is not in the viewport
                    menuItem.style.backgroundColor = "";
                    menuItem.style.color = "";
                }
            }
        }
    }
    window.addEventListener("scroll", function() {
        changeBackgroundOnScroll(homeSec, homeNavItem);
        changeBackgroundOnScroll(aboutSec, aboutNavItem);
        changeBackgroundOnScroll(faqSec, faqNavItem);
        changeBackgroundOnScroll(contactSec, contactNavItem);
    });




    // change image in the top
    function changeImage() {
        const carousel = document.querySelector('.carousel');
        const firstImage = carousel.firstElementChild;
        carousel.removeChild(firstImage);
        carousel.appendChild(firstImage);
    }

    setInterval(changeImage, 5000);

    //change the height of the Faq on click
    const faqCon = document.getElementById("FaqContent");
    const btnMore = document.getElementById("btnClickMore");
    var flg = 0;

    btnMore.addEventListener("click", function() {
        if (flg === 0) {
            flg = 1;
            faqCon.style.maxHeight = "none";
            btnMore.innerHTML = "show less &#x2191";
        } else {
            flg = 0;
            faqCon.style.maxHeight = "";
            btnMore.innerHTML = "More &#x2193";
        }
    });

    const cl = document.getElementsByClassName("loInput");
    const ermsg = document.getElementById("ErrMsg");

    function clickIn() {
        ermsg.style.display = "none";
    }
</script>

</html>