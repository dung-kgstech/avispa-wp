jQuery(function ($) {
    const mobileNav = document.querySelector('.main-nav');
    const scrollbar = document.querySelector('.mobile-nav-scrollbar');
    const scrollbarThumb = document.querySelector('.mobile-nav-scrollbar-thumb');
    const mobileBreakpoint = window.matchMedia('(max-width: 394px)');

    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }

    function updateMobileScrollbar() {
        if (!mobileNav || !scrollbar || !scrollbarThumb) return;

        const trackInset = 10;
        const trackWidth = Math.max(0, scrollbar.clientWidth - trackInset);
        const maxScroll = mobileNav.scrollWidth - mobileNav.clientWidth;
        const visibleRatio = Math.min(1, mobileNav.clientWidth / mobileNav.scrollWidth);
        const thumbWidth = Math.max(32, trackWidth * visibleRatio);
        const travel = Math.max(0, trackWidth - thumbWidth);
        const progress = maxScroll > 0 ? mobileNav.scrollLeft / maxScroll : 0;

        scrollbarThumb.style.width = thumbWidth + 'px';
        scrollbarThumb.style.transform = 'translateX(' + (travel * progress) + 'px)';
    }

    function resetMobileNavPosition() {
        if (mobileNav && mobileBreakpoint.matches) {
            mobileNav.scrollTo({ left: 0, behavior: 'auto' });
        }
        updateMobileScrollbar();
    }

    function resetAfterLayout() {
        resetMobileNavPosition();
        requestAnimationFrame(function () {
            requestAnimationFrame(resetMobileNavPosition);
        });
        window.setTimeout(resetMobileNavPosition, 150);
    }

    if (mobileNav) {
        mobileNav.addEventListener('scroll', updateMobileScrollbar, { passive: true });
    }

    resetAfterLayout();
    window.addEventListener('load', resetAfterLayout);
    window.addEventListener('pageshow', resetAfterLayout);
    window.addEventListener('resize', updateMobileScrollbar);
    mobileBreakpoint.addEventListener('change', resetAfterLayout);

    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(resetAfterLayout);
    }

    const footerGroups = Array.from(document.querySelectorAll('.footer-group'));
    const footerMobileBreakpoint = window.matchMedia('(max-width: 394px)');

    function syncFooterGroups() {
        footerGroups.forEach(function (group) {
            const toggle = group.querySelector('.footer-group__toggle');
            if (!toggle) return;

            if (footerMobileBreakpoint.matches) {
                toggle.setAttribute('aria-expanded', String(group.classList.contains('is-open')));
                toggle.removeAttribute('tabindex');
            } else {
                toggle.setAttribute('aria-expanded', 'true');
                toggle.setAttribute('tabindex', '-1');
            }
        });
    }

    footerGroups.forEach(function (group) {
        const toggle = group.querySelector('.footer-group__toggle');
        if (!toggle) return;

        toggle.addEventListener('click', function () {
            if (!footerMobileBreakpoint.matches) return;

            const isOpen = group.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    });

    syncFooterGroups();
    footerMobileBreakpoint.addEventListener('change', syncFooterGroups);

    const goodsCarousel = document.querySelector('[data-goods-carousel]');

    if (goodsCarousel) {
        const goodsItems = Array.from(goodsCarousel.querySelectorAll('.goods-carousel__item'));
        const goodsDots = Array.from(goodsCarousel.querySelectorAll('[data-goods-dot]'));
        const reduceGoodsMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let activeGoodsIndex = 0;
        let goodsTimer = null;

        function setActiveGoods(index) {
            const itemCount = goodsItems.length;
            activeGoodsIndex = (index + itemCount) % itemCount;
            const previousIndex = (activeGoodsIndex - 1 + itemCount) % itemCount;
            const nextIndex = (activeGoodsIndex + 1) % itemCount;

            goodsItems.forEach(function (item, itemIndex) {
                item.classList.toggle('is-active', itemIndex === activeGoodsIndex);
                item.classList.toggle('is-prev', itemIndex === previousIndex);
                item.classList.toggle('is-next', itemIndex === nextIndex);
            });

            goodsDots.forEach(function (dot, dotIndex) {
                const isActive = dotIndex === activeGoodsIndex;
                dot.classList.toggle('is-active', isActive);
                if (isActive) {
                    dot.setAttribute('aria-current', 'true');
                } else {
                    dot.removeAttribute('aria-current');
                }
            });
        }

        function startGoodsCarousel() {
            window.clearInterval(goodsTimer);
            if (!reduceGoodsMotion.matches) {
                goodsTimer = window.setInterval(function () {
                    setActiveGoods(activeGoodsIndex + 1);
                }, 4000);
            }
        }

        goodsItems.forEach(function (item) {
            item.addEventListener('click', function () {
                setActiveGoods(Number(item.dataset.goodsIndex));
                startGoodsCarousel();
            });
        });

        goodsDots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                setActiveGoods(Number(dot.dataset.goodsDot));
                startGoodsCarousel();
            });
        });

        goodsCarousel.addEventListener('mouseenter', function () { window.clearInterval(goodsTimer); });
        goodsCarousel.addEventListener('mouseleave', startGoodsCarousel);
        reduceGoodsMotion.addEventListener('change', startGoodsCarousel);
        setActiveGoods(0);
        startGoodsCarousel();
    }
    const partnerSlider = document.querySelector('[data-partner-slider]');

    if (partnerSlider) {
        const viewport = partnerSlider.querySelector('.partner-stories__viewport');
        const cards = Array.from(partnerSlider.querySelectorAll('.partner-story'));
        const previousButton = partnerSlider.querySelector('.partner-stories__arrow--prev');
        const nextButton = partnerSlider.querySelector('.partner-stories__arrow--next');
        const dots = Array.from(document.querySelectorAll('.partner-stories__dots span'));

        function partnerCardStep() {
            if (cards.length < 2) return cards[0] ? cards[0].offsetWidth : 0;
            return cards[1].offsetLeft - cards[0].offsetLeft;
        }

        function updatePartnerDots() {
            const step = partnerCardStep();
            if (!step) return;
            const activeIndex = Math.min(dots.length - 1, Math.max(0, Math.round(viewport.scrollLeft / step)));
            dots.forEach(function (dot, index) {
                dot.classList.toggle('is-active', index === activeIndex);
            });
        }

        function movePartnerSlider(direction) {
            viewport.scrollBy({ left: partnerCardStep() * direction, behavior: 'smooth' });
        }

        previousButton.addEventListener('click', function () { movePartnerSlider(-1); });
        nextButton.addEventListener('click', function () { movePartnerSlider(1); });
        viewport.addEventListener('scroll', updatePartnerDots, { passive: true });
        updatePartnerDots();
    }
    const newsSlider = document.querySelector('.footer-news-slider__viewport');

    if (newsSlider) {
        const groups = Array.from(newsSlider.querySelectorAll('.footer-news-slider__group'));
        const firstGroupItems = Array.from(groups[0].querySelectorAll('.footer-news-slider__item'));
        const dots = Array.from(document.querySelectorAll('.footer-news-slider__pagination span'));
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let autoTimer = null;
        let resetTimer = null;
        let isDragging = false;
        let dragStartX = 0;
        let dragStartScroll = 0;
        let suppressClick = false;

        function groupWidth() {
            return groups[1].offsetLeft - groups[0].offsetLeft;
        }

        function cardStep() {
            if (firstGroupItems.length < 2) return 0;
            return firstGroupItems[1].offsetLeft - firstGroupItems[0].offsetLeft;
        }

        function normalizeSliderPosition() {
            const width = groupWidth();
            if (!width) return;

            if (newsSlider.scrollLeft >= width * 2) {
                newsSlider.scrollLeft -= width;
            } else if (newsSlider.scrollLeft < 1) {
                newsSlider.scrollLeft += width;
            }
        }

        function updateSliderPagination() {
            const width = groupWidth();
            const step = cardStep();
            if (!width || !step || !dots.length) return;

            const relativePosition = ((newsSlider.scrollLeft - width) % width + width) % width;
            const activeIndex = Math.round(relativePosition / step) % dots.length;
            dots.forEach(function (dot, index) {
                dot.classList.toggle('is-active', index === activeIndex);
            });
        }

        function advanceNewsSlider() {
            const step = cardStep();
            if (!step || isDragging) return;

            newsSlider.scrollBy({
                left: step * 2,
                behavior: reduceMotion.matches ? 'auto' : 'smooth'
            });

            window.clearTimeout(resetTimer);
            resetTimer = window.setTimeout(function () {
                normalizeSliderPosition();
                updateSliderPagination();
            }, 650);
        }

        function startNewsSlider() {
            window.clearInterval(autoTimer);
            if (!reduceMotion.matches) {
                autoTimer = window.setInterval(advanceNewsSlider, 3000);
            }
        }

        function resetNewsSliderTimer() {
            window.clearInterval(autoTimer);
            startNewsSlider();
        }

        function setInitialSliderPosition() {
            newsSlider.style.scrollBehavior = 'auto';
            newsSlider.scrollLeft = groupWidth();
            requestAnimationFrame(function () {
                newsSlider.style.removeProperty('scroll-behavior');
                updateSliderPagination();
            });
        }

        newsSlider.addEventListener('pointerdown', function (event) {
            if (event.pointerType === 'mouse' && event.button !== 0) return;
            isDragging = true;
            suppressClick = false;
            dragStartX = event.clientX;
            dragStartScroll = newsSlider.scrollLeft;
            newsSlider.classList.add('is-dragging');
            newsSlider.setPointerCapture(event.pointerId);
            window.clearInterval(autoTimer);
        });

        newsSlider.addEventListener('pointermove', function (event) {
            if (!isDragging) return;
            const distance = event.clientX - dragStartX;
            if (Math.abs(distance) > 5) suppressClick = true;
            newsSlider.scrollLeft = dragStartScroll - distance;
            normalizeSliderPosition();
            updateSliderPagination();
        });

        function finishSliderDrag(event) {
            if (!isDragging) return;
            isDragging = false;
            newsSlider.classList.remove('is-dragging');
            if (newsSlider.hasPointerCapture(event.pointerId)) {
                newsSlider.releasePointerCapture(event.pointerId);
            }
            normalizeSliderPosition();
            updateSliderPagination();
            resetNewsSliderTimer();
        }

        newsSlider.addEventListener('pointerup', finishSliderDrag);
        newsSlider.addEventListener('pointercancel', finishSliderDrag);
        newsSlider.addEventListener('click', function (event) {
            if (suppressClick) {
                event.preventDefault();
                suppressClick = false;
            }
        });
        newsSlider.addEventListener('scroll', updateSliderPagination, { passive: true });
        newsSlider.addEventListener('mouseenter', function () { window.clearInterval(autoTimer); });
        newsSlider.addEventListener('mouseleave', function () { if (!isDragging) startNewsSlider(); });
        reduceMotion.addEventListener('change', startNewsSlider);
        window.addEventListener('resize', setInitialSliderPosition);

        setInitialSliderPosition();
        startNewsSlider();
    }
});
