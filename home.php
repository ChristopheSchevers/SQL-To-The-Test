<?php
session_start();

include('header.php');

echo "Welcome, ".$_SESSION['fname'];
?>