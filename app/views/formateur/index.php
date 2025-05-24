<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DeleteModal.php'; ?>
    <?php include __DIR__ . '/../layout/ImageModal.php'; ?>
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>

    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Formateurs (<?= count($data); ?>)</h1>
            <div class="flex flex-col relative align-center justify-center ">
                <a href="/gestion/formateur/add"
                    class="block  border-2 border-emerald-600 flex gap-1 place-content-center px-5 py-2.5 text-sm font-medium text-emerald-600 transition hover:bg-emerald-600
                    hover:text-white hover:cursor-pointer">
                    <i class="ph ph-plus-square text-lg"></i>
                    <span>Ajouter</span>
                </a>
            </div>

        </div>
        <div class="flex flex-col gap-2 w-full h-[calc(100%-4rem)]">
            <table class="min-w-full divide-y-2 divide-gray-200 p-2 " id="formateur-table">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-white bg-emerald-600 ">
                        <th class="px-3 py-2 whitespace-nowrap w-3/20">Prénom</th>
                        <th class="px-3 py-2 whitespace-nowrap w-3/20">Nom</th>
                        <th class="px-3 py-2 whitespace-nowrap w-10/20">Description</th>
                        <th class="px-3 py-2 whitespace-nowrap w-1/20">Photo</th>
                        <th class="px-3 py-2 whitespace-nowrap w-1/20">Formations</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    foreach ($data as $row) {
                    ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->firstName; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->lastName; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->description; ?></td>
                            <td class="px-3 py-2 whitespace-wrap text-center ">
                                <?php
                                if (empty($row->photo)) {
                                    echo "Aucune photo";
                                } else { ?>
                                    <img src="<?= $row->photo; ?>" alt="<?= $row->lastName; ?>" onclick="openImageModal('<?= $row->photo; ?>','<?= $row->lastName; ?>')" class="cursor-pointer w-12 h-12">
                                <?php }
                                ?>
                            </td>
                            <td class="px-3 py-2 whitespace-wrap text-center"><?= $row->nbFormation; ?></td>
                            <td class="px-3 py-2 flex align-center justify-around gap-2 border-0">
                                <a href="/gestion/formateur/edit?id=<?= $row->id ?>" class="cursor-pointer flex w-12 justify-center align-center text-sm gap-1 px-2 py-1.5 text-white bg-amber-500 ">
                                    <i class="ph ph-pencil text-lg"></i>
                                </a>
                                <button
                                    data-id="<?= $row->id ?>"
                                    data-name="<?= $row->firstName . ' ' . $row->lastName ?>"
                                    data-url="/gestion/formateur/delete"
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
        if ($('#formateur-table') != null) {
            let table = $('#formateur-table').dataTable({
                "pageLength": 10,
                stateSave: true,
                autoWidth: false
            });
        }
    </script>
    <script src="/js/app.js"></script>
</body>

</html>