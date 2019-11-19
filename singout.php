<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['isadmin']);
header("Location: index.php");
?>