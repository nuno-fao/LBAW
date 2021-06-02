var publicPage = 0;
var privatePage = 0;

function start_feed_listeners() {
    let nextPublicPage = document.getElementById("nextPublicPage");
    let nextFriendPage = document.getElementById("nextFriendPage");

    if (nextPublicPage != null) {
        nextPublicPage.addEventListener('click', () => {
            loadPublicFeed()
        });
    }

    if (nextFriendPage != null) {
        nextFriendPage.addEventListener('click', () => {
            loadFriendFeed()
        });
    }
}

function loadPublicFeed() {
    publicPage++;
    let public_pagination = new XMLHttpRequest();

    public_pagination.open("GET", "/api/public_feed/" + publicPage, true);
    public_pagination.send();

    public_pagination.onload = function() {

        if (this.responseText.length == 0) {
            let elem = document.getElementById('nextPublicPage');

            let p = document.createElement('p');
            p.className = "text-center"
            p.innerHTML = 'Nothing else to show';
            elem.parentNode.appendChild(p);

            elem.parentNode.removeChild(elem);
        }

        document.getElementById("public_reviews").innerHTML += this.responseText;
    };
}

function loadFriendFeed() {
    privatePage++;
    let friend_pagination = new XMLHttpRequest();

    friend_pagination.open("GET", "/api/friends_feed/" + privatePage, true);
    friend_pagination.send();

    friend_pagination.onload = function() {
        if (this.responseText.length == 0) {
            let elem = document.getElementById('nextFriendPage');

            let p = document.createElement('p');
            p.className = "text-center"
            p.innerHTML = 'Nothing else to show';
            elem.parentNode.appendChild(p);

            elem.parentNode.removeChild(elem);
        }

        document.getElementById("friends_reviews").innerHTML += this.responseText;
    };
}

start_feed_listeners()