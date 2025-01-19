// BAR CHART
const barChartData = {
    labels: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ],
    datasets: [{
        axis: 'y',
        label: ['Gas emission saved per month'],
        data: [10, 59, 80, 81, 56, 55, 40, 45, 25, 60, 70, 150],
        fill: false,
        backgroundColor: [
            '#55523D'
        ],
        borderColor: [
            'rgba(162, 189, 131, 1)'
        ],
        borderWidth: 1
    }
    ]
};

const ctx = document.getElementById("bar").getContext("2d");

new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
        indexAxis: 'y',
        responsive: true,
        animation: {
            duration: 1000,
            easing: 'easeOut'
        },
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    color: '#FFFFFF',
                    font: {
                        size: 14
                    }
                }
            },
            tooltip: {
                bodyColor: '#FF5733',
                titleColor: '#FFC300',
                backgroundColor: '#333333',
                borderColor: '#FFFFFF',
                borderWidth: 1,
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                    color: '#FFFFFF',
                    font: {
                        size: 12
                    }
                },
                grid: {
                    color: '#454545'
                }
            },
            y: {
                ticks: {
                    color: '#FFFFFF',
                    font: {
                        size: 12
                    }
                },
                grid: {
                    color: '#454545'
                }
            }
        }
    }
});

// DOUGHNUT CHART DATA
const doughnutChartData = {
    labels: [
        'Electronics',
        'Transportation',
        'Clothing',
        'Sports & Outdoor',
        'Event Supplies'
    ],
    datasets: [{
        label: 'Category Share',
        data: [300, 200, 150, 100, 250],
        backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 205, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(54, 162, 235, 0.6)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)'
        ],
        borderWidth: 1
    }]
};

const ctxDoughnut = document.getElementById("doughnut").getContext("2d");

new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: doughnutChartData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    boxWidth: 8,
                    boxHeight: 8,
                    padding: 5,
                    color: '#FFFFFF',
                    font: {
                        size: 14
                    }
                }
            },
            tooltip: {
                bodyColor: '#000000',
                backgroundColor: '#FFFFFF',
                titleColor: '#333333',
                borderColor: '#000000',
                borderWidth: 1
            }
        }
    }
});