<?php
require_once "inc/db.php";
session_start();
session_destroy();
header("Location: login.php");
exit;
?>
