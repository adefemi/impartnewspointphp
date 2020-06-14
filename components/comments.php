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
    function commentLoadMore(e) {
        e.innerText = "Loading...";
        e.disabled = true;
        if(canGoNext){
            getBlogComments(BLOG_COMMENT_URL + `?${canGoNext}`, "commentHolder", canGoNext, true);
        }
    }
</script>