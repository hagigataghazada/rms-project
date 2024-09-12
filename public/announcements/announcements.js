    document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.getElementById('navbarDropdown');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdown.addEventListener('click', function (event) {
    event.preventDefault();
    dropdownMenu.classList.toggle('show');
});

    document.addEventListener('click', function (event) {
    if (!dropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.classList.remove('show');
}
});
});
