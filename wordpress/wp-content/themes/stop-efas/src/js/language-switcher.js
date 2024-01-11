window.addEventListener('load', function () {
    const langSwitcherButton = document.querySelector('.efas-language-switcher');
    const langs = langSwitcherButton.querySelectorAll('.efas-language-switcher__lang');

    langSwitcherButton.addEventListener('click', function () {
        if (!langSwitcherButton.classList.contains('efas-language-switcher--open')) {
            for (let i = 0; i < langs.length; i++) {
                let lang = langs[i];
                setTimeout(function () {
                    lang.animate([
                        { transform: 'translateY(0)' },
                        { transform: `translateY(calc((-100% - 0.5rem) * ${i + 1}))` }
                    ], {
                        duration: 200,
                        easing: 'ease-out',
                        fill: 'forwards'
                    });
                }, i * 100);
            }
            langSwitcherButton.classList.add('efas-language-switcher--open');
        } else {
            for (let i = 0; i < langs.length; i++) {
                let lang = langs[i];
                setTimeout(function () {
                    lang.animate([
                        { transform: `translateY(calc((-100% - 0.5rem) * ${i + 1}))` },
                        { transform: 'translateY(0)' }
                    ], {
                        duration: 200,
                        easing: 'ease-out',
                        fill: 'forwards'
                    });
                }, i * 100);
            }
            langSwitcherButton.classList.remove('efas-language-switcher--open');
        }
    });
});