function navlink() {
    let menu = document.getElementById("navmenu");
    let icon = document.getElementById("navicon");

    icon.classList.toggle("fa-x");
    icon.classList.toggle("fa-bars");
    menu.classList.toggle("hidden");
}

// Navbar Fixed
window.onscroll = function () {
    const header = document.getElementById("navbar");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("fixed");
        header.classList.add("w-full");
    } else {
        header.classList.remove("fixed");
        header.classList.remove("w-full");
    }
};
