window.addEventListener('load', () => {
    const loader = document.querySelector('.efas-heroine-wrapper.efas-heroine-loader');
    if (!loader) return;
    document.documentElement.style.overflow = "hidden";

    const loaderInner = loader.querySelector('.efas-heroine-inner');
    const hopsital = loader.querySelector("img#hospital");
    const hammer = loader.querySelector("img#hammer");
    const spark1 = loader.querySelector("img#spark1");
    const spark2 = loader.querySelector("img#spark2");
    const spark3 = loader.querySelector("img#spark3");
    const noDe = loader.querySelector("img#no-de");
    const efasDe = loader.querySelector("img#efas-de");
    const noFr = loader.querySelector("img#no-fr");
    const efasFr = loader.querySelector("img#efas-fr");
    const noIt = loader.querySelector("img#no-it");
    const efasIt = loader.querySelector("img#efas-it");
    const navHeader = document.querySelector('.efas-nav-header');

    setTimeout(() => {
        window.scrollTo(0, 0);
        hopsital.animate([
            { opacity: 0 },
            { opacity: 1 }
        ], {
            duration: 200,
            fill: 'forwards'
        })
    }, 500);

    setTimeout(() => {
        hammer.animate([
            { opacity: 0, transform: "rotate(78deg)" },
            { opacity: 1, transform: "rotate(0deg)" }
        ], {
            duration: 700,
            fill: 'forwards',
            easing: 'cubic-bezier(0.84, 0.05, 1, 0.39)'
        })
    }, 1200);

    setTimeout(() => {
        hopsital.animate([
            {
                width: "32%",
                top: "30%",
                left: "34%"
            },
            {
                width: "30.04193548%",
                top: "38.71325301%",
                left: "2.224193548%",
            }
        ], {
            duration: 100,
            fill: 'forwards',
            easing: 'cubic-bezier(0, 0.92, 0.38, 0.98)'
        })
        hammer.animate([
            {
                width: "38%",
                top: "0",
                left: "47%",
            },
            {
                width: "45.64032258%",
                top: "0%",
                left: "13.38064516%",
            }
        ], {
            duration: 100,
            fill: 'forwards',
            easing: 'cubic-bezier(0, 0.92, 0.38, 0.98)'
        })
        spark1.animate([
            {
                width: "1%",
                top: "42%",
                left: "49 %",
                opacity: 0
            },
            {
                width: "13.96451613%",
                top: "39.37108434%",
                left: "0%",
                opacity: 1
            }
        ], {
            duration: 100,
            fill: 'forwards',
            easing: 'cubic-bezier(0, 0.92, 0.38, 0.98)'
        })
        spark2.animate([
            {
                width: "1%",
                top: "42%",
                left: "49%",
                opacity: 0
            },
            {
                "width": "8.538709677%",
                "top": "31.97349398%",
                "left": "5.425806452%",
                opacity: 1
            }
        ], {
            duration: 100,
            fill: 'forwards',
            easing: 'cubic-bezier(0, 0.92, 0.38, 0.98)'
        })
        spark3.animate([
            {
                width: "1%",
                top: "42%",
                left: "49%",
                opacity: 0
            },
            {
                "width": "9.187096774%",
                "top": "39.1060241%",
                "left": "21.75%",
                opacity: 1
            }
        ], {
            duration: 100,
            fill: 'forwards',
            easing: 'cubic-bezier(0, 0.92, 0.38, 0.98)'
        })
    }, 1900);

    setTimeout(() => {
        if (noDe) {
            noDe.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })

            efasDe.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })
        } else if (noIt) {
            noIt.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })
            efasIt.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })
        } else if (noFr) {
            noFr.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })
            efasFr.animate([
                { opacity: 0 },
                { opacity: 1 }
            ], {
                duration: 200,
                fill: 'forwards'
            })
        }
    }, 2600);

    setTimeout(() => {
        loaderInner.animate([
            { maxWidth: "1700px" },
            { maxWidth: "620px" }
        ], {
            duration: 300,
            fill: 'forwards',
            easing: 'cubic-bezier(.02,.42,.59,.87)'
        })
    }, 4500);

    setTimeout(() => {
        loader.animate([
            { maxHeight: "calc(100 * var(--vh))" },
            { maxHeight: loaderInner.offsetHeight + "px" }
        ], {
            duration: 500,
            fill: 'forwards',
            easing: 'cubic-bezier(.02,.42,.59,.87)'
        })
    }, 4800);

    setTimeout(() => {
        navHeader.animate([
            { opacity: 1, marginTop: "-98px" },
            { opacity: 1, marginTop: "0px" }
        ], {
            duration: 500,
            fill: 'forwards'
        })
        document.documentElement.style.overflow = "auto";
        if (window.location.hash) {
            const hash = window.location.hash;
            const element = document.querySelector(hash);
            if (element) {
                element.scrollIntoView();
            }
        }
    }, 5000);
});