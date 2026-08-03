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

    const bannerSlider = document.querySelector('.footer-banner-slider__viewport');

    if (bannerSlider) {
        const groups = Array.from(bannerSlider.querySelectorAll('.footer-banner-slider__group'));
        const firstGroupItems = Array.from(groups[0].querySelectorAll('.footer-banner-slider__item'));
        const dots = Array.from(document.querySelectorAll('.footer-banner-slider__pagination span'));
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

            if (bannerSlider.scrollLeft >= width * 2) {
                bannerSlider.scrollLeft -= width;
            } else if (bannerSlider.scrollLeft < 1) {
                bannerSlider.scrollLeft += width;
            }
        }

        function updateSliderPagination() {
            const width = groupWidth();
            const step = cardStep();
            if (!width || !step || !dots.length) return;

            const relativePosition = ((bannerSlider.scrollLeft - width) % width + width) % width;
            const activeIndex = Math.round(relativePosition / step) % dots.length;
            dots.forEach(function (dot, index) {
                dot.classList.toggle('is-active', index === activeIndex);
            });
        }

        function advanceBannerSlider() {
            const step = cardStep();
            if (!step || isDragging) return;

            bannerSlider.scrollBy({
                left: step * 2,
                behavior: reduceMotion.matches ? 'auto' : 'smooth'
            });

            window.clearTimeout(resetTimer);
            resetTimer = window.setTimeout(function () {
                normalizeSliderPosition();
                updateSliderPagination();
            }, 650);
        }

        function startBannerSlider() {
            window.clearInterval(autoTimer);
            if (!reduceMotion.matches) {
                autoTimer = window.setInterval(advanceBannerSlider, 3000);
            }
        }

        function resetBannerSliderTimer() {
            window.clearInterval(autoTimer);
            startBannerSlider();
        }

        function setInitialSliderPosition() {
            bannerSlider.style.scrollBehavior = 'auto';
            bannerSlider.scrollLeft = groupWidth();
            requestAnimationFrame(function () {
                bannerSlider.style.removeProperty('scroll-behavior');
                updateSliderPagination();
            });
        }

        bannerSlider.addEventListener('pointerdown', function (event) {
            if (event.pointerType === 'mouse' && event.button !== 0) return;
            isDragging = true;
            suppressClick = false;
            dragStartX = event.clientX;
            dragStartScroll = bannerSlider.scrollLeft;
            bannerSlider.classList.add('is-dragging');
            bannerSlider.setPointerCapture(event.pointerId);
            window.clearInterval(autoTimer);
        });

        bannerSlider.addEventListener('pointermove', function (event) {
            if (!isDragging) return;
            const distance = event.clientX - dragStartX;
            if (Math.abs(distance) > 5) suppressClick = true;
            bannerSlider.scrollLeft = dragStartScroll - distance;
            normalizeSliderPosition();
            updateSliderPagination();
        });

        function finishSliderDrag(event) {
            if (!isDragging) return;
            isDragging = false;
            bannerSlider.classList.remove('is-dragging');
            if (bannerSlider.hasPointerCapture(event.pointerId)) {
                bannerSlider.releasePointerCapture(event.pointerId);
            }
            normalizeSliderPosition();
            updateSliderPagination();
            resetBannerSliderTimer();
        }

        bannerSlider.addEventListener('pointerup', finishSliderDrag);
        bannerSlider.addEventListener('pointercancel', finishSliderDrag);
        bannerSlider.addEventListener('click', function (event) {
            if (suppressClick) {
                event.preventDefault();
                suppressClick = false;
            }
        });
        bannerSlider.addEventListener('scroll', updateSliderPagination, { passive: true });
        bannerSlider.addEventListener('mouseenter', function () { window.clearInterval(autoTimer); });
        bannerSlider.addEventListener('mouseleave', function () { if (!isDragging) startBannerSlider(); });
        reduceMotion.addEventListener('change', startBannerSlider);
        window.addEventListener('resize', setInitialSliderPosition);

        setInitialSliderPosition();
        startBannerSlider();
    }
});
