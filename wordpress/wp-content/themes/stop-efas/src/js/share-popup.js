/**
 * Share popup open
 */
window.addEventListener("click", function (e) {
    if (e.target.getAttribute("href") !== "#share-popup") return;

    const shareDialog = document.querySelector(".efas-share-dialog");
    const wrapper = document.querySelector(".efas-share-dialog__wrapper");

    if (!shareDialog) return;
    wrapper.animate([
        { visibility: "hidden", opacity: 0 },
        { visibility: "visible", opacity: 1 }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "both"
    })
    document.documentElement.style.overflow = "hidden";
});

/**
 * Share popup close
 */
window.addEventListener("click", function (e) {
    let closeButton = e.target.closest(".efas-share-dialog__close");
    if (!closeButton) return;

    const shareDialog = document.querySelector(".efas-share-dialog");
    const wrapper = document.querySelector(".efas-share-dialog__wrapper");
    if (!shareDialog) return;
    wrapper.animate([
        { visibility: "visible", opacity: 1 },
        { visibility: "hidden", opacity: 0 }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "both"
    }).onfinish = () => {
        document.documentElement.style.overflow = "auto";
    }
});


/**
 * Share popup share buttons
 */

window.addEventListener("click", function (e) {
    let button = e.target.closest(".wp-block-button");
    if (!button) return;
    let shareDialog = e.target.closest(".efas-share-dialog");
    if (!shareDialog) return;

    let type = button.getAttribute("id");
    console.log(type);
    let content = JSON.parse(shareDialog.querySelector("script").innerHTML);
    let url = content.url;
    let text = content.text;

    switch (type) {
        case "whatsapp":
            window.open(`https://api.whatsapp.com/send?text=${text}%0A${url}`);
            break;
        case "telegram":
            window.open(`https://telegram.me/share/url?url=${url}&text=${text}`);
            break;
        case "twitter":
            window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`);
            break;
        case "facebook":
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`);
            break;
        case "email":
            window.open(`mailto:?body=${text}%0A${url}`);
            break;
    }
});