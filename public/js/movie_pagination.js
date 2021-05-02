var page = 0;

let nextPage = document.getElementById("nextPage");
let movie_pagination = new XMLHttpRequest();

movie_pagination.onload = function() {
    if(this.responseText.length == 0){
        let elem = document.getElementById('nextPage');
        elem.parentNode.removeChild(elem);
        return
    }
    document.getElementById("review_section").innerHTML += this.responseText;
};
if(nextPage != null){
    page += 1;
    nextPage.addEventListener('click', () => {
        console.log("/api/movie/"+movie_id+"/feed/"+page)
        movie_pagination.open("GET", "/api/movie/"+movie_id+"/feed/"+page, true);
        movie_pagination.send();
    });
}
