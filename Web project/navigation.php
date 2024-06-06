<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $navBtn = $_POST['navBtn'];
    if ($navBtn === '1') { 
        include "dashpage.php";
    }elseif($navBtn=='2'){
        include "surveyorsmanage.php";
    } elseif ($navBtn === '3') {
        include "adminSurvey.php";
    } elseif ($navBtn === '4') {
        include "adminFaq.php";
    }elseif ($navBtn === '5') {
        include "applyLeave.php";
    }elseif ($navBtn === '6') {
        include "ResignForm.php";
    }elseif ($navBtn === '7') {
        include "Salary.php";
    }else {
        echo "Invalid navigation.";
    }
}
?>