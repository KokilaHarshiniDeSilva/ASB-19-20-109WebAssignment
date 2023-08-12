<?php
//I have created a form in different web page for the loging system in task 3 and codes related to that included in this file.
require_once('User_data.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (registerUser($username, $password)) {
            $message = "Registration successful!";
        } else {
            $message = "Registration failed.";
        }
    } elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (loginUser($username, $password)) {
            header('Location: dashboard.php');
            exit;
        } else {
            $message = "Login failed.";
        }
    }
}


if (isset($_GET['logout'])) {
    logoutUser();
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration</title>
</head>
<body>
    <?php if (isLoggedIn()) : ?>
        <h1>Welcome, User!</h1>
        <p>This is your dashboard.</p>
        <a href="?logout">Logout</a>
    <?php else : ?>
        <h1>Login</h1>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" name="login">Login</button>
            <button type="submit" name="register">Register</button>
        </form>
    <?php endif; ?>
</body>
</html>
