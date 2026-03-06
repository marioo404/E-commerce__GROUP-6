<?php
session_start();

// 1. LOG THE USER OUT

// Remove the "logged in" session variable and user_data.

unset($_SESSION['islogged_in']);
unset($_SESSION['user_data']);

session_destroy();

// 2. REDIRECT
header("Location: login.php");
exit;