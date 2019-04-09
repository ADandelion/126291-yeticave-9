<?php
require_once 'db.php';
require_once 'data.php';
require_once 'functions.php';

$errors = [];

if ($is_auth === 1) {
    header("Location: /");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $required = ['email', 'password'];
    foreach ($required as $key) {
        if (empty($_POST[$key])|| trim($_POST[$key]) === '') {
            $errors[$key] = 'Это поле надо заполнить';
        }
    }

    if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Введите корректный email';
    }

    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($link,  $_POST['email']);
        $sql = "SELECT * FROM users WHERE `email` = '$email'";
        $res = mysqli_query($link, $sql);
    }

    $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

    if (empty($user)) {
        $errors['email'] = 'Такой пользователь не найден';
    }else if (!empty($_POST['password']) && !password_verify($_POST['password'], $user['password'])) {
            $errors['password'] = 'Неверный пароль';
    }

    if (count($errors) === 0) {
        $_SESSION['user'] = $user;
        header("Location: /");
    }
}

$content = include_template('login.php', [
    'errors' => $errors,
    'categories' => all_categories ($link)
]);

$layout_content = include_template('layout.php', [
    'categories' => all_categories ($link),
    'title' => $title,
    'is_auth' => 0,
    'user_name' => '',
    'content' => $content


]);

print($layout_content);