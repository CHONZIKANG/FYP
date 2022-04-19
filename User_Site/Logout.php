<?php
include("dataconnection.php");
session_start();


unset($_SESSION["userid"]);
session_destroy();

header("location:Login.php");
?>