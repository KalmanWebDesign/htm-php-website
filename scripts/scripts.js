const navOpen = document.getElementsByClassName('fa-bars')[0];
const navClose = document.getElementsByClassName('fa-x')[0];
const mobileNav = document.getElementsByClassName('nav-links')[0];


function openNav() {
    mobileNav.style.right = 0;
}

function closeNav() {
    mobileNav.style.right = "-20rem";
}

navOpen.addEventListener('click', openNav);
navClose.addEventListener('click', closeNav);

