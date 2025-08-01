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

    // トップページのブログ、施工実績のスライド
    function setupHorizontalSlider({ listSelector, itemSelector, prevBtnSelector, nextBtnSelector }) {
        const list = document.querySelector(listSelector);
        const prevButton = document.querySelector(prevBtnSelector);
        const nextButton = document.querySelector(nextBtnSelector);

        if (!list || !prevButton || !nextButton) return;

        const item = list.querySelector(itemSelector);
        if (!item) return;

        const computedStyle = window.getComputedStyle(list);
        const gap = parseFloat(computedStyle.gap) || 10;
        const scrollAmount = item.offsetWidth + gap;

        const updateButtonVisibility = () => {
            const isScrollable = list.scrollWidth > list.clientWidth;

            if (isScrollable) {
                prevButton.style.visibility = list.scrollLeft < 1 ? 'hidden' : 'visible';
                nextButton.style.visibility = list.scrollWidth - list.scrollLeft - list.clientWidth < 1 ? 'hidden' : 'visible';
            } else {
                prevButton.style.visibility = 'hidden';
                nextButton.style.visibility = 'hidden';
            }
        };

        nextButton.addEventListener('click', () => {
            list.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        prevButton.addEventListener('click', () => {
            list.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        list.addEventListener('scroll', updateButtonVisibility);
        window.addEventListener('resize', updateButtonVisibility);

        updateButtonVisibility();
    }

    setupHorizontalSlider({
        listSelector: '.ut_works_slider_list',
        itemSelector: '.ut_works_slider_item',
        prevBtnSelector: '.ut_works_prev',
        nextBtnSelector: '.ut_works_next'
    });

    setupHorizontalSlider({
        listSelector: '.ut_blog_slider_list',
        itemSelector: '.ut_blog_slider_item',
        prevBtnSelector: '.ut_blog_prev',
        nextBtnSelector: '.ut_blog_next'
    });
    
    
});