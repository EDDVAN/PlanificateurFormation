<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex flex-col md:flex-row relative">
    <?php include __DIR__ . '/../layout/DeleteModal.php'; ?>
    <?php include __DIR__ . '/../layout/ImageModal.php'; ?>
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Formations (<?= count($data); ?>)</h1>
            <div class="flex flex-col relative align-center justify-center ">
                <a href="/gestion/formation/add"
                    class="block  border-2 border-emerald-600 flex gap-1 place-content-center px-5 py-2.5 text-sm font-medium text-emerald-600 transition hover:bg-emerald-600
                    hover:text-white hover:cursor-pointer">
                    <i class="ph ph-plus-square text-lg"></i>
                    <span>Ajouter</span>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full h-[calc(100%-4rem)]">
            <div class="flex flex-col gap-2">
                <form action="/gestion/formation" method="get" class="flex gap-2">
                    <label for="domaine" class="w-full">
                        <span class="text-sm font-medium text-gray-500">Domaine</span>
                        <select
                            id="domaine"
                            name="domaine"
                            class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                            <option value="">Selectionnez un domaine</option>
                            <?php
                            foreach ($dependencies['domaine'] as $row) {
                                $selected = '';
                                if (isset($_GET['domaine'])) {
                                    $selected = $_GET['domaine'] == $row->id ? 'selected' : '';
                                }
                            ?>
                                <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->name ?></option>
                            <?php
                            } ?>
                        </select>
                    </label>
                    <label for="sujet" class="w-full">
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
                    <label for="cours" class="w-full">
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
                    <label for="formateur" class="w-full">
                        <span class="text-sm font-medium text-gray-500">Formateur</span>
                        <select
                            id="formateur"
                            name="formateur"
                            class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                            <option value="">Selectionnez un formateur</option>
                            <?php
                            foreach ($dependencies['formateur'] as $row) {
                                $selected = '';
                                if (isset($_GET['formateur']))
                                    $selected = $_GET['formateur'] == $row->id ? 'selected' : '';
                            ?>
                                <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->firstName . ' ' . $row->lastName ?></option>
                            <?php
                            } ?>
                        </select>
                    </label>
                    <label class="flex flex-col justify-end align-end">
                        <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                            <i class="ph ph-magnifying-glass text-lg"></i>
                        </button>
                    </label>
                </form>
            </div>
            <table class="min-w-full divide-y-2 divide-gray-200 p-2 " id="formation-table">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-white bg-emerald-600 ">
                        <th class="px-3 py-2 whitespace-nowrap w-4/20">Domaine</th>
                        <th class="px-3 py-2 whitespace-nowrap w-3/20">Sujet</th>
                        <th class="px-3 py-2 whitespace-nowrap w-3/20">Cours</th>
                        <th class="px-3 py-2 whitespace-nowrap w-4/20">Formateur</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Mode</th>
                        <th class="px-3 py-2 !text-left w-3/20">Prix</th>
                        <th class="px-3 py-2 whitespace-nowrap w-1/20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    foreach ($data as $row) {
                    ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->domaine; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->sujet; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->cours; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->formateur; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->mode; ?></td>
                            <td class="px-3 py-2 !text-right whitespace-wrap"><?= number_format(intval($row->price), 2, ',', ' '); ?></td>
                            <td class="px-3 py-2 flex flex-col lg:flex-row align-center justify-around gap-2 border-0 w-fit">
                                <a href="/gestion/formation/edit?id=<?= $row->id ?>" class="cursor-pointer flex w-12 justify-center align-center text-sm gap-1 px-2 py-1.5 text-white bg-amber-500">
                                    <i class="ph ph-pencil text-lg"></i>
                                </a>
                                <button
                                    data-id="<?= $row->id ?>"
                                    data-name="<?= $row->cours . ' - ' . $row->formateur ?>"
                                    data-url="/gestion/formation/delete"
                                    onclick="deleteModal(this)"
                                    class="cursor-pointer flex w-12 justify-center align-center text-sm gap-1 px-2 py-1.5 text-white bg-red-700">
                                    <i class="ph ph-x-square text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>


    <script>
        if ($('#formation-table') != null) {
            let table = $('#formation-table').dataTable({
                "pageLength": 10,
                stateSave: true,
                autoWidth: false
            });
        }
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
            if (isset($_GET['sujet'])) {
                echo '$("#sujet").val(' . $_GET['sujet'] . ');';
            }
            if (isset($_GET['cours'])) {
                echo '$("#cours").val(' . $_GET['cours'] . ');';
            }
            ?>
        });
    </script>
    <script src="/js/app.js"></script>
</body>

</html>