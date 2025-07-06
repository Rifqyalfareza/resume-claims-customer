<style>
    .aksi {
        text-align: center !important;
    }
    .tooltip {
        background-color: #1f2937; 
        color: #ffffff; 
    }
    .tooltip-arrow {
        border-color: #1f2937; 
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
    thead tr th span{
        color: white !important;
    }
</style>
<div class="pb-8 dark:bg-gray-800">
    <div class="flex items-center justify-between mb-8 px-8 pt-8">
        <h2 class="text-gray-600 dark:text-gray-200 text-2xl font-bold">Part Customer</h2>
        <a href="?page=part-customer&action=create" type="button" data-tooltip-target="tooltip-dark-add" data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" class="flex items-center gap-2 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-sm px-2 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
            </svg>
            Create
        </a>
        <div id="tooltip-dark-add" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            Create Part Customer
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 px-8 rounded-lg">
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">
                        <svg class="w-3 h-3 ms-1 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 dark:text-gray-500 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Part Customer</span>
                    </div>
                </li>
            </ol>
        </nav>
        <table id="selection-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
                <tr class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700">
                    <th class="px-4 py-3">
                        <span class="flex items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            No
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-4 py-3">
                        <span class="flex items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            Customer
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-4 py-3">
                        <span class="flex items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            Part
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-4 py-3">
                        <span class="flex items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            Model
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-4 py-3">
                        <span class="flex items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            Part Number
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-4 py-3 text-center">
                        <span class="aksi align-content-center items-center text-blue-400 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-500">
                            Action
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($partCustomers as $partCustomer) : ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer">
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="#"><?= $no++; ?></a></td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $partCustomer['customer'] ?></td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $partCustomer['part'] ?></td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $partCustomer['model'] ?></td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $partCustomer['part_number'] ?></td>
                        <td class="flex gap-2 text-center justify-center px-4 py-3">
                            <a href="?page=resume&action=create&id=<?= $partCustomer['id_part_cust'] ?>"
                                data-tooltip-target="tooltip-resume-<?= $partCustomer['id_part_cust'] ?>"
                                class="bg-yellow-300 hover:bg-yellow-500 dark:bg-yellow-400 dark:hover:bg-yellow-600 p-1">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                                </svg>
                            </a>
                            <div id="tooltip-resume-<?= $partCustomer['id_part_cust'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Input Resume Claim
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <a href="?page=part-customer&action=edit&id=<?= $partCustomer['id_part_cust'] ?>"
                                data-tooltip-target="tooltip-edit-<?= $partCustomer['id_part_cust'] ?>"
                                data-tooltip-placement="top"
                                class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 p-1">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </a>
                            <div id="tooltip-edit-<?= $partCustomer['id_part_cust'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Edit Part Customer
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <a href="#"
                                onclick="confirm(<?= $partCustomer['id_part_cust'] ?>)"
                                class="bg-red-500 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800 p-1"
                                data-tooltip-target="tooltip-delete-<?= $partCustomer['id_part_cust'] ?>">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </a>
                            <div id="tooltip-delete-<?= $partCustomer['id_part_cust'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Delete Part Customer
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="flex justify-center">
            <p class="text-sm text-gray-500">Jumlah data =  <b><?= $no -1 ; ?></b></p>
        </div>
    </div>
</div>
<script>
    // document.addEventListener('DOMContentLoaded', () => {
    //     document.querySelectorAll('[data-modal-target="modal-edit"]').forEach(button => {
    //         button.addEventListener('click', function() {
    //             const id = this.getAttribute('data-id-src');
    //             const src = this.getAttribute('data-src');

    //             console.log(id);
    //             const modal = document.getElementById('modal-edit');
    //             modal.querySelector('input[name="source_problem"]').value = src;
    //             modal.querySelector('form').action = '?page=src&action=update&id=' + id;
    //         });
    //     });
    // });
    function confirm($id){
        Swal.fire({
            title: 'Are You Sure ?',
            text: "Data that has been deleted cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=part-customer&action=delete&id=' + $id;
            }
        })
    }
</script>