<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex flex-col md:flex-row relative">
    <?php include __DIR__ . '/../layout/DeleteModal.php'; ?>
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Pays (<?= count($data); ?>)</h1>
            <div class="flex flex-col relative align-center justify-center ">
                <a href="/gestion/ville/add"
                    class="block  border-2 border-emerald-600 flex gap-1 place-content-center px-5 py-2.5 text-sm font-medium text-emerald-600 transition hover:bg-emerald-600
                    hover:text-white hover:cursor-pointer">
                    <i class="ph ph-plus-square text-lg"></i>
                    <span>Ajouter</span>
                </a>
            </div>

        </div>
        <div class="flex flex-col gap-2 w-full h-[calc(100%-4rem)]">
            <div class="flex flex-col gap-2">
                <form action="/gestion/ville" method="get">
                    <label for="pays">
                        <span class="text-sm font-medium text-gray-500">Pays <span class="text-red-700">*</span></span>
                        <select
                            id="pays"
                            name="pays"
                            class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                            onchange="this.form.submit()"
                            required>
                            <option value="">Selectionnez un pays</option>
                            <?php
                            foreach ($dependencies['pays'] as $row) {
                                $selected = $_GET['pays'] == $row->id ? 'selected' : '';
                            ?>
                                <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->sigle . ' - ' . $row->name ?></option>
                            <?php
                            } ?>
                        </select>
                    </label>
                </form>
            </div>
            <table class="min-w-full divide-y-2 divide-gray-200 p-2 " id="pays-table">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-white bg-emerald-600 ">
                        <th class="px-3 py-2 whitespace-nowrap w-8/20">Pays</th>
                        <th class="px-3 py-2 whitespace-nowrap w-8/20">Nom</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Sigle</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    foreach ($data as $row) {
                    ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->pays; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->name; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->sigle; ?></td>
                            <td class="px-3 py-2 flex align-center justify-around gap-2 border-0">
                                <a href="/gestion/ville/edit?id=<?= $row->id ?>" class="cursor-pointer flex w-12 justify-center align-center text-sm gap-1 px-2 py-1.5 text-white bg-amber-500 ">
                                    <i class="ph ph-pencil text-lg"></i>
                                </a>
                                <button
                                    data-id="<?= $row->id ?>"
                                    data-name="<?= $row->name ?>"
                                    data-url="/gestion/ville/delete"
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
        if ($('#pays-table') != null) {
            let table = $('#pays-table').dataTable({
                "pageLength": 10,
                stateSave: true,
                autoWidth: false
            });
        }
    </script>
    <script src="/js/app.js"></script>
</body>

</html>