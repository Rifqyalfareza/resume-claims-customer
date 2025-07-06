<style>
    .nomor {
        padding: 10px 0 10px 12px !important;
    }

    .customer {
        padding-left: 0px !important;
    }

    th.aksi {
        display: flex !important;
        justify-content: end !important;
    }
</style>
<div class="pb-8">
    <div class="flex items-center justify-between mb-8 px-8 pt-8">
        <h2 class="text-gray-600 text-2xl font-bold ">Data Customer</h2>
        <?php include 'create.php'; ?>
        <button type="button" data-tooltip-target="tooltip-dark-add" data-modal-target=modal-tambah data-modal-toggle=modal-tambah class="flex items-center gap-2 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-sm px-2 py-2 text-center  dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
            </svg>
            Create
        </button>
        <div id="tooltip-dark-add" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            Create Customer
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
    <div class="bg-white px-8 rounded-lg">
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Customer</span>
                    </div>
                </li>
            </ol>
        </nav>
        <table id="selection-table">
            <thead>
                <tr>
                    <th class="nomor">
                        <span class="flex items-center  text-blue-400 hover:text-blue-600">
                            no
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="customer">
                        <span class="flex items-center  text-blue-400 hover:text-blue-600">
                            Customer
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            abbreviation
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-blue-400 hover:text-blue-600">
                            address
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="aksi text-center">
                        <span class="flex items-center  text-blue-400 hover:text-blue-600">
                            Action
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($customers as $customer) : ?>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class="justify-start font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++ ?></td>
                        <td class="customer font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $customer['nama_customer'] ?></td>
                        <td><?= $customer['singkatan'] ?></td>
                        <td>
                            <a
                                href="https://www.google.com/maps?q=<?= urlencode($customer['nama_customer'] . ' ' . $customer['alamat']) ?>"
                                target="_blank"
                                class="text-black hover:underline hover:text-blue-600"
                                title="Lihat di Google Maps">
                                <?= $customer['alamat'] ?>
                            </a>
                        </td>
                        <td class="flex gap-2 justify-end">
                            <button type="button"
                                data-tooltip-target="tooltip-edit-<?= $customer['id_customer'] ?>"
                                data-tooltip-placement="top"
                                data-modal-target=modal-edit
                                data-modal-toggle=modal-edit
                                data-id="<?= $customer['id_customer'] ?>"
                                data-customer="<?= $customer['nama_customer'] ?>"
                                data-singkatan="<?= $customer['singkatan'] ?>"
                                data-alamat="<?= $customer['alamat'] ?>"
                                class="bg-blue-500 hover:bg-blue-700 p-1">
                                <svg class="w-5 h-5 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </button>
                            <div id="tooltip-edit-<?= $customer['id_customer'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Edit Customer
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <a href="#"
                                class="bg-red-500 hover:bg-red-600 p-1"
                                data-tooltip-target="tooltip-delete-<?= $customer['id_customer'] ?>"
                                data-tooltip-placement="top"
                                onclick="confirm(<?= $customer['id_customer'] ?>)">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </a>
                            <div id="tooltip-delete-<?= $customer['id_customer'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Delete Customer
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'edit.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-modal-target="modal-edit"]').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const customer = this.getAttribute('data-customer');
                const singkatan = this.getAttribute('data-singkatan');
                const alamat = this.getAttribute('data-alamat');

                console.log(id);
                const modal = document.getElementById('modal-edit');
                modal.querySelector('input[name="nama_customer"]').value = customer;
                modal.querySelector('input[name="singkatan"]').value = singkatan;
                modal.querySelector('input[name="alamat"]').value = alamat;
                modal.querySelector('form').action = '?page=customer&action=update&id=' + id;
            });
        });
    });

    function confirm(id) {
        Swal.fire({
            title: 'Are You Sure ?',
            text: "Data that has been deleted cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=customer&action=delete&id=' + id;
            }
        })
    }
</script>