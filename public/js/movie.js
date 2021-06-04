var page = 0;

let nextPage = document.getElementById("nextPage");
let movie_pagination = new XMLHttpRequest();

movie_pagination.onload = function() {
    if (this.responseText.length == 0) {
        let elem = document.getElementById('nextPage');

        let p = document.createElement('p');
        p.className = "text-center"
        p.innerHTML = 'Nothing else to show';
        elem.parentNode.appendChild(p);

        elem.parentNode.removeChild(elem);
        return
    }
    document.getElementById("review_section").innerHTML += this.responseText;
    start_likes();

};
if (nextPage != null) {
    nextPage.addEventListener('click', () => {
        page += 1;
        movie_pagination.open("GET", "/api/movie/" + movie_id + "/feed/" + page, true);
        movie_pagination.send();
    });
}

window.onscroll = function(ev) {
    if (nextPage != null)
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            nextPage.click();
        }
};

let group_selector = document.getElementById("group-selector")
let group_selector_ajax = new XMLHttpRequest();
group_selector_ajax.onload = function() {
    /*if (this.responseText.length > 0) {
        let json = JSON.parse(this.responseText);
        document.getElementById("title").value = json.title;
        document.getElementById("description").value = json.text;
    }*/
};

/*if (group_selector != null) {
    group_selector_ajax.open("get", "/api/review/" + group_selector.value, true);
    group_selector_ajax.send();
    group_selector.addEventListener('change', () => {
        group_selector_ajax = new XMLHttpRequest();
        group_selector_ajax.open("get", "/api/review/" + group_selector.value, true);
        group_selector_ajax.send();
    });
}*/