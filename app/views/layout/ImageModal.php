<div id="image-modal" class="fixed inset-0 hidden z-50 grid justify-center bg-black/50 p-4"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modalTitle">
    <div class="w-full h-fit max-w-md rounded-lg bg-white p-6 shadow-lg">
        <div class="flex items-start justify-end">
            <button
                onclick="closeImageModal()"
                type="button"
                class="cursor-pointer -me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
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
            <img src="" alt="" class="w-full h-full" id="modal-img">
        </div>
    </div>
</div>