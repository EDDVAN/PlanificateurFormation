<?php
if (Session::hasMessage() == 1) {
    include 'Alert.php';
}
include 'MobileDashSideBar.php';
?>
<div class="<?= str_contains(Session::get('path'), '/gestion') ? "w-56 " : "w-16"; ?> hidden md:flex md:flex-row">
    <div class="flex h-screen w-16 flex-col justify-between border-e border-gray-100 bg-white">
        <div>
            <div class="inline-flex size-16 items-center justify-center">
                <span class="grid size-10 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
                    <?= strtoupper($_SESSION['user']->username[0]); ?>
                </span>
            </div>

            <div class="border-t border-gray-100">
                <div class="px-2">
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

                    <ul class="space-y-2 border-t border-gray-100 pt-4">
                        <li>
                            <a
                                href="/gestion"
                                class="group relative flex justify-center rounded-sm px-2 text-xl py-1.5 <?= str_contains(Session::get('path'), '/gestion') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                                <i class="ph ph-gear-six"></i>

                                <span
                                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                    Gestion
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                href="/formation-date"
                                class="group relative flex justify-center rounded-sm px-2 text-xl py-1.5 <?= str_contains(Session::get('path'), '/formation-date') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                                <i class="ph ph-newspaper"></i>

                                <span
                                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                    Dates Formation
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                href="#"
                                class="group relative flex justify-center rounded-sm px-2 text-xl py-1.5 <?= str_contains(Session::get('path'), '/inscription') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                                <i class="ph ph-users"></i>

                                <span
                                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                    Inscriptions
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                href="/dashboard/calendar"
                                class="group relative flex justify-center rounded-sm px-2 py-1.5 text-xl <?= str_contains(Session::get('path'), '/dashboard/calendar') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700'; ?>">
                                <i class="ph ph-calendar-dots"></i>

                                <span
                                    class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded-sm bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                    Calendar
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 bg-white p-2">
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
        <div class="flex h-screen w-40 flex-1 flex-col justify-between border-e border-gray-100 bg-white">
            <div class="px-4 py-6">
                <ul class="mt-14 space-y-1">
                    <li>
                        <a
                            href="/gestion/domaine"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/domaine') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Domaine
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/sujet"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/sujet') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Sujet
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/cours"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/cours') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Cours
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/formation"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/formation') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Formation
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/date"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/date') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Date
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/formateur"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/formateur') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Formateur
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/pays"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/pays') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Pays
                        </a>
                    </li>
                    <li>
                        <a
                            href="/gestion/ville"
                            class="block rounded-lg px-4 py-2 text-sm font-medium <?= str_contains(Session::get('path'), '/ville') == 1 ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700'; ?>">
                            Ville
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>