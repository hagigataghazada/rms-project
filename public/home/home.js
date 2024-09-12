let slideIndex = 0;
const slides = document.querySelector('.slides');
const slideCount = slides.children.length;
const visibleSlides = 5;
const totalGroups = Math.ceil(slideCount / visibleSlides);

function showSlide(index) {
    const maxOffset = (totalGroups - 1) * 100;
    if (index >= totalGroups) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = totalGroups - 1;
    } else {
        slideIndex = index;
    }

    const offset = -slideIndex * 100;
    slides.style.transform = `translateX(${offset}%)`;
}

function changeSlide(n) {
    showSlide(slideIndex + n);
}

setInterval(() => {
    changeSlide(1);
}, 4000);

document.querySelector('.navbar a[href="#login-section"]').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('#login-section').scrollIntoView({
        behavior: 'smooth'
    });
});
