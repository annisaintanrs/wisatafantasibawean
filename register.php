<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "bawean";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection error");
}

$notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $check_query = "SELECT * FROM login WHERE username='$username'";
    $check_result = mysqli_query($data, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $notification = "Username sudah digunakan!";
    } else {
        $insert_query = "INSERT INTO login (username, password, usertype) VALUES ('$username', '$password', 'user')";
        if (mysqli_query($data, $insert_query)) {
            $_SESSION["username"] = $username;
            header("location: user.php");
        } else {
            echo "Error: " . mysqli_error($data);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('login.png') no-repeat center center fixed;
            background-size: cover;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .notification {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: <?php echo empty($notification) ? 'none' : 'block'; ?>;
        }
    </style>
</head>
<body>

<div class="register-container">
    <center>
        <h1>Register</h1>
        <form action="#" method="POST">
            <div class="notification"><?php echo $notification; ?></div> <!-- Notifikasi -->
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <input type="submit" value="Register">
            </div>
        </form>
    </center>
</div>
  
</body>
</html>
