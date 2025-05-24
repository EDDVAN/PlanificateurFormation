<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen md:w-[calc(100%-14rem)]">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Ajouter un Domaine</h1>

        </div>
        <form method="post" action="/gestion/domaine/create"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full max-h-[calc(100%-4rem)]">
            <div class="">
                <label for="nom">
                    <span class="text-sm font-medium text-gray-500">Nom <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="nom"
                        name="name"
                        class="mt-0.5 w-full  border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        required />
                </label>
            </div>
            <div class="h-32">
                <div class="">
                    <label for="description">
                        <span class="text-sm font-medium text-gray-500">Description <span class="text-red-700">*</span></span>
                        <textarea
                            type="text"
                            id="description"
                            name="description"
                            class="mt-0.5 w-full  border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"
                            required></textarea>
                    </label>
                </div>
            </div>
            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/gestion/domaine" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
                    <i class="ph ph-arrow-left text-lg"></i> <span>Retour</span>
                </a>
                <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                    <i class="ph ph-check-fat text-lg"></i> <span>Enregistrer</span>
                </button>
            </div>
        </form>
    </section>
</body>

</html>