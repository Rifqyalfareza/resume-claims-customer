<?php
$page = $_GET['page'] ?? 'index';
$id = $_SESSION['id_admin'] ?? null;
?>
<style>
    .datatable-container {
        padding-top: 30px !important;
    }

    .datatable-top {
        margin-bottom: 0 !important;
    }

    .nomor,
    .customer,
    .tanggal,
    .part,
    .aksi {
        padding: 12px 2px 12px 12px !important;
    }

    table,
    thead,
    tbody,
    tr,
    th,
    td {
        border: 1px solid #e2e8f0 !important;
        border-collapse: collapse;
    }

    thead tr th {
        background-color: #3b82f6 !important;
    }

    thead tr th span {
        color: white !important;
    }
</style>
<div class="pb-8">
    <div class="flex items-center justify-between mb-8 px-8 pt-8">
        <h2 class="text-gray-600 text-2xl font-bold "><?= $page == 'resume' ? 'Resume Claim' : 'Kakotora'; ?></h2>
    </div>
    <div class="bg-white px-8 rounded-lg">
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="?page=dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 ms-1 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= $page == 'resume' ? 'Resume Claim' : 'Kakotora'; ?></span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-6">
            <?php if ($page == 'resume') { ?>
                <form id="filter-form" method="GET" action="?page=resume" class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
                    <input type="hidden" name="page" value="resume">

                    <div class="flex-1 min-w-[200px]">
                        <label for="customer" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Customer</label>
                        <select name="customer" id="customer" class="search mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" style="height: 38px;">
                            <option value="">All Customers</option>
                            <?php foreach ($customers as $cust): ?>
                                <option value="<?= htmlspecialchars($cust['id_customer']) ?>" <?= isset($_GET['customer']) && $_GET['customer'] == $cust['id_customer'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cust['singkatan']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <label for="part" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Part</label>
                        <select name="part" id="part" class="search mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" style="height: 38px;">
                            <option value="">All Parts</option>
                            <?php foreach ($parts as $prt): ?>
                                <option value="<?= htmlspecialchars($prt['id_part']) ?>" <?= isset($_GET['part']) && $_GET['part'] == $prt['id_part'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($prt['part_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit" class="inline-flex items-center px-4 py-2 h-[38px] border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filter
                        </button>
                        <a href="?page=resume" class="inline-flex items-center px-4 py-2 h-[38px] border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset
                        </a>
                    </div>
                </form>

                <style>
                    /* Select2 Height Alignment */
                    .select2-container .select2-selection--single {
                        height: 38px !important;
                        border: 1px solid #d1d5db !important;
                        border-radius: 0.375rem !important;
                    }

                    .select2-container .select2-selection--single .select2-selection__rendered {
                        line-height: 36px !important;
                        padding-left: 12px !important;
                        padding-right: 20px !important;
                        font-size: 0.875rem !important;
                    }

                    .select2-container .select2-selection--single .select2-selection__arrow {
                        height: 36px !important;
                        right: 8px !important;
                    }

                    /* Dark mode styling for Select2 */
                    .dark .select2-container .select2-selection--single {
                        background-color: #374151 !important;
                        border-color: #4b5563 !important;
                        color: #ffffff !important;
                    }

                    .dark .select2-container .select2-selection--single .select2-selection__rendered {
                        color: #ffffff !important;
                    }

                    .dark .select2-dropdown {
                        background-color: #374151 !important;
                        border-color: #4b5563 !important;
                    }

                    .dark .select2-results__option {
                        background-color: #374151 !important;
                        color: #ffffff !important;
                    }

                    .dark .select2-results__option--highlighted {
                        background-color: #4f46e5 !important;
                    }

                    /* Focus states */
                    .select2-container--default.select2-container--focus .select2-selection--single {
                        border-color: #3b82f6 !important;
                        box-shadow: 0 0 0 1px #3b82f6 !important;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 768px) {
                        .select2-container .select2-selection--single {
                            height: 42px !important;
                        }

                        .select2-container .select2-selection--single .select2-selection__rendered {
                            line-height: 40px !important;
                        }

                        .select2-container .select2-selection--single .select2-selection__arrow {
                            height: 40px !important;
                        }

                        #filter-form button,
                        #filter-form a {
                            height: 42px !important;
                        }
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Initialize Select2 with custom configuration
                        $('#customer, #part').select2({
                            placeholder: function() {
                                return $(this).find('option:first').text();
                            },
                            allowClear: true,
                            width: '100%',
                            minimumResultsForSearch: 0, // Always show search box
                            theme: 'default'
                        });

                        // Auto-focus search input when Select2 dropdown opens
                        $('#customer, #part').on('select2:open', function() {
                            setTimeout(function() {
                                $('.select2-search__field').focus();
                            }, 100);
                        });

                        // Auto-open and focus when clicking on Select2 container
                        $(document).on('click', '.select2-selection', function(e) {
                            const container = $(this).closest('.select2-container');
                            const selectElement = container.prev('select');

                            // Check if it's one of our target selects
                            if (selectElement.attr('id') === 'customer' || selectElement.attr('id') === 'part') {
                                // If dropdown is not open, open it
                                if (!container.hasClass('select2-container--open')) {
                                    selectElement.select2('open');
                                }
                            }
                        });

                        // Ensure height consistency after Select2 initialization
                        $('.select2-container').css('height', '38px');

                        // Handle responsive height changes
                        function adjustHeights() {
                            if (window.innerWidth <= 768) {
                                $('.select2-container').css('height', '42px');
                            } else {
                                $('.select2-container').css('height', '38px');
                            }
                        }

                        // Adjust on window resize
                        $(window).resize(adjustHeights);

                        // Initial adjustment
                        adjustHeights();
                    });
                </script>
            <?php } ?>
        </div>
        <table id="selection-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
                <tr>
                    <th class="nomor">
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            No
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="tanggal">
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            date
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="customer">
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Customer
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="part">
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Part
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="problem">
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Problem
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Progress
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Status
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            Approved At
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="text-center aksi">
                        <span class="flex items-center justify-center text-blue-400 hover:text-blue-600">
                            action
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($resumes as $resume) : ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class="nomor-td font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></td>
                        <td class="tanggal font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                            <?= date('d M Y', strtotime($resume['tanggal'])) ?>
                        </td>
                        <td> <a
                                href="https://www.google.com/maps?q=<?= urlencode($resume['nama_customer'] . ' ' . $resume['alamat']) ?>"
                                target="_blank"
                                class="text-black hover:underline hover:text-blue-600"
                                title="Lihat di Google Maps">
                                <?= $resume['singkatan'] ?>
                            </a>
                        </td>
                        <td class="part font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white"><?= $resume['part_name'] ?></td>
                        <td class="font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white"><?= $resume['problem'] ?></td>
                        <?php if ($page == 'resume') { ?>
                            <td class="font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white" style="text-transform: capitalize;">
                                <?php if ($resume['proses'] == 'sakanobory') : ?>
                                    <div>
                                        <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                            <svg class="w-4 h-4 me-3 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                            <?= htmlspecialchars($resume['proses']); ?>
                                        </span>
                                    </div>
                                <?php elseif ($resume['proses'] == 'analysis') : ?>
                                    <div>
                                        <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-500/10 dark:text-blue-500">
                                            <svg class="shrink-0 size-3 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                            On <?= htmlspecialchars($resume['proses']); ?>
                                        </span>
                                    </div>
                                <?php elseif ($resume['proses'] == 'Waiting') : ?>
                                    <div>
                                        <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                                            <svg class="shrink-0 size-3 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16.5 12"></polyline>
                                            </svg>
                                            Waiting for Approval
                                        </span>
                                    </div>
                                <?php elseif ($resume['proses'] == 'Approved') : ?>
                                    <div>
                                        <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-600 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                            <svg class="shrink-0 size-3 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                            <?= htmlspecialchars($resume['proses']); ?>
                                        </span>
                                    </div>
                                <?php else : ?>
                                    <div>
                                        <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full dark:bg-gray-500/10 dark:text-gray-500">
                                            <svg class="shrink-0 size-3 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M12 8v8"></path>
                                                <path d="M8 12h8"></path>
                                            </svg>
                                            Unknown
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white <?= $resume['status'] == 'OPEN' ? 'text-red-500' : 'text-green-500' ?>">
                                <?php if ($resume['status'] == 'OPEN') { ?>
                                    <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                        <svg class="w-4 h-4 me-2 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                        <?= htmlspecialchars($resume['status']); ?>
                                    </span>
                                <?php } ?>
                                <?php if ($resume['status'] == 'CLOSED') { ?>
                                    <span class="pl-2 pr-4 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-600 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                        <svg class="shrink-0 size-3 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <?= htmlspecialchars($resume['status']); ?>
                                    </span>
                                <?php } ?>
                            </td>
                            <td class="text-center font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                <?= !empty($resume['approved_at']) ? date('d M Y', strtotime($resume['approved_at'])) : '-' ?>
                            </td>

                            <td class="text-center aksi">
                                <div class="relative">
                                    <button type="button" class="toggle-menu bg-gray-200 hover:bg-gray-300 p-1 rounded-full" data-menu-id="menu-<?= $resume['id_resume_claim'] ?>">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
                                        </svg>
                                    </button>
                                    <div id="menu-<?= $resume['id_resume_claim'] ?>" class="menu hidden absolute z-10 right-0 w-48 bg-white rounded-md shadow-lg dark:bg-gray-700">
                                        <button type="button"
                                            data-modal-target="modal-detail"
                                            data-modal-toggle="modal-detail"
                                            data-id-resume="<?= $resume['id_resume_claim'] ?>"
                                            data-id="<?= $resume['id_resume_claim'] ?>"
                                            data-part="<?= htmlspecialchars($resume['part_name']) ?>"
                                            data-customer="<?= htmlspecialchars($resume['singkatan']) ?>"
                                            data-problem="<?= htmlspecialchars($resume['problem']) ?>"
                                            data-tanggal="<?= htmlspecialchars($resume['tanggal']) ?>"
                                            data-number="<?= htmlspecialchars($resume['part_number']) ?>"
                                            data-qty="<?= htmlspecialchars($resume['qty_ng']) ?>"
                                            data-claim="<?= htmlspecialchars($resume['no_claim']) ?>"
                                            data-occured="<?= htmlspecialchars($resume['occured'] ?? '') ?>"
                                            data-lost_inspection="<?= htmlspecialchars($resume['lost_inspection'] ?? '') ?>"
                                            data-media="<?= htmlspecialchars($resume['media_file'] ?? '') ?>"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 flex items-center detail-button">
                                            <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Detail
                                        </button>
                                        <?php if (in_array($id, [1, 2])): ?>
                                            <?php if ($resume['proses'] == 'sakanobory') : ?>
                                                <button type="button" onclick="confirmProses(<?= $resume['id_resume_claim'] ?>)" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
                                                    </svg>
                                                    Next Process
                                                </button>
                                            <?php elseif ($resume['proses'] == 'analysis' || $resume['proses'] == 'Waiting') : ?>
                                                <button type="button"
                                                    data-modal-target="modal-analysis"
                                                    data-modal-toggle="modal-analysis"
                                                    data-tooltip-target="tooltip-edit-<?= $resume['id_resume_claim'] ?>"
                                                    id-resume="<?= $resume['id_resume_claim'] ?>"
                                                    data-problem="<?= htmlspecialchars($resume['problem']) ?>"
                                                    data-occured="<?= htmlspecialchars($resume['occured'] ?? '') ?>"
                                                    data-lost_inspection="<?= htmlspecialchars($resume['lost_inspection'] ?? '') ?>"
                                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
                                                    </svg>
                                                    Upload Analysis
                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (in_array($id, [1, 2, 3]) && $resume['proses'] == 'Approved'): ?>
                                            <button type="button"
                                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 flex items-center"
                                                onclick="preview('<?= htmlspecialchars($resume['pencegahan'] ?? '') ?>')">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                    <path stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                View Report
                                            </button>
                                        <?php endif; ?>

                                        <?php if (in_array($id, [1, 2])): ?>
                                            <button type="button" onclick="confirm(<?= $resume['id_resume_claim'] ?>)" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                                Delete Resume
                                            </button>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </td>
                        <?php } ?>
                        <!--  -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="flex justify-center">
            <p class="text-sm text-gray-500">Jumlah data = <b><?= $no - 1; ?></b></p>
        </div>
    </div>
</div>

<?php include_once 'analysis.php'; ?>
<?php include_once 'detail.php'; ?>

<script>
    $(document).ready(function() {
        $('.search').select2();
    });
    $(document).on('search:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    function formatDateToIndonesian(dateStr) {
        if (!dateStr || !/^\d{4}-\d{2}-\d{2}$/.test(dateStr)) {
            return '-';
        }
        try {
            const date = new Date(dateStr);
            if (isNaN(date.getTime())) {
                return '-';
            }
            return new Intl.DateTimeFormat('en-US', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(date);
        } catch (e) {
            console.error('Error formatting date:', e);
            return '-';
        }
    }

    function confirmProses(id) {
        Swal.fire({
            title: 'Next Process?',
            text: "Are you sure that the process is complete?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesai!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=resume&action=updateStatus&id=' + id;
            }
        });
    }

    function confirm(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Do it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=resume&action=delete&id=' + id;
            }
        });
    }

    function preview(filepath) {
        if (!filepath) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File not found',
                confirmButtonColor: '#3085d6',
            });
            return;
        }
        window.open(filepath, '_blank');
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.body.addEventListener('click', function(event) {
            const button = event.target.closest('[data-modal-target="modal-analysis"]');
            if (button) {
                const id = button.getAttribute('id-resume');
                const problem = button.getAttribute('data-problem');
                const modal = document.getElementById('modal-analysis');
                const occured = button.getAttribute('data-occured');
                const lostInspection = button.getAttribute('data-lost_inspection');

                modal.querySelector('input[name="id_resume_claim"]').value = id;
                modal.querySelector('textarea[name="problem"]').value = problem;
                modal.querySelector('textarea[name="occured"]').value = occured || '';
                modal.querySelector('textarea[name="lost_inspection"]').value = lostInspection || '';
            }
        });

        document.querySelectorAll('[data-modal-target="modal-detail"]').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const part = this.getAttribute('data-part');
                const customer = this.getAttribute('data-customer');
                const problem = this.getAttribute('data-problem');
                const tanggal = this.getAttribute('data-tanggal');
                const qty = this.getAttribute('data-qty');
                const claim = this.getAttribute('data-claim');
                const occured = this.getAttribute('data-occured');
                const lostInspection = this.getAttribute('data-lost_inspection');
                const number = this.getAttribute('data-number');
                const media = this.getAttribute('data-media');

                const modal = document.getElementById('modal-detail');
                modal.querySelector('input[name="id_resume_claim"]').value = id;
                modal.querySelector('input[name="part"]').value = part;
                modal.querySelector('input[name="customer"]').value = customer;
                modal.querySelector('textarea[name="problem"]').value = problem;
                modal.querySelector('input[name="tanggal"]').value = formatDateToIndonesian(tanggal);
                modal.querySelector('input[name="qty_ng"]').value = qty;
                modal.querySelector('input[name="claim"]').value = claim;
                modal.querySelector('input[name="part_number"]').value = number || '-';
                modal.querySelector('textarea[name="occured"]').value = occured || '-';
                modal.querySelector('textarea[name="lost_inspection"]').value = lostInspection || '-';

                const mediaContainer = modal.querySelector('#media-container');
                if (media) {
                    const fileExtension = media.split('.').pop().toLowerCase();
                    const imageExtensions = ['png', 'jpg', 'jpeg'];
                    const videoExtensions = ['mp4', 'avi', 'mov'];
                    if (imageExtensions.includes(fileExtension)) {
                        mediaContainer.innerHTML = `<img src="${media}" alt="Media" class="max-w-full h-auto rounded-lg">`;
                    } else if (videoExtensions.includes(fileExtension)) {
                        mediaContainer.innerHTML = `
                            <video controls class="max-w-full h-auto rounded-lg">
                                <source src="${media}" type="video/${fileExtension}">
                                Your browser does not support the video tag.
                            </video>`;
                    } else {
                        mediaContainer.innerHTML = `<p class="text-sm text-gray-500 dark:text-gray-400">Unsupported file type</p>`;
                    }
                } else {
                    mediaContainer.innerHTML = `<p class="text-sm text-gray-500 dark:text-gray-400">No media file uploaded</p>`;
                }

                modal.classList.remove('hidden');
                modal.setAttribute('aria-hidden', 'false');
            });
        });

        const toggleButtons = document.querySelectorAll('.toggle-menu');
        toggleButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const menuId = button.getAttribute('data-menu-id');
                const menu = document.getElementById(menuId);
                const rect = button.getBoundingClientRect();
                const windowHeight = window.innerHeight;

                if (rect.bottom + menu.offsetHeight > windowHeight) {
                    menu.classList.remove('bottom-0');
                    menu.classList.add('top-0', '-translate-y-full');
                } else {
                    menu.classList.remove('top-0', '-translate-y-full');
                    menu.classList.add('bottom-0');
                }

                document.querySelectorAll('.menu').forEach(m => {
                    if (m.id !== menuId) m.classList.add('hidden');
                });

                menu.classList.toggle('hidden');

                e.stopPropagation();
            });
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.toggle-menu') && !e.target.closest('.menu')) {
                document.querySelectorAll('.menu').forEach(menu => menu.classList.add('hidden'));
            }
        });
    });
</script>