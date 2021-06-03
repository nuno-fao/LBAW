var toastIterator = 1;

function toast(message, type) {
    let option = {
        animation: true,
        delay: 2000

    };

    let toastId = "toast" + toastIterator.toString();

    let maindiv = document.createElement("div");
    maindiv.id = toastId;

    if(type=="s"){
        maindiv.className = "toast bg-success text-light"
    }
    else if(type=="w"){
        maindiv.className = "toast bg-warning text-light"
    }
    else if(type=="d"){
        maindiv.className = "toast bg-danger text-light"
    }
    
    maindiv.setAttribute("role", "alert");
    maindiv.setAttribute("aria-live", "assertive");
    maindiv.setAttribute("aria-atomic", "true");
    maindiv.style.position = 'absolute';
    maindiv.style.right = '1px';

    let seconddiv = document.createElement("div");
    seconddiv.className = "d-flex justify-content-between";

    let body = document.createElement("b");
    body.className = "toast-body";


    let text = document.createTextNode(message);
    body.appendChild(text);

    seconddiv.appendChild(body);

    // let close = document.createElement("button");
    // close.type = "button";
    // close.className = "btn-close my-auto me-2 ";
    // close.setAttribute("data-bs-dismiss", "toast");
    // close.setAttribute("aria-label", "Close");

    // seconddiv.appendChild(close);

    maindiv.appendChild(seconddiv);

    let target = document.getElementById("breadcrumb");

    target.parentElement.insertBefore(maindiv, target);

    let toastHTML = document.getElementById(toastId);
    let toastElement = new bootstrap.Toast(toastHTML, option);
    toastElement.show();

    toastIterator++;

}