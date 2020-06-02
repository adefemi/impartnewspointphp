<link href="/assets/styles/default.css" rel="stylesheet">

<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '' :
    case '/' :
        require __DIR__ . '/pages/home.php';
        break;
    default:
        if(preg_match_all('/\/[a-zA-Z0-9]+/', $request)){
            require __DIR__ . '/pages/singleBlog.php';
        }
        else{
            require __DIR__ . '/pages/404.php';
            break;
        }
}
?>

