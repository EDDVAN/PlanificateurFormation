<?php require_once 'layout/Head.php'; ?>

<body class="flex relative flex-col">
    <?php include 'layout/Nav.php'; ?>
    <section class="flex flex-col p-4 md:p-8 gap-4 md:gap-8 w-screen ">
        <div class="flex align-center justify-between gap-2 h-24">
            <h1 class="place-content-center text-3xl text-gray-700">Contacter Nous</h1>
        </div>
        <form method="post" action="/contact/send" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-2 md:gap-4 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 ">
                <label for="fullName">
                    <span class="text-sm font-medium text-gray-500">Nom complet <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="fullName"
                        name="fullName"
                        step="0.01"
                        class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        required />
                </label>
                <label for="object">
                    <span class="text-sm font-medium text-gray-500">Objet <span class="text-red-700">*</span></span>
                    <input
                        type="text"
                        id="object"
                        name="object"
                        step="0.01"
                        class="mt-0.5  w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                        maxlength="100"
                        required />
                </label>
            </div>
            <label for="Email">
                <span class="text-sm font-medium text-gray-700">Email <span class="text-red-700">*</span></span>
                <input
                    type="email"
                    name="email"
                    id="Email"
                    class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm"
                    required />
            </label>
            <label for="body">
                <span class="text-sm font-medium text-gray-500">Message <span class="text-red-700">*</span></span>
                <textarea
                    type="text"
                    id="body"
                    name="body"
                    class="mt-0.5 w-full  border-gray-300 px-3 py-2 h- text-gray-900 shadow-sm sm:text-sm"
                    required></textarea>
            </label>
            <div class=" flex gap-2 md:gap-4 align-center justify-center md:justify-end">
                <a href="/" class="flex justify-center align-center gap-2  border border-emerald-600 px-4 py-2 text-sm font-medium text-emerald-600 ">
                    <i class="ph ph-arrow-left text-lg"></i> <span>Retour</span>
                </a>
                <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                    <i class="ph ph-paper-plane-right text-lg"></i> <span>Envoyer</span>
                </button>
            </div>
        </form>
    </section>
    <script src="/js/app.js"></script>
</body>

</html>