(function () {
    'use strict';

    const toggle = document.querySelector('.origin-menu-toggle');
    const nav = document.querySelector('.origin-primary-nav');

    function setMenuState(isOpen) {
        if (!toggle || !nav) {
            return;
        }

        nav.classList.toggle('is-open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        document.body.classList.toggle('origin-menu-open', isOpen);
    }

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';
            setMenuState(!isOpen);
        });

        document.addEventListener('click', function (event) {
            if (
                nav.classList.contains('is-open') &&
                !nav.contains(event.target) &&
                !toggle.contains(event.target)
            ) {
                setMenuState(false);
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && nav.classList.contains('is-open')) {
                setMenuState(false);
                toggle.focus();
            }
        });

        nav.addEventListener('click', function (event) {
            const link = event.target.closest('a');

            if (link && window.matchMedia('(max-width: 760px)').matches) {
                setMenuState(false);
            }
        });

        window.addEventListener('resize', function () {
            if (window.matchMedia('(min-width: 761px)').matches) {
                setMenuState(false);
            }
        });
    }

    const progressBar = document.querySelector('.origin-reading-progress');

    if (progressBar) {
        function updateReadingProgress() {
            const scrollTop =
                window.scrollY || document.documentElement.scrollTop;

            const scrollableHeight =
                document.documentElement.scrollHeight - window.innerHeight;

            const progress = scrollableHeight > 0
                ? Math.min(100, Math.max(0, (scrollTop / scrollableHeight) * 100))
                : 0;

            progressBar.style.width = progress + '%';
        }

        window.addEventListener('scroll', updateReadingProgress, {
            passive: true
        });

        updateReadingProgress();
    }
})();
