<?php
//i have included the functions related to the task 3 in this PHP file.all the function for the logging system is included in this file
session_start();


include 'function.php';


$conn = connectDatabase();


function registerUser($username, $password) {
    global $conn;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    
    return $stmt->affected_rows > 0;
}

function loginUser($username, $password) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

if (is_array($user) && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    return true;
}

return false;
}


function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function logoutUser() {
    unset($_SESSION['user_id']);
    session_destroy();
}

?>
