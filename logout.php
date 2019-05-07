<?php
session_start();
if(isset($_SESSION))
{
    // remove all session variables
session_unset();

// destroy the session
session_destroy();
header("location: ../index.php");
}
?>
