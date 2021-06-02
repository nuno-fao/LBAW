9
let aside = document.querySelector(".sticky_left_aside");
let friends = document.querySelector("#down_section");
let sec = document.querySelector("#collapsable_section");
let navbar = document.querySelector("nav");
let h = 0
if (aside !== null)
    h = aside.clientHeight + navbar.clientHeight + 50;
let removed = false;
if (window.innerWidth >= 980 && window.innerHeight <= h && removed === false) {
    sec.removeChild(friends)
    removed = true;
}
window.onresize = () => {
    if (window.innerWidth >= 980 && window.innerHeight <= h && removed === false) {
        sec.removeChild(friends)
        removed = true;

    } else if (window.innerWidth >= 980 && window.innerHeight > h && removed === true) {
        sec.appendChild(friends)
        removed = false;

    }

}