let buttons = document.querySelectorAll(".request_button");
buttons.forEach(button => {

    button.addEventListener("click", (event) => {
        let id = event.target.id;
        var r = /\d+/;
        let n = (id.match(r));
        document.querySelector("#request_" + n).remove();
    })
});