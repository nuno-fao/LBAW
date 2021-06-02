let like_buttons = document.querySelectorAll(".like_button");
like_buttons.forEach(button => {
    let id = button.id.replace(/\D/g, '');
    button.addEventListener("click", (event) => {
        let like_clicked = new XMLHttpRequest();
        like_clicked.onload = function() {
            if (button.id.includes("clicked")) {
                document.getElementById("likes_" + id).innerHTML = document.getElementById("likes_" + id).innerHTML - 1;
            } else {

                document.getElementById("likes_" + id).innerHTML = document.getElementById("likes_" + id).innerHTML + 1;
            }
        }
        like_clicked.open("POST", "/api/review/" + id + "/like", true);
        like_clicked.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        like_clicked.send();
    })
});