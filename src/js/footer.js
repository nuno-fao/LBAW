let last_scrollY = 0;
let footer = document.querySelector(".scroll");
window.addEventListener('scroll', () => {
    if (window.scrollY > last_scrollY) {
        footer.style.display = "none";
    } else {
        footer.style.display = "";
    }
    last_scrollY = window.scrollY;
});
footer = document.querySelector(".scroll");