<?php
require_once 'db.php';
require_once 'data.php';
require_once 'functions.php';


$searchQuery = $_GET['search'] or $_GET['find'] ;
$search_result = search_query($link, $searchQuery );

if(empty(trim($searchQuery))){
    header('Location: /');

}elseif (empty($search_result)) {
    $layout_content = include_template('404.php', [
        'is_auth' => $is_auth,
        'title' => $title,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'categories' => all_categories ($link),
        'error' => 'ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО'
    ]);
    print($layout_content);
    exit();
}



$content = include_template('search.php', [
    'categories' => all_categories ($link),
    'search_result' => $search_result
]);

$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'title' => $title,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $content,
    'categories' => all_categories ($link)

]);

print($layout_content);