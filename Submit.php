<?php
//verify account
require 'AutoLoad.php'; // loads $layouts, $forms, the DB config, and autoloads classes
require 'Db_connect.php';
// 1. Get form values safely
$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

// 3. Hash the password
$hash = password_hash($password, PASSWORD_DEFAULT);

// 4. Insert into the database
$stmt = $mysqli->prepare(
    "INSERT INTO users (username, email, password) VALUES (?, ?, ?)"
);
if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}
$stmt->bind_param('sss', $username, $email, $hash);
if (!$stmt->execute()) {
    die('Database insert failed: ' . $stmt->error);
}
else {
    echo "User registered successfully.<br>";
}

// 5. Send the verification email
try {
    $sender = new Sender();
    $sender->sendVerification($email, $username);
} catch (Exception $e) {
    // Optionally log the error, but still allow the redirect
    error_log("Mail error: " . $e->getMessage());
}

// 6. Redirect the user to a “finish registration” page
header("Location:InternetAppCousre/Index.php?email=" . urlencode($email));
exit;

?>