function start_textArea() {
    let textareaList = document.querySelectorAll(".comment-textarea");
    textareaList.forEach(textarea => {
        textarea.one_row_size = textarea.scrollHeight / 2;
        textarea.addEventListener("keydown", (event) => {


            if (event.target.one_row_size == 0 && event.target.scrollHeight > 0) {
                event.target.one_row_size = event.target.scrollHeight / 2
            } else if (event.target.one_row_size > 0) {
                if ((event.target.scrollHeight / event.target.one_row_size) >= 5) {
                    event.target.attributes["rows"].nodeValue = "5"
                } else {
                    event.target.attributes["rows"].nodeValue = "" + ((event.target.scrollHeight / event.target.one_row_size) - 0.5)
                }
            }
        })
    });
}


function addComment(rid) {
    let textArea = document.getElementById("addCommentArea_" + rid)
    if (textArea !== null && textArea.value.length > 0) {
        sendAjaxRequest("POST", "/api/review/" + rid + "/comment", { 'text': textArea.value },
            (request) => {
                if (request.status == 200) {
                    toast("Comment submitted", "s");
                    let total_comments = document.getElementById('total_comments');
                    let stringArray = total_comments.innerHTML.trim().split(' ');
                    console.log(stringArray);
                    total_comments.innerHTML = (parseInt(stringArray[0]) + 1).toString() + " comments";
                    textArea.value = "";
                    let div = document.createElement('div');
                    div.innerHTML = request.responseText
                    document.getElementById("comments" + rid).insertBefore(div, document.querySelector("#comments" + rid + " .form-group"))
                } else {
                    toast("Error adding comment", "d");
                }
            })
    } else {
        textArea.classList.add("apply-shake")
        textArea.addEventListener("animationend", (e) => {
            textArea.classList.remove("apply-shake");
        });

    }
}

start_textArea();