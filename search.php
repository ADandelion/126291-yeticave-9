<?php
require_once 'db.php';
require_once 'data.php';
require_once 'functions.php';


define('LOTS_PER_PAGE', '3');

$searchQuery = $_GET['search'] or $_GET['find'] ;

if(empty(trim($searchQuery))){
    header('Location: /');
}

$currentPage = intval($_GET['page']) > 0 ? intval($_GET['page']) : 1;

$offset = ($currentPage - 1) * LOTS_PER_PAGE;

$countLotsInQuery = count_lots_per_query($link,$searchQuery);

$pageCount = (int) ceil($countLotsInQuery / LOTS_PER_PAGE);
$searchResult = search_query($link, $searchQuery, LOTS_PER_PAGE, $offset);
$pages = range(1, $pageCount);


$showPage = $countLotsInQuery
         <= LOTS_PER_PAGE;

if (empty($searchResult)) {
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

$paginator = include_template('paginator.php', [
    'pages' => $pages,
    'currentPage' => $currentPage,
    'showPage' => $showPage,
]);

$content = include_template('search.php', [
    'categories' => all_categories($link),
    'searchResult' => $searchResult,
    'searchQuery ' => $searchQuery ,
    'paginator' => $paginator,

]);

$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'title' => $title,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $content,
    'categories' => all_categories($link)

]);

print($layout_content);