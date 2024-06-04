<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        $firstName = $_POST['RigFname'].' ';
        $middleName = $_POST['RigMname'].' ';
        $lastName = $_POST['RigLname'];
        $username = $_POST['uname'];
        $password = $_POST['Rpsw'];
        $confirmPassword = $_POST['Cpsw'];
        $remember = isset($_POST['remember']) ? 1 : 0;
        $name = $firstName . '' . $middleName . '' . $lastName;
    
        // Check if passwords match
        if ($password != $confirmPassword) {
            die("Passwords do not match.");
        }
    
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, UserName, Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $username, $password);
    
        if ($stmt->execute() && $remember==1) {
            $_SESSION['user_id'] = $username;
            header("Location: " . $NextPg);
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        // Close the statement 
        $stmt->close();
    }
?>