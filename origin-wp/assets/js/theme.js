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

    function getMenuFocusable() {
        return Array.prototype.slice.call(
            nav.querySelectorAll('a[href], button:not([disabled])')
        );
    }

    function isMobileMenuView() {
        return window.matchMedia('(max-width: 760px)').matches;
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

        /**
         * Trap keyboard focus inside the mobile menu modal while it is open.
         *
         * The toggle button doubles as the modal's close control, so the
         * focusable sequence is: [toggle/close button, ...menu links].
         *
         * - Tab past the last menu link moves focus to the close button.
         * - Shift+Tab on the close button moves focus to the last menu link.
         * - Shift+Tab on the first menu link naturally lands back on the
         *   close button already, since it is the previous element in the
         *   DOM, so no extra handling is required for that case.
         */
        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Tab' || !nav.classList.contains('is-open') || !isMobileMenuView()) {
                return;
            }

            const focusable = getMenuFocusable();

            if (!focusable.length) {
                return;
            }

            const lastFocusable = focusable[focusable.length - 1];
            const active = document.activeElement;

            if (!event.shiftKey && active === lastFocusable) {
                event.preventDefault();
                toggle.focus();
            } else if (event.shiftKey && active === toggle) {
                event.preventDefault();
                lastFocusable.focus();
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
