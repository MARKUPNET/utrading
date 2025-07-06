document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('js-hamburger');
    const wrapper = document.querySelector('.wrapper');
    if (hamburger && wrapper) {
        hamburger.addEventListener('click', function () {
            wrapper.classList.toggle('ut_gmenu_open');
        });
    }
});