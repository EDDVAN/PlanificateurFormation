<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-4rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Modifier Inscription</h1>
        </div>
        <form method="post" action="/inscription/update" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full">
            <input type="hidden" name="id" value="<?= $data->id; ?>">
            <div class=" grid grid-cols-1 gap-2 md:gap-4 ">
                <label for=" formationDate">
                    <span class="text-sm font-medium text-gray-500">Date Formation</span>
                    <select
                        id="formationDate"
                        name="formationDate"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        required>
                        <option value="">Selectionnez une Date Formation</option>
                        <?php
                        foreach ($dependencies['formationDate'] as $row) {
                            $selected = $row->id == $data->idFormationDate ? 'selected' : '';
                        ?>
                            <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->domaine  . ' -> ' . $row->sujet . ' > ' . $row->cours . ' a ' . $row->ville . ' le ' . substr($row->date, 0, 10) . ' - ' . $row->price . 'Dh' ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="firstName">
                    <span class="text-sm font-medium text-gray-500">Prénom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="firstName"
                        name="firstName"
                        step="0.01"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        value="<?= $data->firstName; ?>"
                        required />
                </label>
                <label for="lastname">
                    <span class="text-sm font-medium text-gray-500">Nom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="lastname"
                        name="lastName"
                        step="0.01"
                        class="mt-0.5  w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        value="<?= $data->lastName; ?>"
                        required />
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-10 gap-2 md:gap-4 ">
                <label for="Email" class="col-span-3">
                    <span class="text-sm font-medium text-gray-700">Email <span class="text-red-700">*</span></span>
                    <input
                        type="email"
                        name="email"
                        id="Email"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        value="<?= $data->email; ?>"
                        required />
                </label>
                <label for="phone" class="col-span-3">
                    <span class="text-sm font-medium text-gray-700">Téléphone </span>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        pattern="^0\d{9}$"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        value="<?= $data->phone; ?>" />
                </label>
                <label for="company" class="col-span-3">
                    <span class="text-sm font-medium text-gray-700">Company </span>
                    <input
                        type="text"
                        name="company"
                        id="company"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        value="<?= $data->company; ?>" />
                </label>
                <div class="flex flex-col gap-2  col-span-1">
                    <span class="text-sm font-medium text-gray-500">Paid</span>
                    <label
                        onclick="togglePaid()"
                        for="paid"
                        class="cursor-pointer group relative block h-8 w-14 rounded-full bg-gray-300 transition-colors [-webkit-tap-highlight-color:_transparent] has-checked:bg-green-500">
                        <input type="checkbox" id="paid" name="paid" <?= $data->paid ? 'checked' : ''; ?> class="peer sr-only" />

                        <span
                            class="absolute inset-y-0 start-0 m-1 grid size-6 place-content-center rounded-full bg-white text-gray-700 transition-[inset-inline-start] peer-checked:start-6 peer-checked:*:first:hidden *:last:hidden peer-checked:*:last:block">
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
            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/client/formation" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
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
            const allSujetOptions = $('#sujet option').clone();
            const allCoursOptions = $('#cours option').clone();
            $('#domaine').on('change', function() {
                const selectedId = $(this).val();
                $('#sujet').empty();
                const defaultSujetOption = $('<option>', {
                    value: '',
                    text: 'Selectionnez un sujet',
                    selected: true
                });
                let hasMatches = false;
                $('#sujet').append(defaultSujetOption);
                allSujetOptions.each(function() {
                    if ($(this).data('iddomaine') == selectedId) {
                        $('#sujet').append($(this));
                        hasMatches = true;
                    }
                });
                if (!hasMatches && selectedId == "") {
                    allSujetOptions.each(function() {
                        $('#sujet').append($(this));
                        hasMatches = true;
                    });
                } else if (!hasMatches) {
                    $('#sujet').append(defaultSujetOption);
                }
                $('#sujet').val("");
                $('#sujet').trigger('change');
            });
            $('#sujet').on('change', function() {
                const selectedId = $(this).val();
                const selectedDomaineId = $('#domaine').val();
                if (selectedDomaineId == "" && selectedId != "") {
                    $('#domaine').val($('option:selected', this).data('iddomaine'));
                    $('#domaine').trigger('change');
                    $('#sujet').val(selectedId);
                    return;
                }
                $('#cours').empty();
                const defaultOption = $('<option>', {
                    value: '',
                    text: 'Selectionnez un cours',
                    selected: true
                });
                let hasMatches = false;
                $('#cours').append(defaultOption);
                allCoursOptions.each(function() {
                    if ((selectedId == "" && $(this).data('iddomaine') == selectedDomaineId) || $(this).data('idsujet') == selectedId) {
                        $('#cours').append($(this));
                        hasMatches = true;
                    }
                });
                if (!hasMatches && selectedId == "" && selectedDomaineId == "") {
                    allCoursOptions.each(function() {
                        $('#cours').append($(this));
                        hasMatches = true;
                    });
                } else if (!hasMatches) {
                    $('#cours').append(defaultOption);
                }
            });

            $('#cours').on('change', function() {
                const selectedId = $(this).val();
                const selectedDomaineId = $('#domaine').val();
                const selectedSujetId = $('#sujet').val();
                if (selectedDomaineId == "" && selectedSujetId == "" && selectedId != "") {
                    $('#domaine').val($('option:selected', this).data('iddomaine'));
                    $('#domaine').trigger('change');
                    $('#sujet').val($('option:selected', this).data('idsujet'));
                    $('#sujet').trigger('change');
                    $('#cours').val(selectedId);
                    return;
                }

            });
            $('#domaine').trigger('change');

            <?php
            if (isset($data->idSujet)) {
                echo '$("#sujet").val(' . $data->idSujet . ');';
            }
            if (isset($data->idCours)) {
                echo '$("#cours").val(' . $data->idCours . ');';
            }
            ?>
        });
    </script>
</body>

</html>