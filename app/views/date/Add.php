<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Ajouter une Date Formation</h1>
        </div>
        <form method="post" action="/gestion/date/create" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full max-h-[calc(100%-4rem)]">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-2 md:gap-4 ">
                <label for="domaine">
                    <span class="text-sm font-medium text-gray-500">Domaine</span>
                    <select
                        id="domaine"
                        name="domaine"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                        <option value="">Selectionnez un domaine</option>
                        <?php
                        foreach ($dependencies['domaine'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
                <label for="sujet">
                    <span class="text-sm font-medium text-gray-500">Sujet</span>
                    <select
                        id="sujet"
                        name="sujet"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                        <?php
                        foreach ($dependencies['sujet'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>" data-idDomaine="<?= $row->idDomaine ?>"><?= $row->name ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
                <label for="cours">
                    <span class="text-sm font-medium text-gray-500">Cours</span>
                    <select
                        id="cours"
                        name="cours"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                        <?php
                        foreach ($dependencies['cours'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>" data-idDomaine="<?= $row->idDomaine ?>" data-idSujet="<?= $row->idSujet ?>"><?= $row->name ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
                <label for="formateur">
                    <span class="text-sm font-medium text-gray-500">Formateur</span>
                    <select
                        id="formateur"
                        name="formateur"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                        <option value="">Selectionnez un formateur</option>
                        <?php
                        foreach ($dependencies['formateur'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>"><?= $row->firstName . ' ' . $row->lastName ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
                <label for="formation" class="col-span-2 md:col-span-1">
                    <span class="text-sm font-medium text-gray-500">Formation <span class="text-red-700">*</span></span>
                    <select
                        id="formation"
                        name="formation"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm" required>
                        <?php
                        foreach ($dependencies['formation'] as $row) {
                        ?>
                            <option data-idDomaine="<?= $row->idDomaine ?>" data-idSujet="<?= $row->idSujet ?>" data-idCours="<?= $row->idCours ?>" data-idFormateur="<?= $row->idFormateur ?>"
                                value="<?= $row->id ?>"><?= $row->cours . ' - ' . $row->formateur ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="ville" class="col-span-2 md:col-span-1">
                    <span class="text-sm font-medium text-gray-500">Ville <span class="text-red-700">*</span></span>
                    <select
                        id="ville"
                        name="ville"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm" required>
                        <option value="">Selectionnez un ville</option>
                        <?php
                        foreach ($dependencies['ville'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>"><?= $row->name . ', ' . $row->pays ?></option>
                        <?php
                        } ?>
                    </select>
                </label>
                <label for="date">
                    <span class="text-sm font-medium text-gray-500">date <span class="text-red-700">*</span></span>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm" required />
                </label>
            </div>
            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/gestion/date" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
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
            const allFormationOptions = $('#formation option').clone();
            $('#domaine').on('change', function() {
                console.log("domaine change");
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
                console.log("sujet change");
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
                $('#cours').trigger('change');
            });

            $('#cours').on('change', function() {
                console.log("cours change");
                const selectedId = $(this).val();
                const selectedDomaineId = $('#domaine').val();
                const selectedSujetId = $('#sujet').val();
                const selectedFormateurId = $('#formateur').val();
                // console.log(selectedFormateurId);
                if (selectedDomaineId == "" && selectedSujetId == "" && selectedId != "") {
                    $('#domaine').val($('option:selected', this).data('iddomaine'));
                    $('#domaine').trigger('change');
                    $('#sujet').val($('option:selected', this).data('idsujet'));
                    $('#sujet').trigger('change');
                    $('#cours').val(selectedId);
                    return;
                }

                $('#formation').empty();
                const defaultOption = $('<option>', {
                    value: '',
                    text: 'Selectionnez une formation',
                    selected: true
                });
                let hasMatches = false;
                $('#formation').append(defaultOption);
                allFormationOptions.each(function() {
                    if ((selectedId == "" &&
                            (($(this).data('iddomaine') == selectedDomaineId || selectedDomaineId == "") &&
                                ($(this).data('idsujet') == selectedSujetId || selectedSujetId == "") &&
                                ($(this).data('idformateur') == selectedFormateurId || selectedFormateurId == ""))) ||
                        ($(this).data('idcours') == selectedId && ($(this).data('idformateur') == selectedFormateurId || selectedFormateurId == ""))) {
                        $('#formation').append($(this));
                        hasMatches = true;
                    }
                });
                if (!hasMatches && selectedId == "" && selectedDomaineId == "" && selectedSujetId == "") {
                    allFormationOptions.each(function() {
                        $('#formation').append($(this));
                        hasMatches = true;
                    });
                } else if (!hasMatches) {
                    $('#formation').append(defaultOption);
                }
            });
            $('#formateur').on('change', function() {
                $('#domaine').trigger('change');
            });
            $('#domaine').trigger('change');

            <?php
            if (isset($_GET['sujet'])) {
                echo '$("#sujet").val(' . $_GET['sujet'] . ');';
            }
            if (isset($_GET['cours'])) {
                echo '$("#cours").val(' . $_GET['cours'] . ');';
            }
            if (isset($_GET['fromateur'])) {
                echo '$("#fromateur").val(' . $_GET['fromateur'] . ');';
            }
            if (isset($_GET['formation'])) {
                echo '$("#formation").val(' . $_GET['formation'] . ');';
            }
            ?>
        });
    </script>
</body>

</html>