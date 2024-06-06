<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $user = $_POST["uname"];
        $pass = $_POST["psw"];
        $surveyor=isset($_POST["surveior"]) ? 1 : 0;
        $errorMessage='';
        if($surveyor===1){
            $sql = "SELECT * FROM surveior WHERE ServName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $storedPassword = $row['Password'];
        
                if ($pass == $storedPassword) {
                    $_SESSION['user_id'] = $user; // Store user ID or other relevant information
                    $_SESSION['user_type'] = 'S';
                    header("Location:SurveyorPage.php" );
                    exit();
                } else {
                    // echo "<script>
                    // alert('Incorrect Password');
                    // </script>";
                
                    $errorMessage = "Incorrect password. Please try again.";
                }
            } else {
                // echo "<script>
                // alert('Incorrect User Name');
                // </script>";
                $errorMessage = "Incorrect User Name. Please try again.";
            }
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST"){
            $sql = "SELECT * FROM users WHERE UserName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $storedPassword = $row['Password'];
        
                if ($pass == $storedPassword) {
                    $_SESSION['user_id'] = $user; 
                    $_SESSION['user_type'] = 'U';
                    header("Location: " . $NextPg);
                    exit();
                } else {
                    // echo "<script>
                    // alert('Incorrect Password');
                    // </script>";
                
                    $errorMessage = "Incorrect password. Please try again.";
                }
            } else {
                // echo "<script>
                // alert('Incorrect User Name');
                // </script>";
                $errorMessage = "Incorrect User Name. Please try again.";
            }
        }
    }
?>