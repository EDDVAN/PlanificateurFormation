<?php include 'layout/Head.php'; ?>

<body>
    <?php include 'layout/Nav.php'; ?>
    <?php //include 'layout/Calandar.php'; 
    ?>

    <section class="overflow-hidden bg-gray-50 sm:grid sm:grid-cols-2 sm:items-center">
        <div class="p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
                    Libérez le potentiel de vos équipes
                </h2>

                <p class="hidden text-gray-500 md:mt-4 md:block">
                    Offrez à vos collaborateurs des formations sur mesure, animées par des experts, pour développer leurs compétences et améliorer leur performance.

                </p>
                <p class="hidden text-gray-500 md:mt-4 md:block font-bold">Des cours adaptés. Des résultats concrets. Un impact durable.</p>
                <div class="mt-4 md:mt-8">
                    <a
                        href="/client/formation"
                        class="inline-block bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:ring-3 focus:ring-emerald-400 focus:outline-hidden">
                        Découvrir nos formations
                    </a>
                </div>
            </div>
        </div>

        <img
            alt=""
            src="https://images.unsplash.com/photo-1464582883107-8adf2dca8a9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
            class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]" />
    </section>

    <span class="flex items-center pt-8">
        <span class="h-px flex-1 bg-gray-300"></span>

        <span class="shrink-0 px-4 text-gray-900">Pourquoi Nous</span>

        <span class="h-px flex-1 bg-gray-300"></span>
    </span>

    <div class="p-4 md:p-8 grid grid-cols-1 md:grid-cols-2 md:grid-cols-lg gap-4 md:gap-8">
        <div class="group relative block h-64 sm:h-40 lg:h-48">
            <span class="absolute inset-0 border-2 border-dashed border-black"></span>
            <div
                class="relative flex h-full transform items-end border-2 border-black bg-white transition-transform group-hover:border-dashed">
                <div
                    class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-10 sm:size-12"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium sm:text-2xl">Autour du monde</h2>
                </div>
                <div
                    class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
                    <h3 class="mt-4 text-xl font-medium sm:text-2xl">Autour du monde</h3>

                    <p class="mt-4 text-sm sm:text-base">
                        Avec une présence mondiale, nous connectons notre communauté mondiale de formateurs et d'apprenants.
                    </p>
                </div>
            </div>
        </div>

        <div class="group relative block h-64 sm:h-40 lg:h-48">
            <span class="absolute inset-0 border-2 border-dashed border-black"></span>
            <div
                class="relative flex h-full transform items-end border-2 border-black bg-white transition-transform group-hover:border-dashed">
                <div
                    class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="size-10 sm:size-12"
                        fill="none"
                        viewBox="0 0 512 512"
                        stroke="currentColor">>
                        <path fill="#000000" d="M168.5 72L256 165l87.5-93-175 0zM383.9 99.1L311.5 176l129 0L383.9 99.1zm50 124.9L256 224 78.1 224 256 420.3 433.9 224zM71.5 176l129 0L128.1 99.1 71.5 176zm434.3 40.1l-232 256c-4.5 5-11 7.9-17.8 7.9s-13.2-2.9-17.8-7.9l-232-256c-7.7-8.5-8.3-21.2-1.5-30.4l112-152c4.5-6.1 11.7-9.8 19.3-9.8l240 0c7.6 0 14.8 3.6 19.3 9.8l112 152c6.8 9.2 6.1 21.9-1.5 30.4z" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium sm:text-2xl">Expérience</h2>
                </div>
                <div
                    class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
                    <h3 class="mt-4 text-xl font-medium sm:text-2xl">Expérience</h3>

                    <p class="mt-4 text-sm sm:text-base">
                        Expérience avérée, satisfaction à 100 % et amélioration immédiate.
                    </p>
                </div>
            </div>
        </div>

        <div class="group relative block h-64 sm:h-40 lg:h-48">
            <span class="absolute inset-0 border-2 border-dashed border-black"></span>
            <div
                class="relative flex h-full transform items-end border-2 border-black bg-white transition-transform group-hover:border-dashed">
                <div
                    class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">


                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="size-10 sm:size-12"
                        viewBox="0 0 448 512"
                        stroke="currentColor">
                        <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l80 0 0 56-80 0 0-56zm0 104l80 0 0 64-80 0 0-64zm128 0l96 0 0 64-96 0 0-64zm144 0l80 0 0 64-80 0 0-64zm80-48l-80 0 0-56 80 0 0 56zm0 160l0 40c0 8.8-7.2 16-16 16l-64 0 0-56 80 0zm-128 0l0 56-96 0 0-56 96 0zm-144 0l0 56-64 0c-8.8 0-16-7.2-16-16l0-40 80 0zM272 248l-96 0 0-56 96 0 0 56z" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium sm:text-2xl">Couverture</h2>
                </div>
                <div
                    class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
                    <h3 class="mt-4 text-xl font-medium sm:text-2xl">Couverture</h3>

                    <p class="mt-4 text-sm sm:text-base">
                        Couvrant un large éventail de sujets et de compétences, nous avons certainement quelque chose à améliorer pour votre personnel.
                    </p>
                </div>
            </div>
        </div>

        <div class="group relative block h-64 sm:h-40 lg:h-48">
            <span class="absolute inset-0 border-2 border-dashed border-black"></span>
            <div
                class="relative flex h-full transform items-end border-2 border-black bg-white transition-transform group-hover:border-dashed">
                <div
                    class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="size-10 sm:size-12"
                        viewBox="0 0 640 512"
                        stroke="currentColor">
                        <path d="M272.2 64.6l-51.1 51.1c-15.3 4.2-29.5 11.9-41.5 22.5L153 161.9C142.8 171 129.5 176 115.8 176L96 176l0 128c20.4 .6 39.8 8.9 54.3 23.4l35.6 35.6 7 7c0 0 0 0 0 0L219.9 397c6.2 6.2 16.4 6.2 22.6 0c1.7-1.7 3-3.7 3.7-5.8c2.8-7.7 9.3-13.5 17.3-15.3s16.4 .6 22.2 6.5L296.5 393c11.6 11.6 30.4 11.6 41.9 0c5.4-5.4 8.3-12.3 8.6-19.4c.4-8.8 5.6-16.6 13.6-20.4s17.3-3 24.4 2.1c9.4 6.7 22.5 5.8 30.9-2.6c9.4-9.4 9.4-24.6 0-33.9L340.1 243l-35.8 33c-27.3 25.2-69.2 25.6-97 .9c-31.7-28.2-32.4-77.4-1.6-106.5l70.1-66.2C303.2 78.4 339.4 64 377.1 64c36.1 0 71 13.3 97.9 37.2L505.1 128l38.9 0 40 0 40 0c8.8 0 16 7.2 16 16l0 208c0 17.7-14.3 32-32 32l-32 0c-11.8 0-22.2-6.4-27.7-16l-84.9 0c-3.4 6.7-7.9 13.1-13.5 18.7c-17.1 17.1-40.8 23.8-63 20.1c-3.6 7.3-8.5 14.1-14.6 20.2c-27.3 27.3-70 30-100.4 8.1c-25.1 20.8-62.5 19.5-86-4.1L159 404l-7-7-35.6-35.6c-5.5-5.5-12.7-8.7-20.4-9.3C96 369.7 81.6 384 64 384l-32 0c-17.7 0-32-14.3-32-32L0 144c0-8.8 7.2-16 16-16l40 0 40 0 19.8 0c2 0 3.9-.7 5.3-2l26.5-23.6C175.5 77.7 211.4 64 248.7 64L259 64c4.4 0 8.9 .2 13.2 .6zM544 320l0-144-48 0c-5.9 0-11.6-2.2-15.9-6.1l-36.9-32.8c-18.2-16.2-41.7-25.1-66.1-25.1c-25.4 0-49.8 9.7-68.3 27.1l-70.1 66.2c-10.3 9.8-10.1 26.3 .5 35.7c9.3 8.3 23.4 8.1 32.5-.3l71.9-66.4c9.7-9 24.9-8.4 33.9 1.4s8.4 24.9-1.4 33.9l-.8 .8 74.4 74.4c10 10 16.5 22.3 19.4 35.1l74.8 0zM64 336a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm528 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                    </svg>

                    <h2 class="mt-4 text-xl font-medium sm:text-2xl">Engageons</h2>
                </div>
                <div
                    class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
                    <h3 class="mt-4 text-xl font-medium sm:text-2xl">Engageons</h3>

                    <p class="mt-4 text-sm sm:text-base">
                        nous nous engageons à fournir le meilleur service, en apprenant et en nous appuyant sur les expériences et les commentaires antérieurs.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <span class="flex items-center pt-8">
        <span class="h-px flex-1 bg-gray-300"></span>

        <span class="shrink-0 px-4 text-gray-900">Formations Précédents</span>

        <span class="h-px flex-1 bg-gray-300"></span>
    </span>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-6 lg:gap-8 md:p-8 p-4">
        <article class="flex bg-gray-50 flex-col sm:flex-row transition hover:shadow-xl lg:col-span-2">
            <div class="sm:rotate-180 p-2 sm:[writing-mode:_vertical-lr]">
                <time
                    datetime="2022-10-10"
                    class="flex items-center justify-between gap-4 text-xs font-bold text-gray-900 uppercase">
                    <span>2024</span>
                    <span class="w-px h-px flex-1 bg-gray-900/10"></span>
                    <span>11 Oct</span>
                </time>
            </div>
            <div class="sm:block sm:basis-2/3">
                <img
                    alt=""
                    src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="aspect-3/2 h-full w-full object-cover" />
            </div>
            <div class="flex flex-1 flex-col justify-between">
                <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Formation Technologies Web
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                        Pour que les employés de banque maîtrisent les nouvelles technologies.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end">
                    <a
                        href=""
                        class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-yellow-400">
                        Voir
                    </a>
                </div>
            </div>
        </article>
        <article class="flex bg-gray-50 flex-col sm:flex-row transition hover:shadow-xl lg:col-span-2">
            <div class="sm:rotate-180 p-2 sm:[writing-mode:_vertical-lr]">
                <time
                    datetime="2022-10-10"
                    class="flex items-center justify-between gap-4 text-xs font-bold text-gray-900 uppercase">
                    <span>2025</span>
                    <span class="w-px h-px flex-1 bg-gray-900/10"></span>
                    <span>18 Jan</span>
                </time>
            </div>

            <div class=" sm:block sm:basis-2/3">
                <img
                    alt=""
                    src="https://images.unsplash.com/photo-1733222764429-5fcd683c4b7d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="aspect-3/2 h-full w-full object-cover" />
            </div>

            <div class="flex flex-1 flex-col justify-between">
                <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Formation Big Data
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                        Formation Hadoop encapsulant toute la technologie.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end">
                    <a
                        href="#"
                        class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-yellow-400">
                        Voir
                    </a>
                </div>
            </div>
        </article>
        <article class="flex bg-gray-50 flex-col sm:flex-row transition hover:shadow-xl lg:col-span-2">
            <div class="sm:rotate-180 p-2 sm:[writing-mode:_vertical-lr]">
                <time
                    datetime="2022-10-10"
                    class="flex items-center justify-between gap-4 text-xs font-bold text-gray-900 uppercase">
                    <span>2025</span>
                    <span class="w-px h-px flex-1 bg-gray-900/10"></span>
                    <span>05 Apr</span>
                </time>
            </div>

            <div class=" sm:block sm:basis-2/3">
                <img
                    alt=""
                    src="https://images.unsplash.com/photo-1515168833906-d2a3b82b302a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="aspect-3/2 h-full w-full object-cover" />
            </div>

            <div class="flex flex-1 flex-col justify-between">
                <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Management - Scrum
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                        Plongée en profondeur dans les méthodologies Scrum et Agile.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end">
                    <a
                        href="#"
                        class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-yellow-400">
                        Voir
                    </a>
                </div>
            </div>
        </article>
    </div>
    <span class="flex items-center pt-8">
        <span class="h-px flex-1 bg-gray-300"></span>

        <span class="shrink-0 px-4 text-gray-900">Notre Histoire</span>

        <span class="h-px flex-1 bg-gray-300"></span>
    </span>

    <section class="overflow-hidden p-8">
        <ol
            class="relative space-y-8 before:absolute before:top-0 before:left-1/2 before:h-full before:w-0.5 before:-translate-x-1/2 before:rounded-full before:bg-gray-200">
            <li class="group relative grid grid-cols-2 odd:-me-3 even:-ms-3">
                <div
                    class="relative flex items-start gap-4 group-odd:flex-row-reverse group-odd:text-right group-even:order-last">
                    <span class="size-3 shrink-0 rounded-full bg-emerald-600"></span>

                    <div class="-mt-2">
                        <time class="text-xs/none font-medium text-gray-700">11/09/2023</time>

                        <h3 class="text-lg font-bold text-gray-900">Depart</h3>

                        <p class="mt-0.5 text-sm text-gray-700">
                            Nous avons lancé notre service avec 9 formations dans 2 domaines.
                        </p>
                    </div>
                </div>

                <div aria-hidden="true"></div>
            </li>

            <li class="group relative grid grid-cols-2 odd:-me-3 even:-ms-3">
                <div
                    class="relative flex items-start gap-4 group-odd:flex-row-reverse group-odd:text-right group-even:order-last">
                    <span class="size-3 shrink-0 rounded-full bg-emerald-600"></span>

                    <div class="-mt-2">
                        <time class="text-xs/none font-medium text-gray-700">7/02/2024</time>

                        <h3 class="text-lg font-bold text-gray-900">Amélioration</h3>

                        <p class="mt-0.5 text-sm text-gray-700">
                            Nous avons commencé à embaucher des formateurs de haut niveau dans chaque domaine.
                        </p>
                    </div>
                </div>

                <div aria-hidden="true"></div>
            </li>

            <li class="group relative grid grid-cols-2 odd:-me-3 even:-ms-3">
                <div
                    class="relative flex items-start gap-4 group-odd:flex-row-reverse group-odd:text-right group-even:order-last">
                    <span class="size-3 shrink-0 rounded-full bg-emerald-600"></span>

                    <div class="-mt-2">
                        <time class="text-xs/none font-medium text-gray-700">0/04/2025</time>

                        <h3 class="text-lg font-bold text-gray-900">Plus de domaines</h3>

                        <p class="mt-0.5 text-sm text-gray-700">
                            Nous avons élargi notre catalogue de domaines de réflexion, élargissant ainsi notre expertise.
                        </p>
                    </div>
                </div>

                <div aria-hidden="true"></div>
            </li>
            <li class="group relative grid grid-cols-2 odd:-me-3 even:-ms-3">
                <div
                    class="relative flex items-start gap-4 group-odd:flex-row-reverse group-odd:text-right group-even:order-last">
                    <span class="size-3 shrink-0 rounded-full bg-emerald-600"></span>

                    <div class="-mt-2">
                        <time class="text-xs/none font-medium text-gray-700">6/01/2025</time>

                        <h3 class="text-lg font-bold text-gray-900">Expansion</h3>

                        <p class="mt-0.5 text-sm text-gray-700">
                            Nous avons étendu notre portée à des pays étrangers, avec des formations dispensées par des enseignants nationaux et internationaux.
                        </p>
                    </div>
                </div>

                <div aria-hidden="true"></div>
            </li>

            <li class="group relative grid grid-cols-2 odd:-me-3 even:-ms-3">
                <div
                    class="relative flex items-start gap-4 group-odd:flex-row-reverse group-odd:text-right group-even:order-last">
                    <span class="size-3 shrink-0 rounded-full bg-emerald-600"></span>

                    <div class="-mt-2">
                        <time class="text-xs/none font-medium text-gray-700">Tous les jours</time>

                        <h3 class="text-lg font-bold text-gray-900">Valeur</h3>

                        <p class="mt-0.5 text-sm text-gray-700">
                            Nous apportons de la valeur à nos clients, en élargissant leurs compétences et leurs connaissances.
                        </p>
                    </div>
                </div>

                <div aria-hidden="true"></div>
            </li>
        </ol>
    </section>

    <?php include 'layout/Footer.php'; ?>

</body>

</html>