let textareaList = document.querySelectorAll(".comment-textarea");
textareaList.forEach(textarea => {
    textarea.one_row_size = textarea.scrollHeight / 2;
    textarea.addEventListener("keydown", (event) => {
        console.log(event.target.one_row_size)
        console.log(event.target.scrollHeight)
        if (event.target.one_row_size == 0 && event.target.scrollHeight > 0) {
            event.target.one_row_size = event.target.scrollHeight / 2
        } else if (event.target.one_row_size > 0) {
            console.log((event.target.scrollHeight / event.target.one_row_size) - 1)
            if ((event.target.scrollHeight / event.target.one_row_size) >= 5) {
                event.target.attributes["rows"].nodeValue = "5"
            } else {
                event.target.attributes["rows"].nodeValue = "" + ((event.target.scrollHeight / event.target.one_row_size) - 0.5)
            }
        }
    })
});