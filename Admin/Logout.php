<?php
include("dataconnection.php");
session_start();


unset($_SESSION["adminid"]);

session_destroy();

header("location:admin login.php");
?>