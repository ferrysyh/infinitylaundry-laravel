
var canvas = document.getElementById('grafik-lingkaran');

var data = {
    labels: ['Baik'],
    datasets: [{
        data: [24], 
        backgroundColor: ['lime'], 
    }]
};

var config = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
    },
};

var myPieChart = new Chart(canvas, config);