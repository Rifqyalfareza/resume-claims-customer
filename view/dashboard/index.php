<?php
$bulanArr = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];

// Generate available months per year from $allDataClaim
$availableMonthsByYear = [];
foreach ($allDataClaim as $row) {
    $tahun = (int)$row['tahun'];
    $bulan = (int)$row['bulan'];
    if (!isset($availableMonthsByYear[$tahun])) {
        $availableMonthsByYear[$tahun] = [];
    }
    if (!in_array($bulan, $availableMonthsByYear[$tahun])) {
        $availableMonthsByYear[$tahun][] = $bulan;
    }
}
// Sort months for each year
foreach ($availableMonthsByYear as &$months) {
    sort($months);
}
unset($months);
?>

<style>
    .card-hover:hover {
        transform: translateY(-8px);
    }

    .shimmer::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .shimmer:hover::before {
        left: 100%;
    }

    .header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px 40px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.1;
        }
    }

    .header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .header-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .filter-section {
        padding: 30px 40px;
        border-bottom: 1px solid #e9ecef;
    }

    .filter-form {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .filter-form label {
        font-weight: 600;
        color: #495057;
        font-size: 1rem;
    }

    .filter-form select,
    .filter-form button {
        padding: 12px 20px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        background: white;
        color: #495057;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .filter-form button {
        background: linear-gradient(90deg, #667eea, #764ba2);
        color: white;
        border: none;
    }

    .filter-form select:hover,
    .filter-form button:hover {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .filter-form select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    .content {
        padding: 0 40px 40px 40px;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #e9ecef;
    }

    .chart-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .chart-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }

    .chart-container canvas {
        max-height: 100%;
    }

    .bottom-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .placeholder-card {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        border-radius: 16px;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
    }

    .placeholder-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .placeholder-text {
        font-size: 1.5rem;
        font-weight: 700;
        color: #8b4513;
    }

    .stats-overlay {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #495057;
        backdrop-filter: blur(5px);
        z-index: 10;
    }

    @media (max-width: 1024px) {
        .chart-grid,
        .bottom-section {
            grid-template-columns: 1fr;
        }

        .header h2 {
            font-size: 2rem;
        }

        .content {
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 10px;
        }

        .header {
            padding: 20px;
            flex-direction: column;
            text-align: center;
        }

        .header h2 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .filter-section {
            padding: 20px;
        }

        .filter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .chart-container {
            height: 300px;
        }
    }
</style>

<div class="dashboard-wrapper dark:bg-gray-800">
    <div class="dashboard-container">
        <div class="filter-section">
            <h1 class="text-2xl font-bold text-gray-600 dark:text-white mb-5">Dashboard</h1>
            <form class="filter-form " id="filterForm">
                <label for="year" class="dark:text-white">📅 Pilih Tahun:</label>
                <select name="year" id="year" onchange="updateMonthOptions(); updateCharts();">
                    <option value="" <?= empty($year) ? 'selected' : '' ?>>Semua Tahun</option>
                    <?php foreach ($years as $y): ?>
                        <option value="<?= $y ?>" <?= $y == $year ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="month" class="dark:text-white">📅 Pilih Bulan:</label>
                <select name="month" id="month" onchange="updateCharts()">
                    <option value="" <?= empty($month) ? 'selected' : '' ?>>Semua Bulan</option>
                    <?php
                    $displayMonths = !empty($year) && isset($availableMonthsByYear[$year]) ? $availableMonthsByYear[$year] : range(1, 12);
                    foreach ($displayMonths as $m):
                    ?>
                        <option value="<?= $m ?>" <?= $m == $month ? 'selected' : '' ?>><?= $bulanArr[$m - 1] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="button" onclick="resetFilter()">Reset</button>
            </form>
        </div>
        <?php include 'cardSection.php';?>
        <div class="content">
            <div class="chart-grid">
                <div class="chart-card">
                    <div class="stats-overlay">📈 Monthly Overview</div>
                    <div class="chart-container">
                        <canvas id="claimChart"></canvas>
                    </div>
                </div>
                <div class="chart-card">
                    <div class="stats-overlay">👥 Customer Analysis</div>
                    <div class="chart-container">
                        <canvas id="claimCustomerChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bottom-section">
                <div class="chart-card">
                    <div class="stats-overlay">🔍 Problem Sources</div>
                    <div class="chart-container">
                        <canvas id="sourceProblemPerformance"></canvas>
                    </div>
                </div>
                <div class="placeholder-card">
                    <div class="placeholder-text">
                        🚀 Future Analytics<br>
                        <small style="font-size: 1rem; font-weight: 400; opacity: 0.8;">Coming Soon</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$claimDataByYearMonth = [];
foreach ($allDataClaim as $row) {
    $tahun = (int)$row['tahun'];
    $bulan = (int)$row['bulan'];
    $no_claim = $row['no_claim'];
    $total = (int)$row['total'];
    if (!isset($claimDataByYearMonth[$tahun])) {
        $claimDataByYearMonth[$tahun] = [];
    }
    if (!isset($claimDataByYearMonth[$tahun][$bulan])) {
        $claimDataByYearMonth[$tahun][$bulan] = ['Letter' => 0, 'Phone' => 0];
    }
    $claimDataByYearMonth[$tahun][$bulan][$no_claim] = $total;
}

$customerDataByYearMonth = [];
$customerLabels = [];
foreach ($allDataClaimCustomer as $row) {
    $tahun = (int)$row['tahun'];
    $bulan = (int)$row['bulan'];
    $cust = $row['customer'];
    $no_claim = $row['no_claim'];
    $total = (int)$row['total'];
    if (!in_array($cust, $customerLabels)) {
        $customerLabels[] = $cust;
    }
    if (!isset($customerDataByYearMonth[$tahun])) {
        $customerDataByYearMonth[$tahun] = [];
    }
    if (!isset($customerDataByYearMonth[$tahun][$bulan])) {
        $customerDataByYearMonth[$tahun][$bulan] = [];
    }
    if (!isset($customerDataByYearMonth[$tahun][$bulan][$cust])) {
        $customerDataByYearMonth[$tahun][$bulan][$cust] = ['Letter' => 0, 'Phone' => 0];
    }
    $customerDataByYearMonth[$tahun][$bulan][$cust][$no_claim] = $total;
}

$sourceProblemDataByYearMonth = [];
$sourceLabels = [];
foreach ($allSourceProblemPerformance as $row) {
    $tahun = (int)$row['tahun'];
    $bulan = (int)$row['bulan'];
    $source = $row['source_problem'];
    $jumlah = (int)$row['jumlah'];
    if (!in_array($source, $sourceLabels)) {
        $sourceLabels[] = $source;
    }
    if (!isset($sourceProblemDataByYearMonth[$tahun])) {
        $sourceProblemDataByYearMonth[$tahun] = [];
    }
    if (!isset($sourceProblemDataByYearMonth[$tahun][$bulan])) {
        $sourceProblemDataByYearMonth[$tahun][$bulan] = [];
    }
    $sourceProblemDataByYearMonth[$tahun][$bulan][$source] = $jumlah;
}
?>

<script>
    const bulanArr = <?= json_encode($bulanArr) ?>;
    const allClaimData = <?= json_encode($claimDataByYearMonth) ?>;
    const allCustomerData = <?= json_encode($customerDataByYearMonth) ?>;
    const allSourceProblemData = <?= json_encode($sourceProblemDataByYearMonth) ?>;
    const customerLabels = <?= json_encode($customerLabels) ?>;
    const sourceLabels = <?= json_encode($sourceLabels) ?>;
    const availableMonthsByYear = <?= json_encode($availableMonthsByYear) ?>;

    let claimChartInstance = null;
    let claimCustomerChartInstance = null;
    let sourceProblemChartInstance = null;

    function updateMonthOptions() {
        const yearSelect = document.getElementById('year');
        const monthSelect = document.getElementById('month');
        const selectedYear = yearSelect.value;

        // Clear current month options
        monthSelect.innerHTML = '<option value="">Semua Bulan</option>';

        // Get available months for the selected year
        const availableMonths = selectedYear && availableMonthsByYear[selectedYear] ? availableMonthsByYear[selectedYear] : Array.from({length: 12}, (_, i) => i + 1);

        // Populate month dropdown
        availableMonths.forEach(month => {
            const option = document.createElement('option');
            option.value = month;
            option.text = bulanArr[month - 1];
            monthSelect.appendChild(option);
        });

        // Reset month selection if the current month is not available for the new year
        if (monthSelect.value && !availableMonths.includes(parseInt(monthSelect.value))) {
            monthSelect.value = '';
        }
    }

    const chartTotalClaimOptions = {
        plugins: {
            title: {
                display: true,
                text: 'Pencapaian Claim',
                font: {
                    size: 20,
                    weight: 'bold',
                    family: 'Segoe UI, sans-serif'
                },
                color: '#2c3e50',
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'rectRounded',
                    font: {
                        size: 12,
                        weight: '600'
                    },
                    color: '#34495e',
                    padding: 20
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    precision: 0,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#7f8c8d',
                    padding: 5
                },
                title: {
                    display: true,
                    text: 'Jumlah Claim',
                    font: {
                        size: 14,
                        weight: 'bold',
                        family: 'Segoe UI, sans-serif'
                    },
                    color: '#2c3e50',
                    padding: {
                        bottom: 10
                    }
                },
                grid: {
                    color: 'rgba(149, 165, 166, 0.2)',
                    lineWidth: 1,
                    drawBorder: false
                }
            },
            x: {
                ticks: {
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#7f8c8d',
                    maxRotation: 45,
                    minRotation: 0
                },
                title: {
                    display: true,
                    text: 'Bulan',
                    font: {
                        size: 14,
                        weight: 'bold',
                        family: 'Segoe UI, sans-serif'
                    },
                    color: '#2c3e50',
                    padding: {
                        top: 10
                    }
                },
                grid: {
                    display: false
                }
            }
        },
        layout: {
            padding: {
                top: 20,
                bottom: 20,
                left: 10,
                right: 10
            }
        }
    };

    const chartTotalClaimByCustomerOptions = {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            intersect: false,
            mode: 'index'
        },
        plugins: {
            title: {
                display: true,
                text: 'Total Claim per Customer',
                font: {
                    size: 20,
                    weight: 'bold',
                    family: 'Segoe UI, sans-serif'
                },
                color: '#2c3e50',
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'rectRounded',
                    font: {
                        size: 12,
                        weight: '600'
                    },
                    color: '#34495e',
                    padding: 20
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.2)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: true,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    precision: 0,
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#7f8c8d',
                    padding: 10
                },
                title: {
                    display: true,
                    text: 'Jumlah Claim',
                    font: {
                        size: 14,
                        weight: 'bold',
                        family: 'Segoe UI, sans-serif'
                    },
                    color: '#2c3e50',
                    padding: {
                        bottom: 10
                    }
                },
                grid: {
                    color: 'rgba(149, 165, 166, 0.2)',
                    lineWidth: 1,
                    drawBorder: false
                }
            },
            x: {
                ticks: {
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#7f8c8d',
                    maxRotation: 45,
                    minRotation: 0
                },
                title: {
                    display: true,
                    text: 'Customer',
                    font: {
                        size: 14,
                        weight: 'bold',
                        family: 'Segoe UI, sans-serif'
                    },
                    color: '#2c3e50',
                    padding: {
                        top: 10
                    }
                },
                grid: {
                    display: false
                }
            }
        },
        layout: {
            padding: {
                top: 20,
                bottom: 20,
                left: 10,
                right: 10
            }
        }
    };

    const sourceProblemConfig = {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: [{
                data: [],
                backgroundColor: [],
                borderColor: [],
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
                    text: 'Presentase Source Problem',
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
                    formatter: function(value) {
                        return value > 5 ? value + '%' : '';
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

    // Colors for source problem chart
    const backgroundColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#FF6384'];
    const borderColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#C9CBCF', '#4BC0C0', '#FF6384'];

    // Function to update charts based on filters
    function updateCharts() {
        const year = document.getElementById('year').value;
        const month = document.getElementById('month').value;
        const selectedYear = year || 'Semua Tahun';
        const selectedMonth = month ? bulanArr[parseInt(month) - 1] : 'Semua Bulan';

        // Update claim chart (yearly)
        const letterData = Array(12).fill(0);
        const phoneData = Array(12).fill(0);
        if (year && allClaimData[year]) {
            for (let m = 1; m <= 12; m++) {
                if (allClaimData[year][m]) {
                    letterData[m - 1] = allClaimData[year][m]['Letter'] || 0;
                    phoneData[m - 1] = allClaimData[year][m]['Phone'] || 0;
                }
            }
        } else {
            Object.keys(allClaimData).forEach(y => {
                Object.keys(allClaimData[y]).forEach(m => {
                    letterData[m - 1] += allClaimData[y][m]['Letter'] || 0;
                    phoneData[m - 1] += allClaimData[y][m]['Phone'] || 0;
                });
            });
        }
        const claim = letterData.map((l, i) => l + phoneData[i]);
        const targetData = Array(12).fill(1);

        if (claimChartInstance) claimChartInstance.destroy();
        claimChartInstance = new Chart(document.getElementById('claimChart').getContext('2d'), {
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
                        borderSkipped: false
                    },
                    {
                        label: 'Phone Claims',
                        data: phoneData,
                        backgroundColor: 'rgba(71, 248, 100, 0.8)',
                        borderColor: 'rgba(71, 248, 100, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false
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
                        tension: 0.4
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
                        fill: false
                    }
                ]
            },
            options: {
                ...chartTotalClaimOptions,
                plugins: {
                    ...chartTotalClaimOptions.plugins,
                    title: {
                        ...chartTotalClaimOptions.plugins.title,
                        text: 'Pencapaian Claim (' + selectedYear + ')'
                    }
                }
            }
        });

        // Update customer claim chart
        const letterDataCustomer = [];
        const phoneDataCustomer = [];
        customerLabels.forEach(cust => {
            let letterTotal = 0;
            let phoneTotal = 0;
            if (year && (!month || allCustomerData[year]?.[month])) {
                if (month) {
                    if (allCustomerData[year]?.[month]?.[cust]) {
                        letterTotal = allCustomerData[year][month][cust]['Letter'] || 0;
                        phoneTotal = allCustomerData[year][month][cust]['Phone'] || 0;
                    }
                } else {
                    Object.keys(allCustomerData[year] || {}).forEach(m => {
                        if (allCustomerData[year][m][cust]) {
                            letterTotal += allCustomerData[year][m][cust]['Letter'] || 0;
                            phoneTotal += allCustomerData[year][m][cust]['Phone'] || 0;
                        }
                    });
                }
            } else {
                Object.keys(allCustomerData).forEach(y => {
                    Object.keys(allCustomerData[y]).forEach(m => {
                        if (allCustomerData[y][m][cust]) {
                            letterTotal += allCustomerData[y][m][cust]['Letter'] || 0;
                            phoneTotal += allCustomerData[y][m][cust]['Phone'] || 0;
                        }
                    });
                });
            }
            letterDataCustomer.push(letterTotal);
            phoneDataCustomer.push(phoneTotal);
        });
        const totalDataCustomer = letterDataCustomer.map((l, i) => l + phoneDataCustomer[i]);

        if (claimCustomerChartInstance) claimCustomerChartInstance.destroy();
        claimCustomerChartInstance = new Chart(document.getElementById('claimCustomerChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: customerLabels,
                datasets: [{
                        label: 'Letter Claims',
                        data: letterDataCustomer,
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false
                    },
                    {
                        label: 'Phone Claims',
                        data: phoneDataCustomer,
                        backgroundColor: 'rgba(71, 248, 100, 0.8)',
                        borderColor: 'rgba(71, 248, 100, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false
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
                        fill: false
                    }
                ]
            },
            options: {
                ...chartTotalClaimByCustomerOptions,
                plugins: {
                    ...chartTotalClaimByCustomerOptions.plugins,
                    title: {
                        ...chartTotalClaimByCustomerOptions.plugins.title,
                        text: 'Total Claim per Customer (' + selectedYear + (selectedMonth !== 'Semua Bulan' ? ' - ' + selectedMonth : '') + ')'
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Update source problem chart
        const sourceDataRaw = [];
        sourceLabels.forEach(source => {
            let total = 0;
            if (year && (!month || allSourceProblemData[year]?.[month])) {
                if (month) {
                    total = allSourceProblemData[year]?.[month]?.[source] || 0;
                } else {
                    Object.keys(allSourceProblemData[year] || {}).forEach(m => {
                        total += allSourceProblemData[year][m][source] || 0;
                    });
                }
            } else {
                Object.keys(allSourceProblemData).forEach(y => {
                    Object.keys(allSourceProblemData[y]).forEach(m => {
                        total += allSourceProblemData[y][m][source] || 0;
                    });
                });
            }
            sourceDataRaw.push(total);
        });
        const totalSource = sourceDataRaw.reduce((sum, value) => sum + value, 0) || 1;
        const sourceData = sourceDataRaw.map(value => ((value / totalSource) * 100).toFixed(2));

        if (sourceProblemChartInstance) sourceProblemChartInstance.destroy();
        sourceProblemChartInstance = new Chart(document.getElementById('sourceProblemPerformance').getContext('2d'), {
            ...sourceProblemConfig,
            data: {
                labels: sourceLabels,
                datasets: [{
                    data: sourceData,
                    backgroundColor: backgroundColors.slice(0, sourceLabels.length),
                    borderColor: borderColors.slice(0, sourceLabels.length),
                    borderWidth: 2,
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#fff'
                }]
            },
            options: {
                ...sourceProblemConfig.options,
                plugins: {
                    ...sourceProblemConfig.options.plugins,
                    title: {
                        ...sourceProblemConfig.options.plugins.title,
                        text: 'Presentase Source Problem (' + (selectedMonth !== 'Semua Bulan' ? selectedMonth + ' ' : '') + selectedYear + ')'
                    }
                }
            }
        });
    }

    // Reset filter function
    function resetFilter() {
        document.getElementById('year').value = '';
        document.getElementById('month').value = '';
        updateMonthOptions();
        updateCharts();
    }

    // Initial chart render and month options setup
    updateMonthOptions();
    updateCharts();
</script>
<!-- Uncomment these if Chart.js and ChartDataLabels are needed -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->