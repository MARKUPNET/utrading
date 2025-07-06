document.addEventListener('DOMContentLoaded', function () {
    // ハンバーガーメニューの表示制御
    const hamburger = document.getElementById('js-hamburger');
    const wrapper = document.querySelector('.wrapper');
    if (hamburger && wrapper) {
        hamburger.addEventListener('click', function () {
            wrapper.classList.toggle('ut_gmenu_open');
        });
    }

    // pagetopの表示制御
    const pagetop = document.querySelector('.pagetop');
    window.addEventListener('scroll', function () {
        if (!pagetop) return;
        if (window.scrollY >= 100) {
            pagetop.classList.add('visible');
        } else {
            pagetop.classList.remove('visible');
        }
    });

    // ut_blockが画面内に入ったらactiveクラスをトグル
    const utBlocks = document.querySelectorAll('.ut_block, .ut_scroll');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                } else {
                    entry.target.classList.remove('active');
                }
            });
        }, {
            threshold: 0.1 // 10%見えたら発火
        });
        utBlocks.forEach(block => observer.observe(block));
    }
});