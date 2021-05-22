var publicPage = 0;
var privatePage = 0;

let nextPage = document.getElementById("nextPage");
let movie_pagination = new XMLHttpRequest();

movie_pagination.onload = function() {
    if(this.responseText.length == 0){
        let elem = document.getElementById('nextPage');
        
        let p = document.createElement('p');
        p.className = "text-center"
        p.innerHTML = 'Nothing else to show';
        elem.parentNode.appendChild(p);

        elem.parentNode.removeChild(elem);
        return
    }
    if(selected==0){
        document.getElementById("public_reviews").innerHTML += this.responseText;
    }
    else if(selected==0){
        document.getElementById("friends_reviews").innerHTML += this.responseText;
    }
    
};
if(nextPage != null){
    nextPage.addEventListener('click', () => {
        if(selected==0){
            publicPage++;
            movie_pagination.open("GET", "/api/public_feed/"+publicPage, true);
        }
        else if(selected==1){
            privatePage++;
            movie_pagination.open("GET", "/api/friends_feed/"+privatePage, true);
        }
        movie_pagination.send();
    });
}