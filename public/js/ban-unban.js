let button = document.getElementById("ban-button");
let ban_ajax = new XMLHttpRequest();

ban_ajax.onload = function() {
    if (button.innerHTML === "Ban") {
        button.innerHTML = "Unban";
    } else {
        button.innerHTML = "Ban";
    }
};


if (button != null) {
    button.addEventListener('click', () => {
        ban_ajax.open("PATCH", "/api/admin/users/" + user_id + "/" + button.innerHTML.toLowerCase(), true);
        ban_ajax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        ban_ajax.send();
    });
}