<?php
$message = Session::getMessage();
?>
<div role="alert" id="alert" class="rounded-md ease-in-out duration-300 border opacity-0 border-gray-300 
    bg-white p-4 w-96 shadow-sm absolute right-[calc(50%-12rem)] top-8 ">
    <div class="flex items-start gap-4">
        <i class="ph text-3xl <?= $message['type'] == 'Success' ? 'ph-check-circle text-green-600' : 'ph-x-circle text-red-600' ?> "></i>
        <div class="flex-1">
            <strong class="font-medium text-gray-900"> <?= $message['type'] ?> </strong>

            <p class="mt-0.5 text-sm text-gray-700"> <?= $message['message'] ?></p>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const el = document.getElementById('alert');
        requestAnimationFrame(() => {
            el.classList.remove('opacity-0');
            el.classList.add('opacity-100');
        });
        setTimeout(() => {
            el.classList.remove('opacity-100');
            el.classList.add('opacity-0');

            setTimeout(() => {
                el.classList.add('hidden');
            }, 300);
        }, 3000);
    });
</script>