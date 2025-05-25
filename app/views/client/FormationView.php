<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex flex-col relative">
    <?php include __DIR__ . '/../layout/Nav.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen">
        <h1>Formation : <?= $data->domaine . ' -> ' . $data->sujet . ' -> ' . $data->cours ?></h1>
        <span class="flex items-center col-span-1 md:col-span-3">
            <span class="h-px flex-1 bg-gray-300"></span>
        </span>
        <div class="grid grid-col-1 md:grid-cols-3 gap-2 md:gap-4">
            <a href="" class="block">
                <div class="h-64 w-full object-cover sm:h-80 lg:h-96">
                    <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl"><?= $data->domaine ?></h3>

                    <p class="mt-2 max-w-sm text-gray-700">
                        <?= $data->domaineDescription ?>
                    </p>
                </div>
            </a>
            <a href="" class="block">
                <?php if ($data->sujetLogo != null && $data->sujetLogo != '') { ?>
                    <img
                        alt="<?= $data->sujet ?>"
                        src="<?= $data->sujetLogo ?>"
                        class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                <?php } else {
                ?>
                    <div class="h-64 w-full object-cover sm:h-80 lg:h-96"></div>
                <?php
                } ?>
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl"><?= $data->sujet ?></h3>

                <p class="mt-2 max-w-sm text-gray-700">
                    <?= $data->sujetDescription ?>
                </p>
            </a>
            <a href="" class="block">
                <?php if ($data->coursLogo != null && $data->coursLogo != '') { ?>
                    <img
                        alt="<?= $data->cours ?>"
                        src="<?= $data->coursLogo ?>"
                        class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                <?php } else {
                ?>
                    <div class="h-64 w-full object-cover sm:h-80 lg:h-96"></div>
                <?php
                } ?>
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl"><?= $data->cours ?></h3>

                <p class="mt-2 max-w-sm text-gray-700">
                    <?= $data->coursDescription ?>
                </p>
            </a>
            <span class="flex items-center col-span-1 md:col-span-3">
                <span class="h-px flex-1 bg-gray-300"></span>
            </span>
            <div class="flex items-start gap-4">
                <?php if ($data->formateurPhoto != null && $data->formateurPhoto != '') { ?>
                    <img
                        alt="<?= $data->formateur ?>"
                        src="<?= $data->formateurPhoto ?>"
                        class="size-20 rounded object-cover" />
                <?php } ?>
                <div>
                    <h3 class="font-medium text-gray-900 sm:text-lg">Enseignée par <?= $data->formateur ?></h3>
                    <p class="mt-0.5 text-gray-700">
                        <?= $data->formateurDescription ?>
                    </p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div>
                    <h3 class="font-medium text-gray-900 text-center sm:text-lg">Mode de formation : <?= $data->mode ?></h3>
                    <p class="mt-0.5 text-gray-700">
                        Prix : <?= number_format($data->price, 2, ',', ' ') ?> Dh
                    </p>
                </div>
            </div>
            <div>
                <h3 class="font-medium text-gray-900 sm:text-lg">dates à venir : <?= $data->upcomingDates ?></h3>
                <div class="flex flex-col gap-2 mt-0.5 text-gray-700">
                    <?php
                    if ($data->upcomingDates != null && $data->upcomingDates != 0) {
                        echo "<a class='p-2 ' href='/client/calendar?domaine=" . $data->idDomaine . "&cours=" . $data->idCours . "&sujet=" . $data->idSujet . "&formateur=" . $data->idFormateur . "'>Voir le calendrier</a>";
                        echo "<a class='p-2 ' href='/client/formation/inscription?formation=" . $data->id . "'>Inscrire</a>";
                    } else {
                        echo "Aucune date disponible pour le moment, veuillez nous contacter pour plus d'informations.";
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>
    <script src="/js/app.js"></script>
</body>

</html>