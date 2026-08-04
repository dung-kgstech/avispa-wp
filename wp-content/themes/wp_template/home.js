'use strict';

document.addEventListener('DOMContentLoaded', function () {
    const movieCarousel = document.querySelector('[data-movie-carousel]');

    if (movieCarousel) {
        const movieCards = Array.from(movieCarousel.querySelectorAll('.movie-card'));
        const movieDots = Array.from(movieCarousel.querySelectorAll('[data-movie-dot]'));
        const previousButton = movieCarousel.querySelector('.movie-carousel__arrow--prev');
        const nextButton = movieCarousel.querySelector('.movie-carousel__arrow--next');
        const stage = movieCarousel.querySelector('.movie-carousel__stage');
        const reduceMovieMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let activeMovieIndex = 0;
        let swipeStartX = null;
        let movieTimer = null;

        function setActiveMovie(index) {
            const itemCount = movieCards.length;
            activeMovieIndex = (index + itemCount) % itemCount;
            const previousIndex = (activeMovieIndex - 1 + itemCount) % itemCount;
            const nextIndex = (activeMovieIndex + 1) % itemCount;

            movieCards.forEach(function (card, cardIndex) {
                card.classList.toggle('is-active', cardIndex === activeMovieIndex);
                card.classList.toggle('is-prev', cardIndex === previousIndex);
                card.classList.toggle('is-next', cardIndex === nextIndex);
            });

            movieDots.forEach(function (dot, dotIndex) {
                const isActive = dotIndex === activeMovieIndex;
                dot.classList.toggle('is-active', isActive);
                if (isActive) {
                    dot.setAttribute('aria-current', 'true');
                } else {
                    dot.removeAttribute('aria-current');
                }
            });
        }

        function startMovieCarousel() {
            window.clearInterval(movieTimer);
            if (!reduceMovieMotion.matches) {
                movieTimer = window.setInterval(function () {
                    setActiveMovie(activeMovieIndex + 1);
                }, 3600);
            }
        }

        function selectMovie(index) {
            setActiveMovie(index);
            startMovieCarousel();
        }

        previousButton.addEventListener('click', function () { selectMovie(activeMovieIndex - 1); });
        nextButton.addEventListener('click', function () { selectMovie(activeMovieIndex + 1); });

        movieCards.forEach(function (card) {
            card.addEventListener('click', function (event) {
                const cardIndex = Number(card.dataset.movieIndex);
                if (cardIndex !== activeMovieIndex) {
                    event.preventDefault();
                    selectMovie(cardIndex);
                }
            });
        });

        movieDots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                selectMovie(Number(dot.dataset.movieDot));
            });
        });

        stage.addEventListener('pointerdown', function (event) {
            swipeStartX = event.clientX;
            window.clearInterval(movieTimer);
        });

        stage.addEventListener('pointerup', function (event) {
            if (null === swipeStartX) return;
            const distance = event.clientX - swipeStartX;
            swipeStartX = null;
            if (Math.abs(distance) >= 30) {
                setActiveMovie(activeMovieIndex + (distance < 0 ? 1 : -1));
            }
            startMovieCarousel();
        });

        stage.addEventListener('pointercancel', function () {
            swipeStartX = null;
            startMovieCarousel();
        });
        movieCarousel.addEventListener('mouseenter', function () { window.clearInterval(movieTimer); });
        movieCarousel.addEventListener('mouseleave', startMovieCarousel);
        reduceMovieMotion.addEventListener('change', startMovieCarousel);

        setActiveMovie(0);
        startMovieCarousel();
    }
    const topTeamCarousel = document.querySelector('[data-top-team-carousel]');

    if (topTeamCarousel) {
        const viewport = topTeamCarousel.querySelector('.top-team-carousel__viewport');
        const groups = Array.from(topTeamCarousel.querySelectorAll('.top-team-carousel__group'));
        const cards = Array.from(groups[0].querySelectorAll('.top-team-card'));
        const previousButton = topTeamCarousel.querySelector('.top-team-carousel__arrow--prev');
        const nextButton = topTeamCarousel.querySelector('.top-team-carousel__arrow--next');
        const topTeamMobile = window.matchMedia('(max-width: 768px)');
        let isDragging = false;
        let dragStartX = 0;
        let dragStartScroll = 0;
        let suppressCardClick = false;
        let normalizeTimer = null;

        function topTeamGroupWidth() {
            return groups[1].offsetLeft - groups[0].offsetLeft;
        }

        function topTeamCardStep() {
            if (cards.length < 2) return cards[0] ? cards[0].offsetWidth : 0;
            return cards[1].offsetLeft - cards[0].offsetLeft;
        }

        function normalizeTopTeamPosition() {
            const width = topTeamGroupWidth();
            if (!width) return;

            let nextPosition = viewport.scrollLeft;
            if (nextPosition >= width * 2) {
                nextPosition -= width;
            } else if (nextPosition <= 0) {
                nextPosition += width;
            } else {
                return;
            }

            viewport.style.scrollBehavior = 'auto';
            viewport.scrollLeft = nextPosition;
            requestAnimationFrame(function () {
                viewport.style.removeProperty('scroll-behavior');
            });
        }

        function moveTopTeam(direction) {
            viewport.scrollBy({ left: topTeamCardStep() * direction, behavior: 'smooth' });
            window.clearTimeout(normalizeTimer);
            normalizeTimer = window.setTimeout(normalizeTopTeamPosition, 550);
        }

        function setInitialTopTeamPosition() {
            viewport.style.scrollBehavior = 'auto';
            viewport.scrollLeft = topTeamGroupWidth();
            requestAnimationFrame(function () {
                viewport.style.removeProperty('scroll-behavior');
            });
        }

        previousButton.addEventListener('click', function () { moveTopTeam(-1); });
        nextButton.addEventListener('click', function () { moveTopTeam(1); });
        topTeamMobile.addEventListener('change', setInitialTopTeamPosition);
        requestAnimationFrame(setInitialTopTeamPosition);

        viewport.addEventListener('pointerdown', function (event) {
            if (event.pointerType === 'mouse' && event.button !== 0) return;
            isDragging = true;
            suppressCardClick = false;
            dragStartX = event.clientX;
            dragStartScroll = viewport.scrollLeft;
            viewport.setPointerCapture(event.pointerId);
        });

        viewport.addEventListener('pointermove', function (event) {
            if (!isDragging) return;
            const distance = event.clientX - dragStartX;
            if (Math.abs(distance) > 5) suppressCardClick = true;
            viewport.scrollLeft = dragStartScroll - distance;
        });

        function finishTopTeamDrag(event) {
            if (!isDragging) return;
            isDragging = false;
            if (viewport.hasPointerCapture(event.pointerId)) {
                viewport.releasePointerCapture(event.pointerId);
            }
            window.setTimeout(normalizeTopTeamPosition, 120);
        }

        viewport.addEventListener('pointerup', finishTopTeamDrag);
        viewport.addEventListener('pointercancel', finishTopTeamDrag);
        viewport.addEventListener('click', function (event) {
            if (suppressCardClick) {
                event.preventDefault();
                suppressCardClick = false;
            }
        });
    }
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

        function partnerCardStep() {
            if (cards.length < 2) return cards[0] ? cards[0].offsetWidth : 0;
            return cards[1].offsetLeft - cards[0].offsetLeft;
        }

        function movePartnerSlider(direction) {
            viewport.scrollBy({ left: partnerCardStep() * direction, behavior: 'smooth' });
        }

        previousButton.addEventListener('click', function () { movePartnerSlider(-1); });
        nextButton.addEventListener('click', function () { movePartnerSlider(1); });
    }

    const homeBanner = document.querySelector('[data-home-banner]');

    if (homeBanner) {
        const bannerSlides = Array.from(homeBanner.querySelectorAll('[data-banner-slide]'));
        const bannerThumbnails = Array.from(homeBanner.querySelectorAll('[data-banner-thumbnail]'));
        const reduceBannerMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let activeBannerIndex = 0;
        let bannerTimer = null;

        function showBanner(index) {
            const slideCount = bannerSlides.length;
            activeBannerIndex = (index + slideCount) % slideCount;
            const previousIndex = (activeBannerIndex - 1 + slideCount) % slideCount;
            const nextIndex = (activeBannerIndex + 1) % slideCount;

            bannerSlides.forEach(function (slide, slideIndex) {
                const isActive = slideIndex === activeBannerIndex;
                slide.classList.toggle('is-active', isActive);
                slide.classList.toggle('is-prev', slideIndex === previousIndex);
                slide.classList.toggle('is-next', slideIndex === nextIndex);
                slide.setAttribute('aria-hidden', String(!isActive));
            });

            bannerThumbnails.forEach(function (thumbnail) {
                const isActive = Number(thumbnail.dataset.bannerThumbnail) === activeBannerIndex;
                thumbnail.classList.toggle('is-active', isActive);
                if (isActive) {
                    thumbnail.setAttribute('aria-current', 'true');
                } else {
                    thumbnail.removeAttribute('aria-current');
                }
            });
        }

        function startBanner() {
            window.clearInterval(bannerTimer);
            if (!reduceBannerMotion.matches) {
                bannerTimer = window.setInterval(function () {
                    showBanner(activeBannerIndex + 1);
                }, 5000);
            }
        }

        bannerThumbnails.forEach(function (thumbnail) {
            thumbnail.addEventListener('click', function () {
                showBanner(Number(thumbnail.dataset.bannerThumbnail));
                startBanner();
            });
        });

        homeBanner.addEventListener('mouseenter', function () { window.clearInterval(bannerTimer); });
        homeBanner.addEventListener('mouseleave', startBanner);
        reduceBannerMotion.addEventListener('change', startBanner);
        showBanner(0);
        startBanner();
    }
    const matchSection = document.querySelector('.home-match');

    if (matchSection) {
        const matchTrack = matchSection.querySelector('.match-carousel__track');
        const matchCards = Array.from(matchSection.querySelectorAll('.match-card'));
        const matchTabs = Array.from(matchSection.querySelectorAll('.home-match__tab'));
        const matchPanels = Array.from(matchSection.querySelectorAll('.home-match__tab-panel'));
        const previousMatch = matchSection.querySelector('.match-carousel__arrow--prev');
        const nextMatch = matchSection.querySelector('.match-carousel__arrow--next');
        let activeCardIndex = 1;

        function showMatchTab(index) {
            matchTabs.forEach(function (tab, tabIndex) {
                const isActive = tabIndex === index;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', String(isActive));
            });

            matchPanels.forEach(function (panel, panelIndex) {
                const isActive = panelIndex === index;
                panel.classList.toggle('is-active', isActive);
                panel.hidden = !isActive;
            });
        }

        function showMatchCard(index) {
            activeCardIndex = (index + matchCards.length) % matchCards.length;
            matchTrack.style.transform = 'translateX(-' + matchCards[activeCardIndex].offsetLeft + 'px)';
            matchCards.forEach(function (card, cardIndex) {
                card.classList.toggle('is-active', cardIndex === activeCardIndex);
            });
        }

        matchTabs.forEach(function (tab, tabIndex) {
            tab.addEventListener('click', function () { showMatchTab(tabIndex); });
        });
        previousMatch.addEventListener('click', function () { showMatchCard(activeCardIndex - 1); });
        nextMatch.addEventListener('click', function () { showMatchCard(activeCardIndex + 1); });
        showMatchTab(0);
        showMatchCard(1);
    }
});
