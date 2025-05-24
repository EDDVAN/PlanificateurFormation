<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Modifier <?= $data->firstName . ' ' . $data->lastName ?></h1>

        </div>
        <form method="post" action="/gestion/formateur/update" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full max-h-[calc(100%-4rem)]">
            <input type="hidden" name="id" value="<?= $data->id ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="firstName">
                    <span class="text-sm font-medium text-gray-500">Prénom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="firstName"
                        name="firstName"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        value="<?= $data->firstName ?>"
                        required />
                </label>
                <label for="lastName">
                    <span class="text-sm font-medium text-gray-500">Nom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="lastName"
                        name="lastName"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        value="<?= $data->lastName ?>"
                        required />
                </label>
            </div>
            <label for="description">
                <span class="text-sm font-medium text-gray-500">Description</span>
                <textarea
                    id="description"
                    name="description"
                    class="mt-0.5 w-full h-24  border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"><?= $data->description ?></textarea>
            </label>
            <label for="File" class="block rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6 cursor-pointer">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div class="flex items-center justify-center gap-4">
                        <span class="font-medium"> Upload your file(s) </span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                        </svg>
                    </div>
                    <span id="selected-file-name" class="text-sm text-gray-500">No file selected</span>
                </div>

                <input onchange="updateFileName(this)" type="file" id="File" class="sr-only" name="photo" accept="image/*" />
            </label>

            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/gestion/formateur" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
                    <i class="ph ph-arrow-left text-lg"></i> <span>Retour</span>
                </a>
                <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                    <i class="ph ph-check-fat text-lg"></i> <span>Enregistrer</span>
                </button>
            </div>
        </form>
    </section>
    <script src="/js/app.js"></script>

</body>

</html>