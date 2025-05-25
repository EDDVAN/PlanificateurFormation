<?php
if (Session::hasMessage() == 1) {
    include 'Alert.php';
}
?>
<header class="bg-white">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8 ">
        <a class="block text-emerald-600" href="/">
            <span class="sr-only">Home</span>
            <i class="ph-fill ph-calendar-star text-5xl text-emerald-600"></i>

        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-700" href="/client/formation"> Formations </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-700" href="/client/calendar"> Calendrier </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-700" href="/contact"> Contact </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                <div class="flex gap-2 w-fit">

                </div>



                <div class="relative">
                    <button
                        onclick="toggleNavMenu()"
                        class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 ">
                        <span class="sr-only">Toggle menu</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <div id="nav-menu"
                        class="hidden absolute end-0 z-10 mt-0.5 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                        role="menu">
                        <div class="p-2 block md:hidden">
                            <a
                                href="/client/formation"
                                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem">
                                Formations
                            </a>

                            <a
                                href="/client/calendar"
                                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem">
                                Calendrier
                            </a>

                            <a
                                href="/contact"
                                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem">
                                Contact
                            </a>
                        </div>



                        <div class="p-2">

                            <?php
                            if (Session::isLogged() == false) { ?>
                                <a
                                    href="/login"
                                    class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-emerald-700 hover:bg-emerald-50"
                                    role="menuitem">
                                    <i class="ph-fill ph-sign-in"></i>
                                    Login
                                </a>
                            <?php } else { ?>
                                <a
                                    href="/dashboard"
                                    class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                    role="menuitem">
                                    <i class="ph-fill ph-list-dashes"></i>
                                    Dashboard
                                </a>
                                <form action="/logout" method="post">
                                    <button
                                        type="submit"
                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                        role="menuitem">
                                        <i class="ph-fill ph-sign-out"></i>
                                        Logout
                                    </button>
                                </form>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    function toggleNavMenu() {
        $('#nav-menu').toggleClass('hidden');
    }
</script>