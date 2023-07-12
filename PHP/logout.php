<?php
// core configuration
include_once "config/core.php";
 
session_unset();
session_destroy();
  
//redirect to login page
header("Location: {$home_url}Homepage.php");
?>