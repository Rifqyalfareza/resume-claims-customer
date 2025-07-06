const ctxCustomer = document.getElementById('claimCustomerChart').getContext('2d');
new Chart(ctxCustomer, {
    type: 'bar',
    data: {
        labels: customerData,
        datasets: [{
                label: 'Letter Claims',
                data: letterDataCustomer,
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            },
            {
                label: 'Phone Claims',
                data: phoneDataCustomer,
                backgroundColor: 'rgba(71, 248, 100, 0.8)',
                borderColor: 'rgba(71, 248, 100, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            },
            {
                label: 'Total Claims',
                data: totalDataCustomer,
                type: 'line',
                borderWidth: 4,
                borderColor: 'rgba(255, 193, 7, 1)',
                backgroundColor: 'rgba(255, 193, 7, 0.2)',
                pointBackgroundColor: 'rgba(255, 193, 7, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 3,
                pointRadius: 8,
                pointHoverRadius: 10,
                tension: 0.4,
                fill: false,
            }
        ]
    },
    options: chartTotalClaimByCustomerOptions,
    plugins: [ChartDataLabels]
});