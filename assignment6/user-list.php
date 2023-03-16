<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
        <div class="container">
            <div class="row" style="align-items:center;justify-content:space-between;">
                <h2>User List</h2>
                <a style="color:#fff;display:block;" href="index.php"><button>Form</button></a>   
            </div>
            <div class="row">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                    </tr>
                    <?php
                    $file = fopen("users.csv", "r");
                    while (($data = fgetcsv($file)) !== FALSE) {
                        echo "<tr>";
                        echo "<td>" . $data[0] . "</td>";
                        echo "<td>" . $data[1] . "</td>";
                        echo "<td><img width='50px' src='" . $data[2] . "' alt='Profile Picture' width='100'></td>";
                        echo "</tr>";
                    }
                    fclose($file);
                    ?>
                </table>
        </div>
    </div>
</body>
</html>