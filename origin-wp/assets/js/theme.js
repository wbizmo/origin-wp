(function () {
    const toggle = document.querySelector('.origin-menu-toggle');
    const nav = document.querySelector('.origin-primary-nav');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            const isOpen = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }

    const progressBar = document.querySelector('.origin-reading-progress');

    if (progressBar) {
        window.addEventListener('scroll', function () {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;

            if (docHeight <= 0) {
                return;
            }

            const progress = (scrollTop / docHeight) * 100;

            progressBar.style.width = progress + '%';
        });
    }
})();