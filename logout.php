<?php
include 'inc/config/database.php';
session_start();

if (!empty($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    if (!empty($_SESSION['category'])) {
        $_SESSION['category'] = $userCategory;
    }

    if (isset($_COOKIE['remember_me'])) {
        $cookie_parts = explode(':', $_COOKIE['remember_me']);
        $token = end($cookie_parts);

        // Validate and sanitize token
        $token = filter_var($token, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Delete the user's token from the database
        $query = "DELETE FROM remember_me_tokens WHERE id= ? and category = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId, $userCategory]);

        // If a token was found and deleted, delete the cookie
        if ($stmt->rowCount() > 0) {
            setcookie('remember_me', '', time() - 86400);
        }
    }

    // Clear the session ID and category and log the user out
    $_SESSION = array();
    session_destroy();
}

header("Location: login.php");
