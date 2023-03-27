<?php
require_once "inc/db.php";
// Start the session
session_start();

if(isset($_POST['submit'])) {
	// Get the form data
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Check if both fields are filled
	if(empty($email) || empty($password)) {
		header("Location: login.php?error=1");
        $_SESSION['error'] = "Both filed are required";
		exit;
	}

    // Retrieve the email and password from database
    $sql = "SELECT firstname, email, password FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Validate the login credentials
        if($email == $row['email'] && $password == $row['password']) {
            // If the login is successful, store the first name in a session variable and redirect to the welcome page
            $_SESSION['first_name'] = $row['firstname'];
            header("Location: index.php");
            exit;
        }
    }

    // If the login is unsuccessful, redirect back to the login form with an error message
    header("Location: login.php?error=1");
    $_SESSION['error'] = "Invalid login credentials";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
    <header>
        <nav>
            <a href="register.php">
                <button>Register</button>
            </a>
        </nav>
    </header>

	<h1>Login Form</h1>
	<?php
	if(isset($_GET['error'])) {
		echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
	}
	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>
