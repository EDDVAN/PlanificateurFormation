<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body>
    <?php include __DIR__ . '/../layout/Nav.php'; ?>
    <section class="flex justify-center items-center h-[calc(100vh_-_4rem)]">

        <form action="/login" method="post" enctype="multipart/form-data" class="bg-white shadow w-96 divide-y divide-gray-200">
            <div class="px-5 py-7">
                <label class="font-semibold text-sm text-gray-600 pb-1 block">Username</label>
                <input type="text" name="username" class="border px-3 py-2 mt-1 mb-5 text-sm w-full" value="a" />
                <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                <input type="password" name="password" class="border px-3 py-2 mt-1 mb-5 text-sm w-full" value="a" />
                <button type="submit" class="transition duration-200 bg-emerald-600 hover:bg-emerald-700 focus:bg-emerald-700 focus:shadow-sm focus:ring-4 focus:ring-emerald-700 focus:ring-opacity-50 text-white w-full py-2.5
                    hover:cursor-pointer text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                    <span class="inline-block mr-2">Login</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
        </form>
    </section>

</body>

</html>