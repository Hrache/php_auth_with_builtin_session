<?php

// Secrets
$secret = '$2y$10$E0TdUGjYhAUt384zVoZW/e1QYE8BnZ7OD08EqhBvrggbUL5Bsd2f6';

// This is without database version, so I am storing user related info conditionally in the variable below
$user = [
    'email' => 'user@mail.cold',
    // probably will realize, it is for authenticated state
    'authtoken' => ''
];

if (
    isset($_POST['authaction'])
) {
    // Login
    if (
        $_POST['authaction'] === 'login' &&
        !isset($_SESSION['user']) &&
        isset($_POST['email'], $_POST['password']) &&
        $_POST['email'] === $user['email'] &&
        password_verify(
            $_POST['password'],
            $secret
        )
    ) {
        // Setting the auth_token
        $user['authtoken'] = md5(strtotime('now'));

        $_SESSION['user'] = $user;

        // Messages for successful login
        $_SESSION['message'] = [
            'You have logged in successfully!'
        ];
    }
    // Logout
    else if (
        $_POST['authaction'] === 'logout' &&
        isset($_POST['authtoken']) &&
        isset($_SESSION['user']) &&
        $_SESSION['user']['authtoken'] === $_POST['authtoken']
    ) {
        session_unset();
        session_destroy();
        session_abort();

        // Messages for successful login
        $_SESSION['message'] = [
            'You have been logged out successfully!'
        ];
    }
}