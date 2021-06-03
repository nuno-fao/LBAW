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

function unban(id) {
    sendAjaxRequest("PATCH", "/api/admin/user/" + user_id + "/unban", "",
        () => {
            if (request.status == 200) {
                toast("Successfully re-integrated user", document.getElementById("banned_" + id));
                document.getElementById("banned_" + id).remove()
            } else {
                toast("Error re-integrating user", document.getElementById("banned_" + id));
            }
        })
}


start_ban()