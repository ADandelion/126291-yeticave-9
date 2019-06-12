<?php
require_once 'db.php';
require_once 'data.php';
require_once 'functions.php';

$cat_id = intval($_GET['catid']);
$lotsByCategory = get_lots_by_category($link, $cat_id);

$cats = all_categories ($link);
$cur = $cat_id ;

if (empty($lotsByCategory)) {

    $layout_content = include_template('404.php', [
        'categories' => all_categories ($link),
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'is_auth' => $is_auth,
        'error' => 'В этой категории нет лотов',
        'cur' => $cur
    ]);

    print($layout_content);
    exit();
}

$paginator = include_template('paginator.php', [
    'pages' => $pages,
    'currentPage' => $currentPage,
    'showPage' => $showPage,
]);

$content = include_template('all-lots.php', [
    'categories' => all_categories ($link),
    'lotsByCategory' => $lotsByCategory,
    'cur' => $cur,
    'paginator' => $paginator
]);

$layout_content = include_template('layout.php', [
    'categories' => all_categories ($link),
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'is_auth' => $is_auth,
    'error' => $error,
    'content' => $content,
    'cur' => $cur

]);

print($layout_content);