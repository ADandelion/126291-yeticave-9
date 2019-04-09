<?php
$db = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => '126291-yeticave-9'
];

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

if(!$link) {
    die ('Ошибка подключения');
}

mysqli_set_charset($link, "utf8");