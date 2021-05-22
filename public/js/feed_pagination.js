var publicPage = 0;
var privatePage = 0;

let nextPublicPage = document.getElementById("nextPublicPage");
let public_pagination = new XMLHttpRequest();

let nextFriendPage = document.getElementById("nextFriendPage");
let friend_pagination = new XMLHttpRequest();

public_pagination.onload = function() {
    
    if(this.responseText.length == 0){
        let elem = document.getElementById('nextPublicPage');
        
        let p = document.createElement('p');
        p.className = "text-center"
        p.innerHTML = 'Nothing else to show';
        elem.parentNode.appendChild(p);

        elem.parentNode.removeChild(elem);
        return
    }
    
    document.getElementById("public_reviews").innerHTML += this.responseText;
    
};
if(nextPublicPage != null){
    nextPublicPage.addEventListener('click', () => {
        publicPage++;
        public_pagination.open("GET", "/api/public_feed/"+publicPage, true);
        public_pagination.send();
    });
}


friend_pagination.onload = function() {
    
    if(this.responseText.length == 0){
        let elem = document.getElementById('nextFriendPage');
        
        let p = document.createElement('p');
        p.className = "text-center"
        p.innerHTML = 'Nothing else to show';
        elem.parentNode.appendChild(p);

        elem.parentNode.removeChild(elem);
        return
    }
    document.getElementById("friends_reviews").innerHTML += this.responseText;
    
};
if(nextFriendPage != null){
    nextFriendPage.addEventListener('click', () => {
        privatePage++;
        friend_pagination.open("GET", "/api/friends_feed/"+privatePage, true);
        friend_pagination.send();
    });
}