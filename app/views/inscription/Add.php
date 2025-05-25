<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col">
    <?php include __DIR__ . '/../layout/Nav.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen ">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Inscription</h1>
        </div>
        <form method="post" action="/client/formation/join" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full">
            <div class=" grid grid-cols-1 gap-2 md:gap-4 ">
                <label for=" formationDate">
                    <span class="text-sm font-medium text-gray-500">Date Formation</span>
                    <select
                        id="formationDate"
                        name="formationDate"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                        <option value="">Selectionnez une Date Formation</option>
                        <?php
                        foreach ($dependencies['formationDate'] as $row) {
                        ?>
                            <option value="<?= $row->id ?>"><?= $row->domaine  . ' -> ' . $row->sujet . ' > ' . $row->cours . ' a ' . $row->ville . ' le ' . substr($row->date, 0, 10) . ' - ' . $row->price . 'Dh' ?></option>
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
                        required />
                </label>
                <label for="lastname">
                    <span class="text-sm font-medium text-gray-500">Nom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="lastname"
                        name="lastname"
                        step="0.01"
                        class="mt-0.5  w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        required />
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="Email">
                    <span class="text-sm font-medium text-gray-700">Email <span class="text-red-700">*</span></span>
                    <input
                        type="email"
                        name="email"
                        id="Email"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        required />
                </label>
                <label for="phone">
                    <span class="text-sm font-medium text-gray-700">Téléphone </span>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        pattern="^0\d{9}$"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm" />
                </label>
                <label for="company">
                    <span class="text-sm font-medium text-gray-700">Company </span>
                    <input
                        type="text"
                        name="company"
                        id="company"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm" />
                </label>
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
</body>

</html>