<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard Cards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
        }
        
        .shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        @media (max-width: 640px) {
            .card-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media (min-width: 641px) and (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .card-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (min-width: 1025px) {
            .card-container {
                grid-template-columns: repeat(6, 1fr);
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        
        <!-- Responsive Grid Container -->
        <div class="grid card-container gap-4 sm:gap-5 lg:gap-6">
            
            <!-- Open Claims Card -->
            <div class="bg-gradient-to-br from-red-200 to-pink-200 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-folder-open text-3xl sm:text-4xl text-red-500 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide mb-2">Open</h3>
                <div class="text-2xl sm:text-3xl font-bold text-gray-800"> <?= $openClaimsTotal['total'] ?></div>
            </div>
            
            <!-- Closed Claims Card -->
            <div class="bg-gradient-to-br from-teal-200 to-pink-200 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-check-circle text-3xl sm:text-4xl text-green-500 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide mb-2">Closed</h3>
                <div class="text-2xl sm:text-3xl font-bold text-gray-800"><?= $closedClaimsTotal['total'] ?></div>
            </div>
            
            <!-- Sakanobory Card -->
            <div class="bg-gradient-to-br from-red-200 to-pink-200 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-exclamation-triangle text-3xl sm:text-4xl text-red-500 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide mb-2">Sakanobory</h3>
                <div class="text-2xl sm:text-3xl font-bold text-gray-800"><?= $sakanoboryTotal['total'] ?></div>
            </div>
            
            <!-- Analysis Card -->
            <div class="bg-gradient-to-br from-blue-200 to-blue-400 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-chart-line text-3xl sm:text-4xl text-blue-400 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-black uppercase tracking-wide mb-2">Analysis</h3>
                <div class="text-2xl sm:text-3xl font-bold text-black"><?= $AnalysisTotal['total'] ?></div>
            </div>
            
            <!-- Waiting Card -->
            <div class="bg-gradient-to-br from-yellow-200 to-orange-300 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-clock text-3xl sm:text-4xl text-orange-500 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-black uppercase tracking-wide mb-2">Waiting</h3>
                <div class="text-2xl sm:text-3xl font-bold text-black"><?= $WaitingTotal['total'] ?></div>
            </div>
            
            <!-- Approval Card -->
            <div class="bg-gradient-to-br from-teal-200 to-pink-200 rounded-2xl p-4 sm:p-5 lg:p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer card-hover shimmer relative overflow-hidden">
                <i class="fas fa-thumbs-up text-3xl sm:text-4xl text-green-600 mb-2 sm:mb-3 block hover:scale-110 transition-transform duration-300"></i>
                <h3 class="text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide mb-2">Approval</h3>
                <div class="text-2xl sm:text-3xl font-bold text-gray-800"><?= $ApprovedTotal['total'] ?></div>
            </div>
            
        </div>
    </div>
</body>
</html>