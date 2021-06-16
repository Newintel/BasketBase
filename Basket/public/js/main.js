document.querySelectorAll('.only-in-self').forEach(x => {
    x.style.display = window.location !== window.parent.location && "none";
});