<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-8 md:p-8 p-8 w-screen h-fit">
        <a href="/gestion/domaine" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Domaines</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-blue-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['domaine']) ?></h3>
        </a>
        <a href="/gestion/sujet" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Sujets</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-indigo-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['sujet']) ?></h3>
        </a>
        <a href="/gestion/cours" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Cours</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-violet-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['cours']) ?></h3>
        </a>
        <a href="/gestion/formateur" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Formateurs</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-purple-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['formateur']) ?></h3>
        </a>
        <a href="/gestion/pays" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Pays</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-sky-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['pays']) ?></h3>
        </a>
        <a href="/gestion/ville" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Villes</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-cyan-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['ville']) ?></h3>
        </a>
        <a href="/gestion/formation" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Formations</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-teal-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['formation']) ?></h3>
        </a>
        <a href="/gestion/date" class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Dates</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-teal-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['formationDate']) ?></h3>
        </a>
        <div class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Total Inscription</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-amber-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['inscription']) ?></h3>
        </div>
        <div class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Total Paid</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-yellow-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['inscriptionPaid'])  ?></h3>
        </div>
        <div class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Total Unpaid</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-lime-500 h-10 w-10 flex items-center justify-center aspect-square "><?= count($dependencies['inscription']) - count($dependencies['inscriptionPaid']) ?></h3>
        </div>
        <div class="h-20 md:h-28 justify-between items-center rounded-sm border border-gray-100 bg-white p-2 md:p-4 flex  gap-4 md:gap-8">
            <h3 class=" font-bold text-gray-900 md:text-xl">Total Income</h3>
            <h3 class=" font-bold rounded-full p-2 text-white bg-green-500 h-10 w-fit flex items-center justify-center  "><?= number_format($dependencies['inscriptionIncome'], 0, ',', ' ') ?> DH</h3>
        </div>
    </section>
</body>

</html>