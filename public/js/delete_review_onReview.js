let deleteButtonOnReview = document.getElementById("deleteButton");
let deleteButtonOnReview_ajax = new XMLHttpRequest();

deleteButtonOnReview_ajax.onload = function() {
        window.location.replace("/");
};
if(deleteButtonOnReview != null){
    deleteButtonOnReview.addEventListener('click', () => {
        deleteButtonOnReview_ajax.open("DELETE", "/api/review/"+review_id, true);
        deleteButtonOnReview_ajax.setRequestHeader('X-CSRF-TOKEN',document.head.querySelector("[name~=csrf-token][content]").content)
        deleteButtonOnReview_ajax.send();
    });
}
