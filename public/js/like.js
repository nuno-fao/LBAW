let like_buttons = document.querySelectorAll(".like_button");
like_buttons.forEach(button => {
    let id = button.id.replace(/\D/g, '');
    button.addEventListener("click", (event) => {
        let like_ajax = new XMLHttpRequest();
        like_ajax.onload = function() {
            if (like_ajax.status == 200)
                if (button.id.includes("clicked")) {
                    document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) - 1;
                    button.id = "like_button_" + id;
                    button.classList.remove("clickedLike");
                } else {
                    document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) + 1;
                    button.id += "_clicked";
                    button.className += " clickedLike";
                }
        }
        like_ajax.open("POST", "/api/review/" + id + "/like", true);
        like_ajax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        like_ajax.send();
    })
});