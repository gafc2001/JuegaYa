window.addEventListener("DOMContentLoaded", function () {
    const commentContent = document.getElementById("comment-content");
    const commentList = document.querySelector(".comments");
    const createRank = document.getElementById("create-rank");
    const stars = document.getElementsByClassName("star");
    const sendButton = document.getElementById("btn-send");
    const csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    let rank = 0;

    
    const changeTextHeight = () => {
        commentContent.style.height = "";
        commentContent.style.height = commentContent.scrollHeight + "px";
    }

    const onStarMouseOver = (e) => {
        for (let i = 0; i < e.target.getAttribute("data-rank"); i++) {
            createRank.children[i].firstElementChild.classList.remove("far");
            createRank.children[i].firstElementChild.classList.add("fas");
        }
    }
    const onStarMouseOut = (e) => {
        if (rank == 0) {
            for (star of createRank.children) {
                star.firstElementChild.classList.remove("fas");
                star.firstElementChild.classList.add("far");
            }
        }
    }

    const onStarClick = (e) => {
        rank = e.target.getAttribute("data-rank");
        for (star of createRank.children) {
            star.firstElementChild.classList.remove("fas");
            star.firstElementChild.classList.add("far");
        }
        for (let i = 0; i < e.target.getAttribute("data-rank"); i++) {
            createRank.children[i].firstElementChild.classList.remove("far");
            createRank.children[i].firstElementChild.classList.add("fas");
        }
    }

    const onCommentInput = (e) => {
        commentContent.classList.remove("invalid-input");
    }

    const printStars = (number,active) => {
        let stars = ""
        let star = active?'<i class="fas fa-star"></i>':'<i class="far fa-star"></i>';
        for(let i=0; i<number;i++){
            stars += star;
        }
        return stars;
    }
    const commentDiv = (comment) => {
        const content = `
            <img src="http://127.0.0.1:8000/assets/img/profile/${comment.picture}" alt="">
            <div class="comment-header">
                <header class="comment-header title-2">
                    <div class="comment-user">${comment.full_name}</div>
                    <span class="rank text-sm">
                        ${printStars(comment.rank,true)}
                        ${printStars(5-comment.rank,false)}   
                    </span>
                    <span class="date text-sm">${comment.date}</span>
                </header>
                <p class="comment">
                    ${comment.comment}
                </p>
            </div>
        `;
        const div = document.createElement('div');
        div.classList.add('comment-item');
        div.classList.add('mb-2');
        div.innerHTML = content;
        commentList.prepend(div);
        
    };
    const onSend = (e) => {

        if (!commentContent.value == "") {
            commentContent.classList.add("invalid-input");
            const options = {
                headers: {
                    "X-CSRF-TOKEN": csrf_token,
                },
                method: 'POST',
                body: JSON.stringify({
                    comment: commentContent.value,
                    rank: rank,
                    comment_user_id: commentUserId,
                })
            }
            fetch(url, options)
                .then(res => res.json())
                .then(json => commentDiv(json))
        } else {
            commentContent.classList.add("invalid-input");
        }
    }

    commentContent.addEventListener("input", changeTextHeight);
    commentContent.addEventListener("paste", changeTextHeight);


    Array.from(stars).forEach(e => e.addEventListener("mouseover", onStarMouseOver))
    Array.from(stars).forEach(e => e.addEventListener("mouseout", onStarMouseOut))
    Array.from(stars).forEach(e => e.addEventListener("click", onStarClick))

    sendButton.addEventListener("click", onSend);

    commentContent.addEventListener("input", onCommentInput)

});