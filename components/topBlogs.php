<div id="top-blog">
    <div class="main-loader">
        <div class="skeleton" style="height: 20px"></div>
        <p></p>
        <div class="skeleton" style="height: 40px"></div>
        <br/>
        <br/>
        <div class="skeleton" style="height: 15px; width: 300px"></div>
    </div>
</div>


<script>
    const topBlogs = $('#top-blog');
    const similarBlog = "<?=$similar_blog; ?>";
    let url = TOP_BLOG_URL;
    if(similarBlog === "1"){
        url = SIMILAR_BLOG_URL + "<?=$blog["id"];?>";
    }
    axios.get(url).then(
        res => {
            const blogs = res.data.results;
            if(blogs.length < 1){
                topBlogs.html("<h3><i>No news content available</i></h3>")
            }
            else {
                topBlogs.html("");
                for (let i = 0; i<blogs.length; i++){
                    topBlogs.append(
                        getBlogCardExtra(blogs[i]),
                    )
                }
            }

        },
        err => {
            topBlogs.html("<h3><i>No news content available</i></h3>")
        }
    )


</script>