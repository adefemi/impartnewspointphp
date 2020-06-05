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
                canGoNext = res.data.next;
                const blogs = res.data.results;
                if(blogs.length < 1 && !nextCon){

                }
                else {
                    if(!nextCon){
                        blogList.html("");
                    }
                    for (let i = 0; i<blogs.length; i++){
                        blogList.append(
                            getBlogCard(blogs[i]),
                        )
                    }
                }

            },
            err => {

            }
        )
    }
    
    function homeLoadMore() {
        if(canGoNext){
            getBlogs(canGoNext, true)
        }
    }

    $(window).scroll(function() {
        if($(window).scrollTop() + window.innerHeight > $(document).height() - 200 ) {
            homeLoadMore();
        }
    });
</script>