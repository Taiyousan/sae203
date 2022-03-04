function toggle() {

    document.getElementById("toggle").classList.toggle('is-active');

    var MaNav = document.getElementsByClassName("navbar-list");

    if (MaNav.length > 0) {
        document.getElementById("navbar-mobile").classList.remove('navbar-list');
        document.getElementById("navbar-mobile").classList.add('lemenu');
    } else {
        document.getElementById("navbar-mobile").classList.add('navbar-list');
        document.getElementById("navbar-mobile").classList.remove('lemenu');
    }
}