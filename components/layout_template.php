<?php
$request = $_SERVER['REQUEST_URI'];
?>
<div class="blog-container">
    <div class="navbar">
        <div class="brand"><a href="/"><img src="/assets/images/imaprt.png" alt="" />
                <div class="title">
                    <span class="brand-name">IMPARTNEWSPOINT</span>
                    <small>Citadel Of Authentic Information</small>
                </div>
            </a></div>

        <div class="navRight desktop">
            <div class="top">
                <div class="navLinks">
                    <a href="https://www.facebook.com/Impart-News-Point-100107794853454" target="_blank">Facebook</a>
                </div>

                <div class="navLinks">
                    <a href="https://twitter.com/impartnewspoint" target="_blank">Twitter</a>
                </div>
                <div class="navLinks">
                    <a href="#">LinkedIn</a>
                </div>
            </div>
            <div class="bottom">
                <div class="navLinks">
                    <a href="/about">About</a>
                </div>

                <div class="navLinks">
                    <a href="/contact">Contact</a>
                </div>
            </div>
        </div>
        <div class="navRight mobile">
            <img src="/assets/images/bars.png" alt="" onclick="toggleMenu()">

            <div class="menu-link" id="menuLink">
                <div class="overlay" onclick="toggleMenu()"></div>
                <div class="navLinks">
                    <a href="/about">About</a>
                </div>

                <div class="navLinks">
                    <a href="/contact">Contact</a>
                </div>
            </div>
        </div>

    </div>
    <div class="menu"></div>
    <div class="children-con">
        <?php
        $similar_blog = "0";
        switch ($request) {
            case '/':
                require_once "pages/HomeComponents/homeContent.php";
                break;
            case '/about':
                require_once "pages/AboutComponent/aboutContent.php";
                break;
            case '/contact':
                require_once "pages/ContactComponent/contactContent.php";
                break;
            default:
                if (preg_match_all('/\/[a-zA-Z0-9]+/', $request)) {
                    $similar_blog = "1";
                    require_once "pages/SingleBlogComponents/singleBlogContent.php";
                    break;
                }
                if (preg_match_all('/\/?[a-zA-Z0-9]+/', $request)) {
                    require_once "pages/HomeComponents/homeContent.php";
                    break;
                } else {
                    require_once "pages/404Components/404Content.php";
                    break;
                }
        }
        ?>
    </div>

</div>
<footer>
    Impartnewspoint <?php echo date("Y"); ?> &copy; All Rights Reserved
</footer>
<script>
axios.get(BLOG_TAGS_URL).then(
    res => {
        const menu = document.getElementsByClassName("menu")[0];
        let menuItems = "";
        for (let a of res.data.results) {
            menuItems += `<a href="/?search=${a.title.toLowerCase()}">${a.title}</a>`
        }
        menu.innerHTML = menuItems;
    }
)

function toggleMenu() {
    const menuLink = document.getElementById("menuLink")
    if (menuLink.style.display === "block") {
        menuLink.style.display = "none"
    } else {
        menuLink.style.display = "block"
    }
}
</script>
