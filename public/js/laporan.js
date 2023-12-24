function pilih() {
    const bulan = document.getElementById('bulanDropdown').value;
    const tahun = document.getElementById('tahunDropdown').value;

    document.getElementById('tahun').innerHTML = tahun;
    document.getElementById('bulan').innerHTML = bulan;

    var dateElements = document.querySelectorAll('[data-date]');
    var totalPrice = 0; // Initialize total price for the selected month and year

    dateElements.forEach(function (element) {
        var dateString = element.getAttribute('data-date');
        var date = new Date(dateString);
        var year = date.getFullYear();
        var month = (date.getMonth() + 1).toString().padStart(2, '0');

        if (year == tahun && bulan == month) {
            var priceElement = element.nextElementSibling; // Assuming price element is the next sibling

            if (priceElement) {
                var priceIntValue = parseInt(priceElement.getAttribute('data-price'));
                totalPrice += priceIntValue;
            }
        }
    });

    document.getElementById('price').innerHTML = totalPrice;
}