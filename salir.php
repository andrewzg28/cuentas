<?php 
include('baseurl.php');
session_start();
session_destroy();
header("Location: " . $baseurl);
?>