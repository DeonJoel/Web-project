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
    <title>Admin Hub</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="headM" style="width: 85%;right: 0%;border-radius: 0%;z-index: 2;">
        <div id="main_head">
            <h1 id="main_heading_text">
                Rural Bank Accounting Survey
            </h1>

            <h6 id="main_heading_abr">(RuBAS)</h6>
        </div>
    </header>

    <!-- header and navigation bar -->
    <header class="headM"
        style="display: flex; flex-direction:column;border-radius: 0%;width: 15%;float: left;margin: 0%;left: 0%;height: 100%;border-right: 4px solid #f535f1;">
        <div id="main_head">
            <h1 id="main_heading_text">
                Admin Hub
            </h1>

        </div>
        <diV class="navOut" style="margin-top: 26%;">
            <nav class="navbar">
                <ul style="display: flex;flex-direction: column;">
                    <li id="homeSecOut"><a href="#Home" id="homeSec">Dashboard</a></li><br>
                    <li id="AboutSecOut"><a href="#About" id="AboutSec">Serveyors Management</a></li><br>
                    <li id="FaqSecOut"><a href="#Faq" id="FaqSec">Survey</a></li><br>
                    <li id="homeSecOut"><a href="#Faq" id="FaqSec">Manage User</a></li><br>
                    <li id="homeSecOut"><a href="#Faq" id="FaqSec">FAQ</a></li><br>
                    <li id="homeSecOut"><a onclick="login()">Survey Details</a></li><br>
                    <li id="ContactSecOut"><a href="#ContactSection" id="ContactSec">Contact Us</a></li>
                    <li><a id="logDetail" onclick="toggleLogoutContainer()">
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
    <img src="Images/79.png" alt="Bank" class="backGroundImg">

    <div id="displayArea"></div>

    <section id="Home" style="width: 85%;margin-right: 0%;">
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


    <section id="About" style="width: 85%;margin-right: 0%;">
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


    <section id="Faq" style="width: 85%;margin-right: 0%;">
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

                <input class="loInput" type="password" placeholder=" " name="psw" required id="passWd"
                    onclick="clickIn()">
                <label class="logLab" for="psw" id="pass"><b>Password</b></label>
                <button type="button" id="togglePassword" onclick="togglePasswordField()">Show Password</button>
                <span class="error" id="psw-error"></span>
                <?php if (isset($errorMessage)) : ?>
                <p id="ErrMsg" style="color: red;">
                    <?php echo $errorMessage; ?>
                </p>
                <?php endif; ?>

                <button id="LogSubmit" type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>


</body>


<script>
    // Get the modal
    var modal = document.getElementById('id01');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
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
        xmlhttp.onreadystatechange = function () {
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
        anchor.addEventListener('click', function (e) {
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
    const homeSec = document.getElementById("Home");
    const aboutSec = document.getElementById("About");
    const faqSec = document.getElementById("Faq");
    const contactSec = document.getElementById("ContactSection");

    const homeNavItem = document.getElementById("homeSec");
    const aboutNavItem = document.getElementById("AboutSec");
    const faqNavItem = document.getElementById("FaqSec");
    const contactNavItem = document.getElementById("ContactSec");

    const homeNavout = document.getElementById("homeSecOut");
    const aboutNavout = document.getElementById("AboutSecOut");
    const faqNavout = document.getElementById("FaqSecOut");
    const contactNavout = document.getElementById("ContactSecOut");

    
    function changeBackgroundOnScroll(section, menuItem,box) {
        const sectionRect = section.getBoundingClientRect();
        if (section == contactSec && sectionRect.top <= 500 && sectionRect.bottom >= 0) {
            // The section is in the viewport
            box.style.backgroundColor = "#eff8f5";
            menuItem.style.color = "#5f0282";
        } else {
            if (section == faqSec && sectionRect.top <= 250 && sectionRect.bottom >= 400) {
                // The section is in the viewport
                box.style.backgroundColor = "#eff8f5";
                menuItem.style.color = "#5f0282";
            } else {
                if (section != faqSec && sectionRect.top <= 250 && sectionRect.bottom >= 150) {
                    // The section is in the viewport
                    box.style.backgroundColor = "#eff8f5";
                    menuItem.style.color = "#5f0282";
                } else {
                    // The section is not in the viewport
                    box.style.backgroundColor = "";
                    menuItem.style.color = "";
                }
            }
        }
    }
    window.addEventListener("scroll", function () {
        changeBackgroundOnScroll(homeSec, homeNavItem,homeNavout);
        changeBackgroundOnScroll(aboutSec, aboutNavItem,aboutNavout);
        changeBackgroundOnScroll(faqSec, faqNavItem,faqNavout);
        changeBackgroundOnScroll(contactSec, contactNavItem,contactNavout);
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

    btnMore.addEventListener("click", function () {
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