<style>
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
    thead tr th span{
        color: white !important;
    }
</style>
<div class="pb-8">
    <div class="flex items-center justify-between mb-8 px-8 pt-8">
        <h2 class="text-gray-600 text-2xl font-bold ">Kakotora</h2>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Kakotora</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-6">
            <form id="filter-form" method="GET" action="?page=kakotora" class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
                <input type="hidden" name="page" value="kakotora">

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
                    <a href="?page=kakotora" class="inline-flex items-center px-4 py-2 h-[38px] border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-200">
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
                    $('#part').select2({
                        placeholder: function() {
                            return $(this).find('option:first').text();
                        },
                        allowClear: true,
                        width: '100%',
                        minimumResultsForSearch: 0, // Always show search box
                        theme: 'default'
                    });

                    // Auto-focus search input when Select2 dropdown opens
                    $('#part').on('select2:open', function() {
                        setTimeout(function() {
                            $('.select2-search__field').focus();
                        }, 100);
                    });

                    // Auto-open and focus when clicking on Select2 container
                    $(document).on('click', '.select2-selection', function(e) {
                        const container = $(this).closest('.select2-container');
                        const selectElement = container.prev('select');

                        // Check if it's one of our target selects
                        if (selectElement.attr('id') === 'part') {
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
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($kakotora as $kakotora) : ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class="nomor-td font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></td>
                        <td class="tanggal font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                            <?= date('d M Y', strtotime($kakotora['tanggal'])) ?>
                        </td>
                        <td class="part font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white"><?= $kakotora['part_name'] ?></td>
                        <td class="font-medium text-red-500 text-xs whitespace-nowrap dark:text-white"><?= $kakotora['problem'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="flex justify-center">
            <p class="text-sm text-gray-500">Jumlah data =  <b><?= $no -1 ; ?></b></p>
        </div>
    </div>
</div>