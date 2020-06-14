<div>
    <div class="searchBlog">
        <input
            placeholder="Search blog contents"
            id="search"
        />
    </div>
    <br/>
    <div class="blogListContainer">
        <div class="blogList" id="blog-list">
            <div class="main-loader">
                <div class="skeleton" style="height: 30px"></div>
                <p></p>
                <div class="skeleton" style="height: 50px"></div>
                <br/>
                <br/>
                <br/>
                <div class="skeleton" style="height: 20px; width: 300px"></div>
            </div>
        </div>


        <div class="blogExtras blogExtras-main">
            <h4>Top Blogs</h4>
            <?php include_once "components/topBlogs.php"?>
        </div>
    </div>
    <br/><br/>
</div>

<script>
    let searchDelay;

    const loaderHome = `
        <div class="main-loader">
            <div class="skeleton" style="height: 30px"></div>
            <p></p>
            <div class="skeleton" style="height: 50px"></div>
            <br/>
            <br/>
            <br/>
            <div class="skeleton" style="height: 20px; width: 300px"></div>
        </div>
    `;

    let canGoNext = false;
    const blogList = $('#blog-list');
    let urlMain = BLOG_URL;
    let search = Qs.parse(window.location.search.replace("?", ""));
    if(search.search){
        urlMain = BLOG_URL + `?tags__title__iexact=${search.search}`
    }
    getBlogs(urlMain);


    $("#search").on("change paste keyup", function () {
        clearTimeout(searchDelay);
        let value = $(this).val()
        searchDelay = setTimeout(() => {
            blogList.html(loaderHome)
            getBlogs(BLOG_URL+`?keyword=${value}`)
        }, 500)
    })

    function getBlogs(url, nextCon=false) {
        axios.get(url).then(
            res => {
                canGoNext = res.data.next && res.data.next.split("?");
                canGoNext = canGoNext && canGoNext[canGoNext.length - 1];
                const blogs = res.data.results;
                if(blogs.length < 1 && !nextCon){
                    blogList.html("<h3><i>No news content available</i></h3>")
                }
                else {
                    if(!nextCon){
                        blogList.html("")
                    }
                    else {
                        $('#loadMoreButton').remove()
                    }
                    for (let i = 0; i<blogs.length; i++){
                        blogList.append(
                            getBlogCard(blogs[i]),
                        )
                    }
                }

                if(canGoNext){
                    blogList.append(
                        `<button id="loadMoreButton" onclick="homeLoadMore(this)">Load more</button>`
                    )
                }

            },
            err => {
                blogList.html("<h3><i>No news content available</i></h3>")
            }
        )
    }
    
    function homeLoadMore(e) {
        e.innerText = "Loading...";
        e.disabled = true;
        if(canGoNext){
            getBlogs(BLOG_URL+`?${canGoNext}`, true)
        }
    }
</script>