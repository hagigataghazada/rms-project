$(document).ready(function() {
    var hoverTimeout;

    // Sadece .profile sınıfındaki öğeye ve onun içerisindeki dropdown-menu'ye odaklanalım
    $('.profile').hover(function() {
        clearTimeout(hoverTimeout); // Önceki timeout'u temizle
        $(this).find('.dropdown-menu').stop(true, true).slideDown(200); // Menü göster
    }, function() {
        hoverTimeout = setTimeout(function() {
            $('.profile').find('.dropdown-menu').stop(true, true).slideUp(200); // Menü gizle
        }, 500); // Gecikmeyi burada ayarlayın (300 ms)
    });

    // Dropdown menüsüne fareyle gelindiğinde
    $('.dropdown-menu').hover(function() {
        clearTimeout(hoverTimeout); // Timeout'u temizle, menü gösterilmeye devam etsin
    }, function() {
        hoverTimeout = setTimeout(function() {
            $(this).stop(true, true).slideUp(200); // Menü gizle
        }, 500); // Gecikmeyi burada ayarlayın (300 ms)
    });
});
