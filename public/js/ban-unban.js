function start_ban() {
    let button = document.getElementById("ban-button");


    if (button != null)
        button.addEventListener('click', () => {
            sendAjaxRequest("PATCH", "/api/admin/user/" + user_id + "/" + button.innerHTML.toLowerCase(), "",
                () => {
                    if (button.innerHTML === "Ban") {
                        button.innerHTML = "Unban";
                    } else {
                        button.innerHTML = "Ban";
                    }
                })
        })
}


start_ban()