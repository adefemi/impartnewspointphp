<?php

$date=date_create($blog['created_at']);

?>

<script>
    let canGoNext = null;
</script>

<div class="singleBlog">
    <div class="top-content">
        <h3><?= $blog['title'] ?></h3>
        <div class="author-con">
            <div class="author">
                Created By:
                <span className="textCapitalized"><?= $blog['author']['username'] ?></span>
                , On <?= date_format($date,"Y-m-d");?>
            </div>
            <div class="share-button">
                <a target="_blank"
                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $actual_link ?>&title=<?=$blog['title'] ?>&summary=<?= substr(strip_tags($blog['content']), 0, 180) ?>&source=Rentright"
                   class="btn sharer linkedin-share">
                    <img src="/assets/images/linkendIn.png" alt="">
                </a>
                <a target="_blank" href="whatsapp://send?text=<?= $actual_link ?>" data-action="share/whatsapp/share" class="btn sharer whatsapp-share">
                    <img src="/assets/images/whatsapp.png" alt="">
                </a>
                <a target="_blank" href="http://twitter.com/share?text=<?=$blog['title'] ?>&url=<?= $actual_link ?>&hashtags=News,Politics,Sports" class="btn sharer twitter-share">
                    <img src="/assets/images/twitter.png" alt="">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>" class="btn sharer facebook-share">
                    <img src="/assets/images/facebook.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <div
        class="cover-main"
        style="background-image: url('<?= $blog['cover'] ?>')"
    ></div>
    <br />
    <div class="blogListContainer-singlePage">
        <div class="blogList">

            <p class="blog-content-main">
                <?= html_entity_decode($blog["content"]) ?>
            </p>

            <?php include_once "components/commentComp.php" ?>
            <?php include_once "components/comments.php" ?>
        </div>
        <div class="blogExtras blogExtras-main">
            <h4>Related Blogs</h4>
            <?php include_once "components/topBlogs.php"?>
        </div>
    </div>

    <br><br>
</div>


