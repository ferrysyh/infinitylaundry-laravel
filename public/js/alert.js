var urlParams = new URLSearchParams(window.location.search);
var alertMessage = urlParams.get('alert');
if (alertMessage) {
    alert(decodeURIComponent(alertMessage));
}