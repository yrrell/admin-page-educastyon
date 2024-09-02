document.addEventListener('DOMContentLoaded', () => {
    // This will force the page to refresh from the server, not the cache
    if (window.performance && window.performance.navigation.type === 2) {
        window.location.reload(true);
    }
});
