<div class="pb-8">
    <div class="flex items-center justify-between mb-8 px-8 pt-8">
        <h2 class="text-gray-600 text-2xl font-bold ">Edit Part Customer</h2>
        <a href="?page=part-customer" type="button" data-tooltip-target="tooltip-dark-add" data-modal-target=modal-tambah data-modal-toggle=modal-tambah class="flex items-center gap-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-sm px-2 py-2 text-center  dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back
        </a>
        <div id="tooltip-dark-add" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            Back
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
    <div class="p-6 space-y-6">
        <form action="?page=part-customer&action=update&id=<?= $partCustomer['id_part_cust'] ?>" method="POST">
            <!-- Dropdown untuk Customer -->
            <div class="mb-6">
                <label for="id_customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer</label>
                <select name="id_customer" id="id_customer" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih Customer</option>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= htmlspecialchars($customer['id_customer']) ?>"
                            <?= $customer['id_customer'] == $partCustomer['id_customer'] ? 'selected' : '' ?>>
                            <?= $customer['nama_customer']; ?> 
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Dropdown untuk Part -->
            <div class="mb-6">
                <label for="id_part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Part</label>
                <select name="id_part" id="id_part" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih Part</option>
                    <?php foreach ($parts as $part): ?>
                        <option value="<?= htmlspecialchars($part['id_part']) ?>"
                            <?= $part['id_part'] == $partCustomer['id_part'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($part['part_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Dropdown untuk Model -->
            <div class="mb-6">
                <label for="id_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                <select name="id_model" id="id_model" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih Model</option>
                    <?php foreach ($models as $model): ?>
                        <option value="<?= htmlspecialchars($model['id_model']) ?>"
                            <?= $model['id_model'] == $partCustomer['id_model'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($model['nama_model']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-6">
                <label for="part_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Part Number</label>
                <input 
                    type="text" 
                    name="part_number" 
                    id="part_number" 
                    value="<?= $partCustomer['part_number'] ?>"
                    style="text-transform: uppercase;" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="flex items-center justify-end space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="?page=part-customer" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-modal-hide="modal-tambah">Batal</a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    try {
        if (typeof jQuery === 'undefined') {
            console.error('jQuery tidak dimuat!');
            return;
        }
        if (!jQuery.fn.select2) {
            console.error('Select2 tidak dimuat!');
            return;
        }

        // Inisialisasi Select2
        jQuery('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true,
            width: '100%'
        });

        // Atur autofocus pada dropdown Customer saat modal dibuka
        const modal = document.getElementById('modal-tambah');
        modal.addEventListener('shown.flowbite.modal', function() {
            const customerSelect = jQuery('#id_customer');
            customerSelect.select2('open'); // Buka dropdown Select2
            console.log('Modal dibuka, fokus ke dropdown Customer');
        });

        console.log('Select2 berhasil diinisialisasi');
    } catch (error) {
        console.error('Kesalahan inisialisasi Select2:', error);
    }
});
</script>