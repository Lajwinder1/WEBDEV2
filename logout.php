<?php
/************
    Name: Lajwinder Kaur
    Date: 2023-09-25
    Description: Logout Page
************/

session_start();

// Unset specific session variables related to your 'arts' and 'users' tables
unset($_SESSION['user_id']);
unset($_SESSION['is_admin']); 

session_destroy();


header("Location: index.php");
exit;
?>
