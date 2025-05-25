<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DeleteModal.php'; ?>
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen ">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Inscriptions (<?= count($data); ?>)</h1>
            <div class="flex flex-col relative align-center justify-center ">
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full h-[calc(100%-4rem)]">
            <table class="min-w-full divide-y-2 divide-gray-200 p-2 " id="inscription-table">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-white bg-emerald-600 ">
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Client</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Email</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Téléphone</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Company</th>
                        <th class="px-3 py-2 whitespace-nowrap w-5/20">Formation</th>
                        <th class="px-3 py-2 !text-left whitespace-nowrap w-2/20">Date</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20">Ville</th>
                        <th class="px-3 py-2 whitespace-nowrap w-1/20">Paid</th>
                        <th class="px-3 py-2 whitespace-nowrap w-2/20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    foreach ($data as $row) {
                    ?>
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->firstName . ' ' . $row->lastName; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->email; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->phone; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->company; ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->cours . ' - ' . $row->formateur; ?></td>
                            <td class="px-3 py-2 !text-left whitespace-wrap"><?= substr($row->date, 0, 10); ?></td>
                            <td class="px-3 py-2 whitespace-wrap"><?= $row->ville; ?></td>

                            <td class="px-3 py-2 whitespace-wrap"><?= $row->paid ? 'Oui' : 'Non'; ?></td>
                            <td class="px-3 py-2 flex align-center justify-around gap-2 border-0">
                                <a href="/inscription/edit?id=<?= $row->id ?>&formation=<?= $row->idFormation ?>" class="cursor-pointer flex w-12 justify-center align-center text-sm gap-1 px-2 py-1.5 text-white bg-amber-500 ">
                                    <i class="ph ph-pencil text-lg"></i>
                                </a>
                                <button
                                    data-id="<?= $row->id ?>"
                                    data-name="<?= $row->lastName . " (" . $row->cours . ' - ' . substr($row->date, 0, 10) . ")" ?>"
                                    data-url="/inscription/delete"
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
        if ($('#inscription-table') != null) {
            let table = $('#inscription-table').dataTable({
                "pageLength": 10,
                stateSave: true,
                autoWidth: false
            });
        }
    </script>
    <script src="/js/app.js"></script>
</body>

</html>