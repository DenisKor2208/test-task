<?php
require_once 'init.php';

echo Session::flash('auth_success') . '<br>';
$user = new User;
$db = Database::getInstance();
$db = $db->query('SELECT * FROM users');

if ($user->isLoggedIn()) {
    echo "Hi, <a href='#'>{$user->data()->username}</a>";
    echo "<p><a href='logout.php'>Logout</a></p>";
    echo "<p><a href='update.php'>Update profile</a></p>";
    echo "<p><a href='changepassword.php'>Change password</a></p>";

    if ($user->hasPermissions('admin')) {
        echo 'You are admin';
    }
} else {
    echo "<a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
}


?>


