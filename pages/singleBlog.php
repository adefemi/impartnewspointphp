<?php include 'utils/make_request.php'; ?>

<?php
    $url = $GLOBALS['BLOG_URL'] . str_replace("/", "", $_SERVER['REQUEST_URI']) . "/";
    $blog = makeRequest($url);
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html
        lang="en"
        style="width: 100%;"
>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168727817-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-168727817-1');
    </script>
    <script data-ad-client="ca-pub-4723264594336681" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/styles/singleBlog.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/images/imaprt.png"/>
    <meta property="og:title" content="<?php echo $blog['title'] ?>">

    <meta property="og:url" content="<?php echo $actual_link ?>">

    <meta property="og:type" content="article">

    <meta property="og:image" content="<?php echo $blog['cover'] ?>">

    <meta property="og:description" content="<?php echo strip_tags($blog["content"]) ?>">

    <meta property="og:site_name" content="Impart Newspoint">

    <meta itemprop="name" content="<?php echo $blog["title"] ?>">

    <meta itemprop="description" content="<?php echo strip_tags($blog["content"]) ?>">

    <meta itemprop="image" content="<?php echo $blog['cover'] ?>">

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:site" content="@Impartnewspoint">

    <meta name="twitter:title" content="<?php echo $blog["title"]?>">

    <meta name="twitter:description" content="<?php echo substr(strip_tags($blog["content"]), 0, 180) ?>">

    <meta name="twitter:image" content="<?php echo $blog['cover'] ?>">

    <meta name="twitter:creator" content="@Impartnewspoint">


    <meta name="Keywords" content="news, politics, blog, entertainment"/>

    <meta name="author" content="Impartnewspoint">

    <meta name="description" content="<?php echo strip_tags($blog["content"]) ?>" charset="utf-8">

    <title><?= $blog["title"] ?></title>
</head>
<body>
    <div class="home-container">
        <?php include_once("components/layout_template.php") ?>
    </div>
</body>
</html>