<form action="" method="post" id="delete-form"
    class="fixed inset-0 hidden z-50 grid justify-center bg-black/50 p-4"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modalTitle">
    <input type="hidden" name="id" value="">
    <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg h-fit">
        <div class="flex items-start justify-between">
            <h2 id="modalTitle" class="text-xl font-bolder text-gray-900 sm:text-2xl">Supprimer <span id="delete-modal-title-span" class="font-bold">IT</span></h2>
            <button
                onclick="closeDeleteModal()"
                type="button"
                class="-me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
                aria-label="Close">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-4">
            <p class="text-pretty text-gray-700">
                êtes-vous sûr de vouloir supprimer cet enregistrement? cette action est irréversible!
            </p>
        </div>
        <footer class="mt-6 flex justify-end gap-2">
            <button
                onclick="closeDeleteModal()"
                type="button"
                class="cursor-pointer rounded bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-200">
                Annuler
            </button>
            <button
                type="submit"
                class="cursor-pointer rounded bg-red-700 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-800">
                Supprimer
            </button>
        </footer>
    </div>
</form>