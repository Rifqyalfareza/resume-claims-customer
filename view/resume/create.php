<div class="pb-8">
    <form action="?page=resume&action=store" method="post" enctype="multipart/form-data">
        <div class="flex items-center justify-between mb-8 px-8 pt-8 border-b border-gray-200 pb-5">
            <h1 class="text-2xl font-bold text-gray-600 dark:text-white">Add Resume Claim</h1>
            <div class="flex items-center gap-1">
                <a href="?page=part-customer"
                    class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-4 py-2.5 focus:outline-none dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Back
                </a>
                <button type="submit"
                    class="inline-flex items-center gap-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-sm text-sm px-4 py-2.5 focus:outline-none dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 21H7a2 2 0 01-2-2V5a2 2 0 012-2h11l3 3v13a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 21V13H7v8M9 3v5h6V3" />
                    </svg>
                    Save
                </button>
            </div>
        </div>

        <div class="px-8">
            <input type="hidden" name="id_part_cust" value="<?= $partCustomers['id_part_cust']; ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-5">
                    <div class="relative">
                        <label for="nama_customer" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Customer</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input disabled type="text" name="nama_customer" id="nama_customer" value="<?= $partCustomers['nama_customer']; ?>"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <div class="relative">
                        <label for="part_name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Part</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input disabled type="text" name="part_name" id="part_name" value="<?= $partCustomers['part_name']; ?>"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <div class="relative">
                        <label for="model" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Model</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17L15 17M9 12L15 12M9 7L13 7M17 21H7C5.89543 21 5 20.1046 5 19V5C5 3.89543 5.89543 3 7 3H12.5858C12.851 3 13.1054 3.10536 13.2929 3.29289L18.7071 8.70711C18.8946 8.89464 19 9.149 19 9.41421V19C19 20.1046 18.1046 21 17 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input disabled type="text" name="model" id="model" value="<?= $partCustomers['model']; ?>"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <!-- Part Number Field -->
                    <div class="relative">
                        <label for="part_number" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Part Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5M12 12H15M12 16H15M9 12H9.01M9 16H9.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input disabled type="text" name="part_number" id="part_number" value="<?= $partCustomers['part_number']; ?>"
                                class="ps-10 w-full rounded-lg border bg-gray-100 border-gray-300 dark:border-gray-600  dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <div class="relative">
                        <label for="problem" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Problem <span class="text-red-500">*</span></label>
                        <div class="absolute  inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.29 3.86l-8.48 14.72A1 1 0 0 0 2.71 20h18.58a1 1 0 0 0 .9-1.42L13.71 3.86a1 1 0 0 0-1.74 0zM12 9v4m0 4h.01" />
                            </svg>
                        </div>
                        <textarea name="problem" id="problem" style="text-transform: uppercase;"
                            class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                            rows="4" placeholder="Describe the problem..."></textarea>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="relative">
                        <label for="no_claim" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">No Claim <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <select name="no_claim" id="no_claim"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all appearance-none">
                                <option value="Phone">Phone</option>
                                <option value="Letter">Letter</option>
                            </select>
                        </div>
                    </div>
                    <div class="relative">
                        <label for="datepicker-autohide" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Date <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 7V3M16 7V3M7 11H17M5 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V19C3 20.1046 3.89543 21 5 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input datepicker datepicker-buttons datepicker-autoselect-today datepicker-autohide type="text" id="datepicker-autohide"
                                name="tanggal"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                placeholder="Choose Date">
                        </div>
                    </div>

                    <div class="relative">
                        <label for="source_problem" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Source Problem <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m2.1-5.4A6.75 6.75 0 1 1 6.75 4.5a6.75 6.75 0 0 1 12.75 6.75z" />
                                </svg>
                            </div>

                            <select name="source_problem" id="source_problem"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all appearance-none">
                                <?php foreach ($srcs as $src) : ?>
                                    <option value="<?= $src['id_source']; ?>"><?= $src['source_problem']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="relative">
                        <label for="qty_ng" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Quantity NG <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" y="3" width="16" height="18" rx="2" ry="2" />
                                    <line x1="8" y1="7" x2="16" y2="7" />
                                    <line x1="8" y1="11" x2="10" y2="11" />
                                    <line x1="14" y1="11" x2="16" y2="11" />
                                    <line x1="8" y1="15" x2="10" y2="15" />
                                    <line x1="14" y1="15" x2="16" y2="15" />
                                </svg>

                            </div>
                            <input type="number" name="qty_ng" id="qty_ng" placeholder="Insert Quantity NG"
                                class="ps-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-2.5 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <!-- <div class="relative">
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white" for="media_file">Upload Picture / Video <span class="text-red-500">*</span></label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                               aria-describedby="file_input_help" id="media_file" name="media_file" type="file" accept="image/*,video/*" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG, MP4, AVI, MOV (MAX. 5MB).</p>
                    </div> -->
                    <label for="media_file" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
        Upload Foto/Video <span class="text-red-500">*</span>
    </label>
                    <div class="flex items-center justify-center w-full">
    <label for="media_file"
        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold">Click to upload</span> or drag and drop
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG, MP4, AVI, MOV, etc. (MAX. 5MB)</p>
        </div>
        <input id="media_file" name="media_file" accept="image/*,video/*" type="file" class="hidden" required onchange="previewFile()" />
    </label>
</div>
                    <div class="mt-4 text-center">
    <p id="file-name" class="text-sm text-gray-700 dark:text-white font-medium"></p>
    <div id="file-preview" class="mt-2"></div>
</div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function previewFile() {
        const previewContainer = document.getElementById('file-preview');
        const fileNameDisplay = document.getElementById('file-name');
        const file = document.getElementById('media_file').files[0];

        previewContainer.innerHTML = '';
        fileNameDisplay.textContent = file.name;

        const fileType = file.type;

        if (fileType.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'max-w-xs mx-auto rounded shadow';
            previewContainer.appendChild(img);
        } else if (fileType.startsWith('video/')) {
            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.controls = true;
            video.className = 'max-w-xs mx-auto rounded shadow';
            previewContainer.appendChild(video);
        } else {
            previewContainer.innerHTML = '<p class="text-sm text-red-500">Preview not available for this file type.</p>';
        }
    }
</script>