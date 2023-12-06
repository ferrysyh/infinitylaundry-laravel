// Data penghasilan per bulan (data statis)
var data = {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
    datasets: [{
        label: 'Penghasilan per Bulan',
        data: [100000, 150000, 120000, 180000, 200000, 170000],
        backgroundColor: 'blue',
    }]
};

var canvas = document.getElementById('grafik-batang');

var config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Penghasilan'
                },
                ticks: {
                    callback: function (value, index, values) {
                        return 'Rp.' + value; // Menambahkan "Rp." sebelum data
                    }
                }
            }
        }
    }
};

var myBarChart = new Chart(canvas, config);
