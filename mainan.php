<?php ob_start(); session_start(); 
$timeout_duration = 3600; 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: index.php?timeout=1");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();
?>
<?php
$page = $_GET['page'] ?? 'index';
$id = $_SESSION['id_admin'] ?? null;

if (empty($id)) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="src/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="node_modules/preline/preline.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif !important;
    }
    
    th {
        background-color: #F8FAFC;
    }
    
    tr {
        border: none !important;
    }
    
    tr:nth-child(even) {
        background-color: #F8FAFC;
    }

    @keyframes pulse-dots {
        0%, 80%, 100% {
            transform: scale(0);
            opacity: 0.5;
        }
        40% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes fade-in-out {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
    }

    .pulse-dot {
        width: 12px;
        height: 12px;
        background: #3b82f6;
        border-radius: 50%;
        animation: pulse-dots 1.4s ease-in-out infinite both;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
    }

    .pulse-dot:nth-child(1) { animation-delay: -0.32s; }
    .pulse-dot:nth-child(2) { animation-delay: -0.16s; }
    .pulse-dot:nth-child(3) { animation-delay: 0s; }

    .loading-blur {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        background: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .loading-text {
        color: #374151;
        font-size: 18px;
        font-weight: 600;
        animation: fade-in-out 2s ease-in-out infinite;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<body class="bg-gray-100 dark:bg-gray-900" dir="ltr">
    <div id="loading-overlay" class="fixed inset-0 loading-blur z-50 flex items-center justify-center flex-col">
        <div class="flex gap-3 mb-6">
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
        </div>
        <div class="loading-text">Waiting.....</div>
    </div>

    <?php include 'src/components/toast.php'; ?>
    <?php include 'src/components/navbar.php'; ?>
    <?php include 'src/components/sidebar.php'; ?>
    
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg bg-white mt-14">
            <?php include 'routes/app.php'; ?>
            <div class="py-5 dark:bg-gray-800">
                <h1 class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="www.linkedin.com/in/rifqy-alfareza" class="hover:underline">Alfareza™</a>. All Rights Reserved. | Collaboration PT SJM & <span><a href="www.trunojoyo.ac.id" class="hover:underline">Universitas Trunojoyo Maadura</a></span> </span></h1>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="src/assets/table.js"></script>

    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('loading-overlay');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease-out';
                
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }
        });
    </script>

</body>

</html>
<?php ob_end_flush(); ?>