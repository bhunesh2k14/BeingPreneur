<?php
session_start();
if(isset($_SESSION))
{
    // remove all session variables
session_unset();

// destroy the session
session_destroy();
  echo "<script>window.open('../index.html','_self')</script>";
}
?>
