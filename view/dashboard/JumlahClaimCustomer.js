const ctx = document.getElementById('claimChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: bulanArr,
        datasets: [{
                label: 'Letter Claims',
                data: letterData,
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            },
            {
                label: 'Phone Claims',
                data: phoneData,
                backgroundColor: 'rgba(71, 248, 100, 0.8)',
                borderColor: 'rgba(71, 248, 100, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            },
            {
                label: 'Target',
                data: targetData,
                type: 'line',
                borderColor: 'rgba(52, 152, 219, 1)',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                borderWidth: 2,
                borderDash: [5, 5],
                pointRadius: 0,
                tension: 0.4,
            },
            
            {
                label: 'Total Claims',
                data: claim,
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
    options: chartTotalClaimOptions,
});