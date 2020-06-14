const removeTag = (content) => {
    const regex = /(<([^>]+)>)/gi;
    const regex2 = /(&([a-z]+);)/gi;
    return content.replace(regex, "").replace(regex2, "");
};

function getBlogCard(blog) {
    return `
            <div class="blogCard">
                <a href="${blog.slug}" class="blogImage" style="background-image:url('${blog.cover}') "></a>
                <div class="blogContent">
                    <a href="${blog.slug}">
                        <div class="blogTitle">${blog.title.substring(0, 70)}${blog.title.length > 70 ? "..." : ""}</div>
                        <p class="desktop">
                            ${removeTag(blog.content).toString().substring(0, 100)}
                            ${removeTag(blog.content).toString().length > 100 && "..."}
                        </p>
                        <p class="mobile">
                            ${removeTag(blog.content).toString().substring(0, 30)}
                            ${removeTag(blog.content).toString().length > 30 && "..."}
                        </p>
                    </a>
                    <div class="footer">
                        Created By:
                        <span class="textCapitalized">${blog.author.username}</span>,
                        On ${moment(new Date(blog.created_at)).format("YYYY-MM-DD")}
                    </div>
                </div>
            </div>
        `
}

function getBlogCardExtra(blog) {
    return `
            <div class="blogCardExtra">
                <div class="blogContent">
                    <a href="${blog.slug}">
                        <div class="blogTitle">${blog.title.substring(0, 70)}${blog.title.length > 70 ? "..." : ""}</div>
                        <p>
                            ${removeTag(blog.content).toString().substring(0, 50)}
                            ${removeTag(blog.content).toString().length > 50 && "..."}
                        </p>
                    </a>
                    <div class="footer">
                        Created By:
                        <span class="textCapitalized">${blog.author.username}</span>,
                        On ${moment(new Date(blog.created_at)).format("YYYY-MM-DD")}
                    </div>
                </div>
            </div>
        `
}

function getCommentCard(comment) {
    return `
            <div class="comment-card">
                <p>${comment.comment}</p>
                <div class="footer">
                    By: ${comment.name}, On
                    ${moment(new Date(comment.created_at)).format("YYYY-MM-DD")}
                </div>
            </div>
        `
}

function getBlogComments(url, commentHolder, canGoNext, nextCon=false) {
    const commentList = $("#commentHolder");
    axios.get(url).then(
        res => {
            canGoNext = res.data.next && res.data.next.split("?");
            canGoNext = canGoNext && canGoNext[canGoNext.length - 1];
            const comments = res.data.results;
            if(comments.length < 1 && !nextCon){
                commentList.html(`<h3>No comment found...</h3>`)
            }
            else {
                if(!nextCon){
                    commentList.html("");
                }
                else {
                    $('#loadMoreButton').remove()
                }
                for (let i = 0; i<comments.length; i++){
                    commentList.append(
                        getCommentCard(comments[i]),
                    )
                }
            }

            if(canGoNext){
                commentList.append(
                    `<button id="loadMoreButton" onclick="commentLoadMore(this)">Load more</button>`
                )
            }
        },
        err => {

        }
    )
}

const cleanParameters = obj => {
    let newObj = {};
    for (let i in obj) {
        if (obj.hasOwnProperty(i)) {
            if (obj[i]) {
                newObj[i] = obj[i];
            }
        }
    }
    return newObj;
};