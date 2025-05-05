window.acceptCookies = function() {
    document.cookie = "cookies_accepted=true;path=/;max-age=31536000";
    document.getElementById('cookie-banner').style.display = 'none';
}

window.denyCookies = function() {
    document.getElementById('cookie-banner').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    if (document.cookie.indexOf('cookies_accepted=true') !== -1) {
        document.getElementById('cookie-banner').style.display = 'none';
    }
})
