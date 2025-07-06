// Ambil data dari PHP


// Konfigurasi warna untuk pie chart
const backgroundColors = [
    '#FF6384',
    '#36A2EB', 
    '#FFCE56',
    '#4BC0C0',
    '#9966FF',
    '#FF9F40',
    '#FF6384',
    '#C9CBCF',
    '#4BC0C0',
    '#FF6384'
];

const borderColors = [
    '#FF6384',
    '#36A2EB',
    '#FFCE56', 
    '#4BC0C0',
    '#9966FF',
    '#FF9F40',
    '#FF6384',
    '#C9CBCF',
    '#4BC0C0',
    '#FF6384'
];

// Konfigurasi pie chart
const sourceProblemConfig = {
    type: 'doughnut',
    data: {
        labels: sourceLabels,
        datasets: [{
            data: sourceData,
            backgroundColor: backgroundColors,
            borderColor: borderColors,
            borderWidth: 2,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Presentase Source Problem (' + (selectedMonth !== 'Semua Bulan' ? selectedMonth + ' ' : '') + selectedYear + ')',
                font: {
                    size: 20,
                    weight: 'bold',
                    family: 'Arial, sans-serif'
                },
                color: '#2c3e50',
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            legend: {
                display: true,
                position: 'right',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#34495e',
                    padding: 15,
                    generateLabels: function(chart) {
                        const data = chart.data;
                        if (data.labels.length && data.datasets.length) {
                            return data.labels.map((label, i) => {
                                const dataset = data.datasets[0];
                                const value = dataset.data[i];
                                return {
                                    text: `${label} (${value}%)`,
                                    fillStyle: dataset.backgroundColor[i],
                                    strokeStyle: dataset.borderColor[i],
                                    lineWidth: dataset.borderWidth,
                                    hidden: false,
                                    index: i
                                };
                            });
                        }
                        return [];
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.2)',
                borderWidth: 1,
                cornerRadius: 8,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        return `${label}: ${value}%`;
                    }
                }
            },
            datalabels: {
                display: true,
                formatter: function(value, context) {
                    return value > 5 ? value + '%' : ''; // Hanya tampilkan label jika > 5%
                },
                color: '#fff',
                font: {
                    weight: 'bold',
                    size: 12
                },
                textStrokeColor: '#000',
                textStrokeWidth: 1
            }
        },
        layout: {
            padding: {
                top: 20,
                bottom: 20,
                left: 10,
                right: 10
            }
        },
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1000
        }
    }
};

// Render chart
const sourceProblemCtx = document.getElementById('sourceProblemPerformance').getContext('2d');
const sourceProblemChart = new Chart(sourceProblemCtx, sourceProblemConfig);