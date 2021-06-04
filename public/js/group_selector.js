function start_group_selector() {
    let selector = document.getElementById("group-selector")
    let title = document.getElementById("title")
    let description = document.getElementById("description")
    let sec_t = document.getElementById("review_section_title")
    let form_button = document.getElementById("review_button")
    console.log(selector)
    if (selector !== null && description != null && title != null && sec_t != null && form_button != null) {
        sendAjaxRequest("GET", "/api/review?" + encodeForAjax({ "group": selector.value, "movie": movie_id }), "",
            (ev) => {
                if (ev.status == 200) {
                    if (ev.responseText == "notFound") {
                        sec_t.innerHTML = "Add a review"
                        title.value = ""
                        description.value = ""
                    } else {
                        sec_t.innerHTML = "Edit a review"
                        let r = JSON.parse(ev.responseText)
                        title.value = r.title
                        description.value = r.text
                        editing_review_id = r.id
                    }
                } else {
                    toast("Couldn't load the review information", "d");
                }
            })
        form_button.onclick = function(event) {
            let out = false;
            if (title.value.length == 0) {
                title.classList.add("apply-shake")
                title.addEventListener("animationend", (e) => {
                    title.classList.remove("apply-shake");
                });
                out = true;
            }
            if (description.value.length == 0) {
                description.classList.add("apply-shake")
                description.addEventListener("animationend", (e) => {
                    description.classList.remove("apply-shake");
                });
                out = true;
            }
            if (out) {
                return
            }
            if (sec_t.innerHTML.trim() == "Add a review") {
                sendAjaxRequest("POST", '/api/movie/' + movie_id + "/review", { "group": selector.value, "title": title.value, "description": description.value },
                    (ev) => {
                        if (ev.status == 200) {
                            if (ev.responseText == "alreadyExists") {
                                toast("Review already exists", "d")
                            } else {
                                sec_t.innerHTML = "Edit a review"
                                toast("Successfully added the review", "s");
                                document.getElementById("review_section").innerHTML += ev.responseText
                                sendAjaxRequest("GET", "/api/review?" + encodeForAjax({ "group": selector.value, "movie": movie_id }), "",
                                    (ev) => {
                                        if (ev.status == 200) {
                                            if (ev.responseText == "notFound") {
                                                sec_t.innerHTML = "Add a review"
                                                title.value = ""
                                                description.value = ""
                                            } else {
                                                sec_t.innerHTML = "Edit a review"
                                                let r = JSON.parse(ev.responseText)
                                                title.value = r.title
                                                description.value = r.text
                                                editing_review_id = r.id
                                            }
                                        } else {
                                            toast("Couldn't load the review information", "d");
                                        }
                                    })
                            }
                        } else {
                            toast("Couldn't add the review", "d");
                        }
                    })
            } else {
                sendAjaxRequest("PATCH", '/api/review/' + editing_review_id, { "title": title.value, "description": description.value },
                    (ev) => {
                        if (ev.status == 200) {
                            if (ev.responseText == "error") {
                                toast("Couldn't edit the review", "d");
                            } else {
                                toast("Successfully edited the review", "s");
                                //todo replace
                            }
                        } else {
                            toast("Couldn't edit the review", "d");
                        }
                    })
            }
        }
        selector.addEventListener('change', (event) => {
            sendAjaxRequest("GET", "/api/review?" + encodeForAjax({ "group": selector.value, "movie": movie_id }), "",
                (ev) => {
                    if (ev.status == 200) {
                        if (ev.responseText == "notFound") {
                            sec_t.innerHTML = "Add a review"
                            title.value = ""
                            description.value = ""
                        } else {
                            sec_t.innerHTML = "Edit a review"
                            let r = JSON.parse(ev.responseText)
                            title.value = r.title
                            description.value = r.text
                            editing_review_id = r.id
                        }
                    } else {
                        toast("Couldn't load the review information", "d");
                    }
                })
        });
    }
}
start_group_selector()