<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>QA-Apps</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.85); /* Semi-transparent */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease-out;
            backdrop-filter: blur(10px);
        }

        .logo-section {
            animation: fadeInDown 0.6s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="relative min-h-screen">

    <!-- Background Blur Image -->
    <div class="absolute inset-0 ">
        <img src="src/assets/image.png" alt="background image"
             class="w-full h-full object-cover blur-sm brightness-100">
    </div>

    <!-- SweetAlert Notification -->
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed !',
                    text: '" . htmlspecialchars($_SESSION['error']) . "',
                    confirmButtonColor: '#2563eb',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Authentication Success !',
                    text: '" . htmlspecialchars($_SESSION['success']) . "',
                    confirmButtonColor: '#2563eb',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'mainan.php';
                    }
                })
            });
        </script>";
        unset($_SESSION['success']);
    }
    ?>

    <!-- Login Section -->
    <section class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="logo-section text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <img class="h-8 mr-2" src="src/assets/sjm-nobg.png" alt="logo">
                    <span class="text-2xl font-semibold text-gray-900 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">QA-Apps</span>
                </div>
            </div>

            <div class="login-card rounded-lg p-8">
                <h1 class="text-xl font-semibold text-gray-900 text-center mb-6">
                    Welcome
                </h1>

                <form class="space-y-4" method="post" action="controller/AuthController.php">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                            Username
                        </label>
                        <input type="text" name="username" id="username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            placeholder="Enter your username" required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="flex items-center">
                        <input id="showPassword" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="showPassword" class="ml-2 text-sm text-gray-600">
                            Show Password
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg focus:ring-4 focus:ring-blue-300 transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Show Password Script -->
    <script>
        const showPassword = document.getElementById('showPassword');
        const password = document.getElementById('password');

        showPassword.addEventListener('change', () => {
            password.type = showPassword.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>
