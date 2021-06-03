function ban(user_id) {
    let button = document.getElementById("ban-button");

    if (button != null)
        sendAjaxRequest("PATCH", "/api/admin/user/" + user_id + "/" + button.innerHTML.trim().toLowerCase(), "",
            () => {
                if (button.innerHTML.trim() === "Ban") {
                    button.innerHTML = "Unban";
                } else {
                    button.innerHTML = "Ban";
                }
            })
}

function unban(id) {
    sendAjaxRequest("PATCH", "/api/admin/user/" + id + "/unban", "",
        (request) => {
            if (request.status == 200) {
                toast("Successfully re-integrated user", document.getElementById("banned_" + id));
                document.getElementById("banned_" + id).remove()
            } else {
                toast("Error re-integrating user", document.getElementById("banned_" + id));
            }
        })
}