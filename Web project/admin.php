<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include "connection.php";

$user_id = null;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Adminlogin'])){
    $pass=$_POST['psw'];
    $user=$_POST['uname'];
    $sql = "SELECT * FROM `admin` WHERE `username` = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];
        echo "$storedPassword";
        if ($pass==$storedPassword) {
            $_SESSION['user_id'] = $user;
            $_SESSION['user_type'] = 'A';
            header("Location: Dashboard.php");
            exit();
        } else {
            $errorMessage = "Incorrect password . Please try again.";
        }
    } else {
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
    <link rel="icon" href="Images\logo.png" type="image/png">
</head>

<body>
    


    <!--login sheet-->
    <div id="id01" class="modal" style="display: block;">
        <form id="loginForm" class="modal-content animate" action="admin.php" method="post">
        <h2 style="margin: auto;color:blueviolet">Admin LogIn</h2>
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

                <button id="LogSubmit" type="submit" name="Adminlogin" value="login">Login</button>
            </div>

            
        </form>
    </div>


</body>


<script>
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
            echo "window.location.href = 'Dashboard.php';";
        }
        ?>
    }

    function toggleLogoutContainer() {
        var container = document.getElementById('logoutContainer');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'block';
    }

    
</script>

</html>