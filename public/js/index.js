// to goto login
function goToLogin() {
    window.location.href = "./views/login";
}
// to goto register
function goToRegister() {
    window.location.href = "./views/register";
}

// to change the login type (admin/alumni) based on click
function changeLoginType(loginType) {
    if (loginType === "admin") {
        document.querySelector(".admin-login-card").style.display = "flex";
        document.querySelector(".alumni-login-card").style.display = "none";

        // change color of nav admin item
        document.querySelector(".admin-login-nav-item > p").style.color =
            "#1c4966";
        document.querySelector(".alumni-login-nav-item > p").style.color =
            "#929292";
    } else if (loginType === "alumni") {
        document.querySelector(".alumni-login-card").style.display = "flex";
        document.querySelector(".admin-login-card").style.display = "none";

        // change color of nav admin item
        document.querySelector(".alumni-login-nav-item > p").style.color =
            "#1c4966";
        document.querySelector(".admin-login-nav-item > p").style.color =
            "#929292";
    }
}
