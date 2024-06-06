<?php
    include "connection.php";
    $sql="SELECT * FROM `users`";
    $result = $conn->query($sql);
    $num_users = $result->num_rows;

    $sql1 = "SELECT DISTINCT `Area` FROM `surveydtails`";
    $result1 = $conn->query($sql1);
    $num_area=$result1->num_rows;

    $sql2="SELECT * FROM `surveior`";
    $result2 = $conn->query($sql2);
    $num_surveyors = $result2->num_rows;

    $sql3="SELECT * FROM `faq` WHERE `approval`!='not-approved'  AND status='NA' ";
    $result3 = $conn->query($sql3);
    $num_faq = $result3->num_rows;


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    margin: 0;
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    gap: 20px;
}

.box {
    width: 200px;
    height: 100px;
    background-color: #3a69b4;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.content {
    text-align: center;
}

.number {
    font-size: 24px;
    font-weight: bold;
}

.label {
    display: block;
    margin-top: 5px;
    font-size: 16px;
}

</style>
</head>
<body>
    <div class="container">
        <div class="box" id="users">
            <div class="content">
                <span class="number"><?php echo"$num_users";?></span>
                <span class="label">No of Users</span>
            </div>
        </div>
        <div class="box" id="area-surveyed">
            <div class="content">
                <span class="number"><?php echo"$num_area";?></span>
                <span class="label">Total Area Surveyed</span>
            </div>
        </div>
        <div class="box" id="surveyors">
            <div class="content">
                <span class="number"><?php echo"$num_surveyors";?></span>
                <span class="label">Surveyors Present</span>
            </div>
        </div>
        <div class="box" id="questions">
            <div class="content">
                <span class="number"><?php echo"$num_faq";?></span>
                <span class="label">Un-Answered FAQs </span>
            </div>
        </div>
    </div>
</body>
</html>
