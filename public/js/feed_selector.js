let public_feed = document.querySelector("#public_feed")
let friends_feed = document.querySelector("#friends_feed")

let btn_public = document.querySelector("#btn-public > button")
let btn_friends = document.querySelector("#btn-friends > button")

let bar_public = document.querySelector("#btn-public > div")
let bar_friends = document.querySelector("#btn-friends > div")



let selected = 0;
let public_scroll = 0;
let private_scroll = 0;

btn_public.addEventListener("click", () => {
    if (selected !== 0) {

        private_scroll = document.documentElement.scrollTop

        selected = 0;
        public_feed.style.display = "block";
        friends_feed.style.display = "none";
        let a = bar_friends.className.replace("bg-primary", "bg-secondary")
        let b = bar_public.className.replace("bg-secondary", "bg-primary")

        bar_friends.className = a;
        bar_public.className = b;
        btn_public.blur()

        setTimeout(function() {
            document.documentElement.scrollTop = public_scroll
        }, 200);

    } else {
        document.documentElement.scrollTop = 0;
        public_scroll = 0
    }
})

btn_friends.addEventListener("click", () => {
    if (selected !== 1) {

        public_scroll = document.documentElement.scrollTop

        selected = 1;
        public_feed.style.display = "none";
        friends_feed.style.display = "block";
        let a = bar_public.className.replace("bg-primary", "bg-secondary")
        let b = bar_friends.className.replace("bg-secondary", "bg-primary")

        bar_public.className = a;
        bar_friends.className = b;
        btn_friends.blur()

        setTimeout(function() {
            document.documentElement.scrollTop = private_scroll
        }, 200);
    } else {
        document.documentElement.scrollTop = 0;
        private_scroll = 0
    }
})