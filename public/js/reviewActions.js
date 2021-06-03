function deleteReview(rid, id) {
    let deleteAjax = new XMLHttpRequest();
    let review = document.getElementById(rid)

    deleteAjax.onload = function() {
        console.log(deleteAjax.status)
        if (deleteAjax.status != 200) {
            console.log("why")
            toast("Error while deleing message", review.id)
            return
        }
        if (typeof review_page != "undefined" && review_page) {
            window.location.replace("/");
        }
        toast("Review Successfully Deleted", review.id)
        review.remove();
        if(typeof inDashboard !== 'undefined'){
            decrementCount();
        }
    };
    if (review != null) {
        deleteAjax.open("DELETE", "/api/review/" + id, true);
        deleteAjax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        deleteAjax.send();
    }
    
}

function reportReview(rid, id) {
    let reportAjax = new XMLHttpRequest();

    reportAjax.onload = function() {
        let button = document.querySelector("#" + rid + " .report_button");
        if (button != null) {
            button.disabled = true;
        }
    };

    reportAjax.open("POST", "/api/review/" + id + "/report", true);
    reportAjax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
    reportAjax.send();
}

function removeReport(rid, id) {
    let deleteAjax = new XMLHttpRequest();

    deleteAjax.onload = function() {
        review.remove();
    };

    let review = document.getElementById(rid)
    if (review != null) {
        deleteAjax.open("DELETE", "/api/admin/reviews/board/report/" + id, true);
        deleteAjax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
        deleteAjax.send();
    }

    if(typeof inDashboard !== 'undefined'){
        decrementCount();
    }
}