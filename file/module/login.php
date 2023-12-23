<?php
session_start();

$title = 'Data Barang';
include_once '../class/koneksi.php';

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = md5('{$password}') ";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) != 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = mysqli_fetch_array($result);

        header('location: index.php');
    } else {
        $errorMsg = "<p style=\"color:red;\">Gagal Login, silakan ulangi lagi.</p>";
    }
}


if (isset($errorMsg)) {
    echo '<div class="error-message">' . $errorMsg . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #ffffff;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    padding: 20px;
    text-align: center;
}

h2 {
    color: #333333;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.input {
    margin-bottom: 16px;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #cccccc;
    border-radius: 4px;
}

.submit {
    margin-top: 16px;
}

.error-message {
    color: red;
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="post">
        <div class="input">
            <label for="user">Username</label>
            <input type="text" name="user" id="user" required>
        </div>
        <div class="input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>



</body>
</html>
