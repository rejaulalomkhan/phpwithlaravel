<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    
</head>
<body>
    <div class="container">
        <div class="row" style="justify-content:center;">
            <div>
                <p>
                    <?php 
                        $success = isset($_GET['success']) && $_GET['success'] == 1;
                        $failed = isset($_GET['failed']) && $_GET['failed'] == 1;
                        if ($success) {
                            echo "<p>Form submitted successfully!</p>";
                        }
                        if ($failed){
                            echo "<p>Something went wrong. Please try again later!</p>";
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="row" style="justify-content:center;align-items:center">
            <div class="column-80">
                <h2>Simple Form</h2>
                <a style="color:#fff;margin-left:20px;" href="user-list.php"><button>User List</button></a>
            </div>
        </div>
        <div class="row" style="justify-content:center;">
            <form action="process_form.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
                <input type="text" name="name">

                <label>Email:</label>
                <input type="text" name="email">
                
                <label>Password:</label>
                <input type="password" name="password">
                
                <label>Profile Picture:</label>
                <input type="file" name="profile_picture" required>
                
                <input type="hidden" name="timezone" id="timezone">
                <input type="submit" value="Submit" onclick="setTimezone()">
            </form>

            <script>
                function setTimezone() {
                var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    document.getElementById("timezone").value = timezone;
                }
            </script>  
        </div>
    </div>  
</body>
</html>