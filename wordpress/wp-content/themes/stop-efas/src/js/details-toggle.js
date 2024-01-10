window.addEventListener("click", function (e) {
    let toggle = e.target.closest(".efas-details-toggle");
    let content = e.target.closest(".efas-details-toggle__content");
    if (!toggle) return;
    if (content) return;
    content = toggle.querySelector(".efas-details-toggle__content");
    let inner = content.querySelector(".acf-innerblocks-container");
    let icon = toggle.querySelector(".efas-details-toggle__icon");
    if (!content) return;
    if (toggle.hasAttribute("open")) {
        content.animate([
            { maxHeight: content.scrollHeight + "px" },
            { maxHeight: 0 }
        ], {
            duration: 300,
            easing: "ease-out",
            fill: "forwards"
        });
        icon.animate([
            { transform: "rotate(180deg)" },
            { transform: "rotate(0deg)" }
        ], {
            duration: 300,
            easing: "ease-out",
            fill: "forwards"
        });
        inner.animate([
            { opacity: 1 },
            { opacity: 0 }
        ], {
            duration: 300,
            easing: "ease-out",
            fill: "forwards"
        });
        toggle.removeAttribute("open");
    } else {
        content.animate([
            { maxHeight: 0, offset: 0 },
            { maxHeight: content.scrollHeight + "px", offset: 0.99 },
            { maxHeight: "none", offset: 1 }
        ], {
            duration: 300,
            easing: "ease-out",
            fill: "forwards"
        });
        icon.animate([
            { transform: "rotate(0deg)" },
            { transform: "rotate(180deg)" }
        ], {
            duration: 300,
            easing: "ease-out",
            fill: "forwards"
        });
        inner.animate([
            { opacity: 0, offset: 0 },
            { opacity: 0, offset: 0.5 },
            { opacity: 1 }
        ], {
            duration: 600,
            easing: "ease-out",
            fill: "forwards",
        });
        toggle.setAttribute("open", "");
    }
})