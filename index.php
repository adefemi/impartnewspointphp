<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1927272486525742"
     crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.9.1/qs.js"></script>

<script>
const baseUrl = "https://api.impartnewspoint.com/";
const BLOG_URL = baseUrl + "blogs/";
const TOP_BLOG_URL = baseUrl + "top-blogs";
const BLOG_TAGS_URL = baseUrl + "blog-tags";
const SIMILAR_BLOG_URL = baseUrl + "similar-blogs/";
const BLOG_COMMENT_URL = baseUrl + "blog-comments/";
</script>
<script src="assets/scripts/utils.js"></script>

<?php
$GLOBALS["base_api"] = "https://api.impartnewspoint.com/";
$GLOBALS["BLOG_URL"] = $GLOBALS["base_api"] . "blogs/";
$GLOBALS["TOP_BLOG_URL"] = $GLOBALS["base_api"] . "top-blogs";
$GLOBALS["SIMILAR_BLOG_URL"] = $GLOBALS["base_api"] . "similar-blogs/";
$GLOBALS["BLOG_COMMENT_URL"] = $GLOBALS["base_api"] . "blog-comments/";

include_once("router.php")
?>
