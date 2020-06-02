<div class="comentList">
    <h3>Comments</h3>
    <div id="commentHolder">
        <div class="skeleton" style="height: 30px"></div>
        <p></p>
        <div class="skeleton" style="height: 15px; width: 300px"></div>
    </div>

</div>

<script>
    getBlogComments(BLOG_COMMENT_URL + "?blog_id=<?=$blog["id"];?>", "commentHolder", canGoNext);
    function commentLoadMore() {
        if(canGoNext){
            getBlogComments(canGoNext, "commentHolder", canGoNext, true);
        }
    }
    $(window).scroll(function() {
        if($(window).scrollTop() + window.innerHeight > $(document).height() - 200 ) {
            commentLoadMore();
        }
    });
</script>