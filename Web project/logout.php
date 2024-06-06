<?php
session_start();

// Unset the session variable
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);

session_destroy();
?>