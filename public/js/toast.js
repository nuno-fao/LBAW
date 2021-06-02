var toastIterator = 1;

function toast(message, element) {
    let option = {
        animation: true,
        delay: 2000

    };

    let toastId = "toast" + toastIterator.toString();

    let maindiv = document.createElement("div");
    maindiv.id = toastId;
    maindiv.className = "toast align-items-center"
    maindiv.setAttribute("role", "alert");
    maindiv.setAttribute("aria-live", "assertive");
    maindiv.setAttribute("aria-atomic", "true");

    let seconddiv = document.createElement("div");
    seconddiv.className = "d-flex";

    let body = document.createElement("div");
    body.className = "toast-body";

    let text = document.createTextNode(message);
    body.appendChild(text);

    seconddiv.appendChild(body);

    let close = document.createElement("button");
    close.type = "button";
    close.className = "btn-close me-2 m-auto";
    close.setAttribute("data-bs-dismiss", "toast");
    close.setAttribute("aria-label", "Close");

    seconddiv.appendChild(close);

    maindiv.appendChild(seconddiv);

    let target = document.getElementById(element);

    target.parentElement.insertBefore(maindiv, target);

    let toastHTML = document.getElementById(toastId);
    let toastElement = new bootstrap.Toast(toastHTML, option);
    toastElement.show();

    toastIterator++;

}