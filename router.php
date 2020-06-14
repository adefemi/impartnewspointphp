<link href="/assets/styles/default.css" rel="stylesheet">

<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '' :
    case '/' :
        require __DIR__ . '/pages/home.php';
        break;
    case '/about' :
        require __DIR__ . '/pages/about.php';
        break;
    case '/contact' :
        require __DIR__ . '/pages/contact.php';
        break;
    default:
        if(preg_match_all('/\/[a-zA-Z0-9]+/', $request)){
            require __DIR__ . '/pages/singleBlog.php';
        }
        if(preg_match_all('/\/?[a-zA-Z0-9]+/', $request)){
            require __DIR__ . '/pages/home.php';
        }
        else{
            require __DIR__ . '/pages/404.php';
            break;
        }
}
?>

