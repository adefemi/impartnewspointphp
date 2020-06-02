<div class="comment-comp">
    <h3>Write a comment!</h3>
    <form id="commentForm">
        <input
            placeholder="Enter your name"
            name="name"
        />
        <textarea
            placeholder="Enter your comment"
            rows="6"
            name="comment"
            required
        ></textarea>
        <button type="submit" id="submit-button">
            Post
        </button>
    </form>
</div>

<script>
    $("#commentForm").submit(function (e) {
        e.preventDefault();
        const submitButton = $("#submit-button");
        const data = cleanParameters(Qs.parse($(this).serialize()))
        data.blog_id = "<?=$blog["id"];?>";
        submitButton.text("Posting...")
        axios.post(BLOG_COMMENT_URL, data).then(
            _ => {
                getBlogComments(BLOG_COMMENT_URL + "?blog_id=<?=$blog["id"];?>", "commentHolder", canGoNext);
                submitButton.text("Post")
            },
            (err) => {
                console.log(err.response.data);
                submitButton.text("Post")
            }
        );
    })
</script>