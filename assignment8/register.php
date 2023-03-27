<?php
require_once "inc/db.php";
session_start();

if(isset($_POST['submit'])) {
	// Get the form data
	$first_name = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_SPECIAL_CHARS);
	$last_name = filter_input(INPUT_POST,'last_name',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);;
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	// Check if all fields are filled
	if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
		echo "All fields are required and must not be empty.";
		exit;
	}

	// Check if the email address is valid
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Email address is not valid.";
		exit;
	}

    // Check if password grater than 6 character
    if(strlen($password) < 6){
        echo "Password must be 6 character";
        exit;
    }

	// Check if the password and confirm password fields match
	if($password != $confirm_password) {
		echo "Password and confirm password fields do not match.";
		exit;
	}

	// If all validations are passed, display the confirmation message
    $_SESSION['success'] = "Thank you for registering, $first_name $last_name!";


    // Store data into database
	$sql = "INSERT INTO users (firstname, lastname, email, password)
            VALUES ('$first_name', '$last_name', '$email','$password')";
    
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        header("Location: register.php?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);


    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
<header>
        <nav>
            <a href="login.php">
                <button>Login</button>
            </a>
        </nav>
    </header>

	<h1>Registration Form</h1>
    <?php 
        if(isset($_SESSION['success']) && isset($_GET['success'])){
            echo '<p style="color:green;font-weight:bold;">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['error']) && isset($_GET['error'])){
            echo '<p style="color:red;font-weight:bold;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
    ?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<label>First Name:</label>
		<input type="text" name="first_name"><br><br>

		<label>Last Name:</label>
		<input type="text" name="last_name"><br><br>

		<label>Email Address:</label>
		<input type="email" name="email"><br><br>

		<label>Password:</label>
		<input type="password" name="password"><br><br>

		<label>Confirm Password:</label>
		<input type="password" name="confirm_password"><br><br>

		<input type="submit" name="submit" value="Registration">
	</form>
</body>
</html>
