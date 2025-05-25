<?php
if (Session::hasMessage() == 1) {
    include 'Alert.php';
}
?>
<div class="flex flex-col <?= str_contains(Session::get('path'), '/gestion') ? "h-24 " : "h-16"; ?> md:hidden">
    <div class="flex justify-center gap-8 xs:gap-8 border-e border-gray-100 bg-white">
        <div class="py-4">
            <a
                href="/dashboard"
                class="t group relative flex justify-center rounded-sm text-xl px-2 py-1.5 <?= str_contains(Session::get('path'), '/dashboard') == 1 ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                <i class="ph ph-house"></i>

                <span
                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                    Home
                </span>
            </a>
        </div>
        <div class="py-4">
            <a
                href="/gestion"
                class="group relative flex justify-center rounded-sm px-2 text-xl py-1.5 <?= str_contains(Session::get('path'), '/gestion') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                <i class="ph ph-gear-six"></i>

                <span
                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                    Gestion
                </span>
            </a>
        </div>

        <div class="py-4">
            <a
                href="#"
                class="group relative flex justify-center rounded-sm px-2 text-xl py-1.5 <?= str_contains(Session::get('path'), '/inscription') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                <i class="ph ph-users"></i>

                <span
                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                    Inscriptions
                </span>
            </a>
        </div>

        <div class="py-4">
            <a
                href="#"
                class="group relative flex justify-center rounded-sm px-2 py-1.5 text-xl <?= str_contains(Session::get('path'), '/calendar') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                <i class="ph ph-calendar-dots"></i>

                <span
                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                    Calendar
                </span>
            </a>
        </div>

        <div class="py-4">
            <form action="/logout" method="post">
                <button
                    type="submit"
                    class="group cursor-pointer relative flex w-full justify-center rounded-lg px-2 py-1.5 text-xl text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                    <i class="ph ph-sign-out"></i>
                    <span
                        class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                        Logout
                    </span>
                </button>
            </form>
        </div>
    </div>
    <?php if (str_contains(Session::get('path'), '/gestion')) { ?>
        <div class="flex flex-row h-8 w-screen flex-wrap xs:flex-nowrap flex-1 justify-between border-e border-gray-100 bg-white">
            <div>
                <a
                    href="/gestion/domaine"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/domaine') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Domaine
                </a>
            </div>
            <div>
                <a
                    href="/gestion/sujet"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/sujet') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Sujet
                </a>
            </div>
            <div>
                <a
                    href="/gestion/cours"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/cours') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Cours
                </a>
            </div>
            <div>
                <a
                    href="/gestion/formation"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/formation') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Formation
                </a>
            </div>
            <div>
                <a
                    href="/gestion/date"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/date') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Date
                </a>
            </div>
            <div>
                <a
                    href="/gestion/formateur"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/formateur') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Formateur
                </a>
            </div>
            <div>
                <a
                    href="/gestion/pays"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/pays') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Pays
                </a>
            </div>
            <div>
                <a
                    href="/gestion/ville"
                    class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/ville') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                    Ville
                </a>
            </div>
        </div>
    <?php } ?>
</div>