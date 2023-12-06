document.addEventListener("DOMContentLoaded", function () {
    const loginButton = document.getElementById("tombol-masuk");
    const registerButton = document.getElementById("tombol-daftar");

    const loginPopup = document.getElementById("login-popup");
    const registerPopup = document.getElementById("register-popup");

    const closeLoginPopup = document.getElementById("close-login-popup");
    const closeRegisterPopup = document.getElementById("close-register-popup");

    const roleSelect = document.getElementById("role");
    const laundryNameGroup = document.getElementById("laundry-name-group");

    loginButton.addEventListener("click", () => {
        loginPopup.style.display = "block";
    });

    registerButton.addEventListener("click", () => {
        registerPopup.style.display = "block";
    });

    closeLoginPopup.addEventListener("click", () => {
        loginPopup.style.display = "none";
    });

    closeRegisterPopup.addEventListener("click", () => {
        registerPopup.style.display = "none";
    });    
});
