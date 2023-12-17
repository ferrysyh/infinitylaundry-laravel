function typeText(element, text, speed) {
    var index = 0;
    var length = text.length;
    var interval = setInterval(function () {
        element.append(text[index]);
        index++;
        if (index === length) {
            clearInterval(interval);
        }
    }, speed);
}

$(document).ready(function () {
    typeText($('#typing-header'), "MENCUCI PAKAIAN DENGAN CINTA DAN KEPEDULIAN", 100);
    setTimeout(function () {
        typeText($('#typing-paragraph'), "Kami Merubah Pengalaman Anda Menjadi Lebih Praktis, Efisien, dan Penuh Kepercayaan.", 50);
    }, 5000);
});
