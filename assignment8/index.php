<?php
require_once "inc/db.php";
// Start the session
session_start();

// Check if the first name is stored in the session variable
if(isset($_SESSION['first_name'])) {
	$_SESSION['first_name'];
} else {
	// If the first name is not stored in the session variable, redirect back to the login form
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <header>
        <nav>
            <a href="login.php">
                <button>Logout</button>
            </a>
        </nav>
    </header>
    <?php 
        if(isset($_SESSION['first_name'])) {
            echo "Welcome, " . $_SESSION['first_name'] . "!";
        }        
    ?>
</body>
</html>
