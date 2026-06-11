(function () {
    const toggle = document.querySelector('.origin-menu-toggle');
    const nav = document.querySelector('.origin-primary-nav');

    if (!toggle || !nav) {
        return;
    }

    toggle.addEventListener('click', function () {
        const isOpen = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
})();