<?php
$request = $_SERVER['REQUEST_URI'];
?>
<div class="blog-container">
    <div class="navbar">
        <div class="brand"><a href="/"><img src="/assets/images/imaprt.png" alt=""/> <div class="title">
                    <span>IMPARTNEWSPOINT</span>
                    <small>Castle of Precise News</small>
                </div></a></div>

        <div class="navRight desktop">
            <div class="navLinks">
                <a href="http://www.facebook.com">Facebook</a>
            </div>

            <div class="navLinks">
                <a href="#">Twitter</a>
            </div>
            <div class="navLinks">
                <a href="#">LinkedIn</a>
            </div>
        </div>
    </div>
    <div class="menu"></div>
    <div class="children-con">
        <?php
        $similar_blog = "0";
        switch ($request) {
            case '/' :
                require_once "pages/HomeComponents/homeContent.php";
                break;
            default:
                if(preg_match_all('/\/[a-zA-Z0-9]+/', $request)){
                    $similar_blog = "1";
                    require_once "pages/SingleBlogComponents/singleBlogContent.php";
                    break;
                }
                if(preg_match_all('/\/?[a-zA-Z0-9]+/', $request)){
                    require_once "pages/HomeComponents/homeContent.php";
                    break;
                }
                else{
                    require_once "pages/404Components/404Content.php";
                    break;
                }
        }
        ?>
    </div>

</div>
<footer>
    Impartnewspoint 2020 &copy; All Rights Reserved
</footer>
<script>
    axios.get(BLOG_TAGS_URL).then(
        res => {
            const menu = document.getElementsByClassName("menu")[0];
            let menuItems = "";
            for(let a of res.data.results){
                menuItems += `<a href="/?search=${a.title.toLowerCase()}">${a.title}</a>`
            }
            menu.innerHTML = menuItems;
        }
    )
</script>