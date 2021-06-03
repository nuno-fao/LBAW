let like_buttons = document.querySelectorAll(".like_button");
like_buttons.forEach(button => {
    let liked = document.querySelector("#" + button.id + " .liked")
    let not_liked = document.querySelector("#" + button.id + " .not-liked")
    let id = button.id.replace(/\D/g, '');
    button.addEventListener("click", (event) => {
        let like_ajax = new XMLHttpRequest();
        like_ajax.onload = function() {
            if (like_ajax.status == 200){
                if (button.classList.contains("clicked")) {
                    
                    toast("Like removed", "s");
                    
                    document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) - 1 + " likes";
                    button.classList.remove("clicked")


                    liked.classList.add("visible")
                    liked.classList.remove("invisible")
                    not_liked.classList.remove("visible")
                    not_liked.classList.add("invisible")

                } else {
                    toast("Liked!", "s");
                    document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) + 1 + " likes";
                    button.classList.add("clicked")

                    liked.classList.remove("visible")
                    liked.classList.add("invisible")
                    not_liked.classList.add("visible")
                    not_liked.classList.remove("invisible")
                }
            }
            else{
                toast("Error liking/disliking", "d");
            }
        }
        
        like_ajax.open("POST", "/api/review/" + id + "/like", true);
        like_ajax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        like_ajax.send();
    })
});