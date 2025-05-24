<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Modifier <?= $data->name ?></h1>
        </div>
        <form method="post" action="/gestion/cours/update" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full max-h-[calc(100%-4rem)]">
            <input type="hidden" name="id" value="<?= $data->id; ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="domaine">
                    <span class="text-sm font-medium text-gray-500">Domaine <span class="text-red-700">*</span></span>
                    <select
                        id="domaine"
                        name="domaine"
                        class="mt-0.5 w-full  border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        required>
                        <option value="">Selectionnez un domaine</option>
                        <?php
                        foreach ($dependencies['domaine'] as $row) {
                            $selected = $row->id == $data->idDomaine ? 'selected' : '';
                        ?>
                            <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->name ?></option>
                        <?php
                        } ?>
                    </select>
                </label>

                <label for="sujet">
                    <span class="text-sm font-medium text-gray-500">Sujet <span class="text-red-700">*</span></span>
                    <select
                        id="sujet"
                        name="sujet"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        required>
                        <option value="" disabled selected>Selectionnez un sujet</option>
                        <?php
                        foreach ($dependencies['sujet'] as $row) {
                            $selected = $row->id == $data->idSujet ? 'selected' : '';
                        ?>
                            <option value="<?= $row->id; ?>" data-idDomaine="<?= $row->idDomaine; ?>" <?= $selected; ?>><?= $row->name; ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
            </div>
            <label for="name">
                <span class="text-sm font-medium text-gray-500">Nom <span class="text-red-700">*</span></span>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                    maxlength="100"
                    value="<?= $data->name; ?>"
                    required />
            </label>
            <label for="content">
                <span class="text-sm font-medium text-gray-500">Content <span class="text-red-700">*</span></span>

                <input
                    type="text"
                    id="content"
                    name="content"
                    class="mt-0.5 w-full  border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                    maxlength="100"
                    value="<?= $data->content; ?>"
                    required />
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="description">
                    <span class="text-sm font-medium text-gray-500">Description</span>
                    <textarea
                        id="description"
                        name="description"
                        class="mt-0.5 w-full h-24  border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"><?= $data->description; ?></textarea>
                </label>
                <label for="audience">
                    <span class="text-sm font-medium text-gray-500">Audience</span>
                    <textarea
                        id="audience"
                        name="audience"
                        class="mt-0.5 w-full h-24 border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"><?= $data->audience; ?></textarea>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="duration">
                    <span class="text-sm font-medium text-gray-500">Duration Heures <span class="text-red-700">*</span></span>
                    <input
                        type="number"
                        id="duration"
                        name="duration"
                        class="mt-0.5 w-full text-right border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        min="1"
                        value="<?= $data->duration; ?>"
                        required />
                </label>
                <div class="flex items-center justify-center gap-16 md:gap-24">
                    <span class="text-sm font-medium text-gray-500">Comprend un test</span>

                    <label
                        onclick="toggleTestIncluded()"
                        for="testIncludedCheck"
                        class="cursor-pointer group relative block h-8 w-14 rounded-full bg-gray-300 transition-colors [-webkit-tap-highlight-color:_transparent] has-checked:bg-green-500">
                        <input type="checkbox" id="testIncludedCheck" name="testIncluded" class="peer sr-only" <?= $data->testIncluded ? 'checked' : ''; ?> />

                        <span
                            class="absolute inset-y-0 start-0 m-1 grid size-6 place-content-center rounded-full bg-white text-gray-700 transition-[inset-inline-start] 
                                peer-checked:start-6 peer-checked:*:first:hidden *:last:hidden peer-checked:*:last:block">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                    </label>
                </div>
            </div>
            <label for="testContent" id="testContentContainer" class="<?= $data->testIncluded ? '' : 'hidden'; ?>">
                <span class="text-sm font-medium text-gray-500">Contenu du test</span>
                <textarea
                    id="testContent"
                    name="testContent"
                    class="mt-0.5 w-full h-24 border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"><?= $data->testContent; ?></textarea>
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

                <input onchange="updateFileName(this)" type="file" id="File" class="sr-only" name="logo" accept="image/*" />
            </label>

            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/gestion/cours" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
                    <i class="ph ph-arrow-left text-lg"></i> <span>Retour</span>
                </a>
                <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                    <i class="ph ph-check-fat text-lg"></i> <span>Enregistrer</span>
                </button>
            </div>
        </form>
    </section>
    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function() {
            const allOptions = $('#sujet option').clone();
            $('#domaine').on('change', function() {
                const selectedId = $(this).val();
                $('#sujet').empty();
                const defaultOption = $('<option>', {
                    value: '',
                    text: 'Selectionnez un sujet',
                    disabled: true,
                    selected: true
                });
                $('#sujet').append(defaultOption);
                let hasMatches = false;
                allOptions.each(function() {
                    if ($(this).data('idDomaine') == selectedId) {
                        $('#sujet').append($(this));
                        hasMatches = true;
                    }
                });
                if (!hasMatches) {
                    $('#sujet').val('');
                }
            });
            // $('#domaine').trigger('change');
        });

        function toggleTestIncluded() {
            console.log($("#testIncludedCheck").val());
            let testIncluded = $("#testIncludedCheck");
            let testContent = $("#testContentContainer");
            if (testIncluded.is(":checked")) {
                testContent.removeClass("hidden");
            } else {
                testContent.addClass("hidden");
            }
        }
    </script>
</body>

</html>