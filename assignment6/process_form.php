<?php
// Start session
session_start();

// Set default success message
$success = false;

// Get form data
$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
$profile_picture = $_FILES['profile_picture'];

// Validate form data
if (empty($name) || empty($email) || empty($password) || empty($profile_picture)) {
    die("Please fill out all fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Save profile picture to server with unique filename
$target_dir = "uploads/";
$date = new DateTime('now', new DateTimeZone('UTC')); // Get current date and time in UTC timezone
if (isset($_POST['timezone'])) {
    $timezone = $_POST['timezone'];
    try {
        $date->setTimezone(new DateTimeZone($timezone)); // Convert to user's timezone
    } catch (Exception $e) {
        die("Invalid timezone: " . $timezone);
    }
} else {
    die("Timezone not specified.");
}
$timestamp = $date->format('YmdHis'); // Format timestamp with user's local date and time
$filename = $_FILES['profile_picture']['name']; // Get the original filename
$filename = str_replace(' ', '_', $filename);
$target_file = $target_dir . uniqid() . '_' . $timestamp . '_' . $filename;
if (move_uploaded_file($profile_picture["tmp_name"], $target_file)) {
    $success = true;
    // Save user data to CSV file
    $file = fopen("users.csv", "a");
    $data = array($name, $email, $target_file);
    fputcsv($file, $data);
    fclose($file);
}

// Set session cookie
setcookie("username", $name, time()+3600);

// Redirect to form page with success message
if ($success) {
    header("Location: index.php?success=1");
} else {
    header("Location: index.php?failed=1");
}
exit();
?>
