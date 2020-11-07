const likeserivce = new LikesService();
const commentservice = new CommentsService();
//getting the post id
const currentPost = document.querySelector(".posts-show");
const post = parseInt(currentPost.getAttribute("post_id"));

//count for like and comment
const likesCount = document.querySelector(".likes-count");
const commentsCount = document.querySelector(".comments-count");

//html elements for like and comment
const commentSection = document.querySelector(".posts-show .additional ul");

//comment form
const commentForm = document.querySelector("#comment-form");

//like form
const checkBox = document.querySelector(".checkbox");
const commentsvg = document.querySelector(".content .comments svg");

//modal content

const modalContent = document.querySelector(".modal-content-inner");

//setting up event listener for comment and like
if (commentForm) {
    commentForm.addEventListener("submit", e => {
        const commentData = tinyMCE.activeEditor.getContent();
        e.preventDefault();
        commentservice.addComment(post, commentData).then(() => {
            const parentNode = document.querySelector(".add-comment");
            const existingNode = document.querySelector(".add-comment h5");
            const alertNode = document.createElement("div");
            alertNode.setAttribute(
                "class",
                "alert alert-success alert-dismissible fade show"
            );
            alertNode.setAttribute("role", "alert");
            alertNode.innerHTML = `<strong>Success!</strong> Your comment was added successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>`;
            parentNode.insertBefore(alertNode, existingNode);

            displayCommentsCount();
            displayComments();
            tinyMCE.activeEditor.setContent("");
        });
    });
}

if (checkBox) {
    checkBox.addEventListener("change", () => {
        likeserivce.updateStatus(post).then(() => {
            displayLikesCount();
        });
    });
}

if (likesCount) {
    likesCount.addEventListener("click", () => {
        displayLikes();
    });
}

if (commentsvg) {
    commentsvg.addEventListener("click", () => {
        document.querySelector("#comments-section").scrollIntoView();
    });
}

//main functions

function checkstatus() {
    likeserivce.checkStatus(post).then(data => {
        console.log("data", data);
        if (data) {
            checkBox.checked = true;
        } else {
            checkBox.checked = false;
        }
    });
}
function displayCommentsCount() {
    commentservice.getComments(post).then(data => {
        commentsCount.textContent = data.length;
    });
}

function displayLikesCount() {
    likeserivce.getLikes(post).then(data => {
        console.log(data);
        likesCount.textContent = data.length;
    });
}

function displayComments() {
    //displaying list of comments and likes
    commentservice.getComments(post).then(data => {
        console.log(data);
        commentSection.innerHTML = "";
        if (data.length == 0) {
            const p = document.createElement("p");
            p.textContent = "No comments found...";
            commentSection.appendChild(p);
            return;
        }
        data.forEach(comment => {
            const li = document.createElement("li");
            li.setAttribute("class", "comment");
            li.innerHTML = `
        <li class="comment">
        <img src="/assets/user.png"/>
        <div class="comment-info">
          <span class="comment-user">${
              comment.name
          }</span><small class="comment-date">
          ${dateFormatter(comment.date)}</small>
          <div class="comment-content">
             ${comment.comment}
          </div>
        </div>
      </li>`;
            commentSection.appendChild(li);
        });
    });
}

function displayLikes() {
    likeserivce.getLikes(post).then(people => {
        document.body.style.overflow = "hidden";
        modal.style.display = "block";
        modalContent.innerHTML = "";
        const ul = document.createElement("ul");
        const title = document.createElement("h1");
        title.setAttribute("class", "text-center");
        title.textContent = "People who liked this post";
        modalContent.appendChild(title);
        console.log(people);
        people.forEach(person => {
            const li = document.createElement("li");

            const img = document.createElement("img");
            img.setAttribute("src", "/assets/user.png");

            const name = document.createElement("h4");
            name.textContent = person;

            li.appendChild(img);
            li.appendChild(name);

            ul.appendChild(li);
        });
        modalContent.appendChild(ul);
    });
}

//running functions

displayLikesCount();
displayCommentsCount();
displayComments();
checkstatus();
