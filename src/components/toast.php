<?php if (isset($_SESSION['toast'])): ?>
    <?php
    $type = $_SESSION['toast_type'] ?? 'success';

    $toastConfig = [
        'success' => [
            'id' => 'toast-success',
            'icon' => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4l5-5-1.4-1.4L9 11.2 7.4 9.6 6 11l3 3z" clip-rule="evenodd"></path>',
            'iconColor' => 'text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200',
        ],
        'error' => [
            'id' => 'toast-error',
            'icon' => '<path fill-rule="evenodd" d="M18 10A8 8 0 11.001 10 8 8 0 0118 10zM9 9V5a1 1 0 112 0v4a1 1 0 11-2 0zm0 4a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd"></path>',
            'iconColor' => 'text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200',
        ],
    ];

    $config = $toastConfig[$type];
    ?>
    <div id="<?= $config['id'] ?>" style="z-index: 9999; top: 1rem; right: 1rem;" class="fixed z-50 top-4 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 <?= $config['iconColor'] ?> rounded-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <?= $config['icon'] ?>
            </svg>
        </div>
        <div class="ms-3 text-sm font-normal"><?= $_SESSION['toast'] ?></div>
        <button type="button" onclick="this.parentElement.remove();" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-500 dark:hover:text-white" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('<?= $config['id'] ?>');
            if (toast) toast.remove();
        }, 4000);
    </script>
    <?php unset($_SESSION['toast'], $_SESSION['toast_type']); ?>
<?php endif; ?>
